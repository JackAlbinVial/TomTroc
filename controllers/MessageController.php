<?php
/**
 * Contrôleur général des messages.
 */

class MessageController
{
/**
 * Affiche la page Messagerie.
 * @return void
 */
    public function showChat(): void
    {
        //On vérifie si l'utilisateur est connecté.
        $userController = new UserController;
        $userController->checkIfUserIsConnected();

        //On récupère l'id de l'interlocuteur de la conversation selectionné
        $idSender = (int) Utils::request("idSender", 0);

        //On récupère tous les messages reçu et envoyé de l'utilisateur connecté
        $messageManager = new MessageManager();
        $conversations  = $messageManager->getAllConversationByIdUser($_SESSION['idUser']);

        $userManager = new UserManager();

        $messages      = [];
        $interlocuteur = null;

        //On récupère tous les messages recu et envoyé en les selectionnants par interlocuteur
        if ($idSender) {
            $messages = $messageManager->getAllMessageByIdSender($_SESSION['idUser'], $idSender);

            //On récupère l'interlocuteur
            $interlocuteur = $userManager->getUserById($idSender);
        }

        $view = new View("Messagerie");
        $view->render("messagerie", [
            'messages'      => $messages,
            'conversations' => $conversations,
            'interlocuteur' => $interlocuteur,
        ]);
    }

/**
 * Envoie de messages
 * @return void
 */
    public function sendMessage(): void
    {
        // On récupère les données du formulaire.
        $messageForm    = Utils::request("message");
        $interlocutorId = (int) Utils::request("interlocutorId");
        $userId         = (int) Utils::request("userId");

        // On nettoie les données du formulaire.
        $messageForm = Utils::clean($messageForm);

        //On créé l'objet message
        $messageManager = new MessageManager;
        $messageObject  = $messageManager->sendMessage($userId, $interlocutorId, $messageForm);

        // On redirige vers la page messagerie.
        Utils::redirect("message", ['idSender' => $interlocutorId]);
    }
}

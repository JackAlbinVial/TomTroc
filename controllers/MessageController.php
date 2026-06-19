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

        //On récupère tous les message reçu et envoyé
        $messageManager = new MessageManager();
        $conversations  = $messageManager->getAllConversationByIdUser($_SESSION['idUser']);

        $userManager = new UserManager();

        $messages      = [];
        $interlocuteur = null;

        if ($idSender) {
            $messages      = $messageManager->getAllMessageByIdSender($_SESSION['idUser'], $idSender);
            $interlocuteur = $userManager->getUserById($idSender);
        }

        $view = new View("Messagerie");
        $view->render("messagerie", [
            'messages'      => $messages,
            'conversations' => $conversations,
            'interlocuteur' => $interlocuteur,
        ]);
    }

}

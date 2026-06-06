<?php
/**
 * Contrôleur de la partie user.
 */

class UserController
{
/**
 * Connexion de l'utilisateur.
 * @return void
 */
    public function connectUser(): void
    {

        // On récupère les données du formulaire.
        $login    = Utils::request("login");
        $password = Utils::request("password");

        // On vérifie que les données sont valides.
        if (empty($login) || empty($password)) {
            throw new Exception("Tous les champs sont obligatoires.");
        }

        // On vérifie que l'utilisateur existe.
        $userManager = new UserManager();
        $user        = $userManager->getUserByLogin($login);
        if (! $user) {
            throw new Exception("L'utilisateur demandé n'existe pas.");
        }

        // On vérifie que le mot de passe est correct.
        if (! password_verify($password, $user->getPassword())) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            throw new Exception("Le mot de passe est incorrect");
        }

        // On connecte l'utilisateur.
        $_SESSION['user']   = $user;
        $_SESSION['idUser'] = $user->getId();

        Utils::redirect("connectionForm");
    }

/**
 * Vérifie que l'utilisateur est connecté.
 * @return void
 */
    private function checkIfUserIsConnected(): void
    {
        // On vérifie que l'utilisateur est connecté.
        if (! isset($_SESSION['user'])) {
            Utils::redirect("connectionForm");
        }
    }

/**
 * Affichage du formulaire de connexion.
 * @return void
 */
    public function displayConnectionForm(): void
    {
        $view = new View("Connexion");
        $view->render("connectionForm");
    }

    /**
     * Déconnexion de l'utilisateur.
     * @return void
     */
    public function disconnectUser(): void
    {
        // On déconnecte l'utilisateur.
        unset($_SESSION['user']);
        unset($_SESSION['idUser']);

        // On redirige vers la page d'accueil.
        Utils::redirect("connectionForm");
    }

/**
 * Affichage du formulaire de connexion.
 * @return void
 */
    public function displaySubscriptionForm(): void
    {
        $view = new View("Subscription");
        $view->render("subscriptionForm");
    }
/**
 * Inscription de l'utilisateur.
 * @return void
 */
    public function subscribeUser(): void
    {

        // On récupère les données du formulaire.
        $name     = Utils::request("name");
        $login    = Utils::request("login");
        $password = Utils::request("password");

        // On vérifie que les données sont valides.
        if (empty($name) || empty($login) || empty($password)) {
            throw new Exception("Tous les champs sont obligatoires.");
        }

        // On vérifie que l'utilisateur n'existe pas déjà sinon on l'enregistre.
        $userManager = new UserManager();
        $user        = $userManager->getUserByLogin($login);
        if (isset($user)) {
            throw new Exception("L'adresse mail est déjà utilisée");
        } else {
            $user = $userManager->createUser([$name, $login, $password]);
        }

        // On connecte l'utilisateur via la redirection vers connectUser.
        Utils::redirect("connectUser", [
            'login'    => $login,
            'password' => $password,
        ]);
    }

/**
 * Affiche la page profile de l'utilisateur
 * @return void
 */
    public function showProfile(): void
    {
        // On vérifie que l'utilisateur est connecté.
        $this->checkIfUserIsConnected();

        // On récupère les livres dans un tableau.
        $livreManager = new LivreManager();
        $livres       = $livreManager->getAllLivresByIdUser($_SESSION['idUser']);
        // On compte les livres de chaque utilisateur.
        $countLivre = $livreManager->countAllLivresByUser($_SESSION['idUser']);

        // On récupère les infos de l'utilisateur.
        $userManager = new UserManager;
        $user        = $userManager->getUserById($_SESSION['idUser']);
        $userDate    = $userManager->getUserSeniorityById($_SESSION['idUser']);

        // On affiche la page de profil.
        $view = new View("Profile");
        $view->render("userProfile", [
            'livres'     => $livres,
            'user'       => $user,
            'userDate'   => $userDate,
            'countLivre' => $countLivre,
        ]);
    }
}

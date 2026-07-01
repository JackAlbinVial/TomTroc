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

        //On nettoie les donnée avant de les envoyer
        $login = Utils::clean($login);

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

        Utils::redirect("userProfile");
    }

/**
 * Vérifie que l'utilisateur est connecté.
 * @return void
 */
    public function checkIfUserIsConnected(): void
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
        Utils::redirect("home");
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

        //On nettoie les données
        $name  = Utils::clean($name);
        $login = Utils::clean($login);

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
 * Affiche la page profile de l'utilisateur connecté
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

/**
 * Édition de l'utilisateur.
 * @return void
 */
    public function editUser(): void
    {
        // On récupère les données du formulaire.
        $nameForm     = Utils::request("name");
        $loginForm    = Utils::request("login");
        $passwordForm = Utils::request("password");

        // On nettoie les données du formulaire.
        $nameForm  = Utils::clean($nameForm);
        $loginForm = Utils::clean($loginForm);

        // On vérifie que l'utilisateur n'existe pas déjà sinon on l'enregistre.
        $userManager = new UserManager;
        $user        = $userManager->getUserById($_SESSION['idUser']);

        // On récupère les données du user.
        $nameUser     = $user->getName();
        $loginUser    = $user->getLogin();
        $passwordUser = $user->getPassword();

        // On hash le passwordForm s'il a été modifié, on y enregistre le password bdd sinon
        if ($passwordForm) {
            $passwordHash = password_hash($passwordForm, PASSWORD_DEFAULT);
        } else {
            $passwordHash = $passwordUser;
        }

        // On compare les valeurs, on les enregistre en cas de changements,
        // On enregistre les valeurs de la bdd sinon.
        $name     = ($nameForm != $nameUser) ? $nameForm : $nameUser;
        $login    = ($loginForm != $loginUser) ? $loginForm : $loginUser;
        $password = ($passwordHash != $passwordUser) ? $passwordHash : $passwordUser;

        $user = $userManager->editUser([$_SESSION['idUser'], $name, $login, $password]);

        // On redirige vers la page profile.
        Utils::redirect("userProfile");
    }

/**
 * Mise à jour de la photo de l'utilisateur.
 * @return void
 */
    public function updateUserPhoto(): void
    {
        // On vérifie qu'il n'y a aucune erreur
        if ($_FILES['photo']['error']) {
            throw new Exception("Erreur lors du upload");
        }

        // On vérifier le type de fichier que l'utilisateur tente d'upload
        $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
        if (! in_array($_FILES['photo']['type'], $allowedTypes)) {
            throw new Exception("Format non autorisé");
        }

        // On vérifie la taille (max 5MB)
        if ($_FILES['photo']['size'] > 5 * 1024 * 1024) {
            throw new Exception("Fichier trop volumineux");
        }

        // On génére un nom unique
        $filename   = uniqid() . '_' . basename($_FILES['photo']['name']);
        $uploadDir  = './pictures/users/';
        $uploadPath = $uploadDir . $filename;

        // On déplace le fichier
        if (! move_uploaded_file($_FILES['photo']['tmp_name'], $uploadPath)) {
            throw new Exception("Erreur lors de la sauvegarde");
        }

        // On met à jour en BDD
        $userManager = new UserManager;
        $user        = $userManager->updatePhoto(
            $_SESSION['idUser'],
            $filename
        );

        // Rediriger vers le profile
        Utils::redirect("userProfile");
    }

/**
 * Affichage du formulaire d'ajout ou de modification d'un livre.
 * @return void
 */
    public function showUpdateBookForm(): void
    {
        $this->checkIfUserIsConnected();

        // On récupère l'id du livre s'il existe.
        $id = Utils::request("id", -1);

        // On récupère le livre associé.
        $livreManager = new LivreManager();
        $livre        = $livreManager->getLivreById($id);

        // Si le livre n'existe pas, on en crée un vide.
        if (! $livre) {
            $livre = new Livre();
        }

        // On affiche la page de modification de l'article.
        $view = new View("Edition d'un livre");
        $view->render("updateLivreForm", [
            'livre' => $livre,
        ]);
    }

/**
 * Suppression d'un livre.
 * @return void
 */
    public function deleteBook(): void
    {
        // On vérifie si l'utilisateur est connecté
        $this->checkIfUserIsConnected();

        // On récupère l'id de l'url
        $id = Utils::request("id", -1);

        // On supprime le livre.
        $livreManager = new LivreManager();
        $livreManager->deleteLivre($id);

        // On redirige vers la page profile.
        Utils::redirect("userProfile");
    }

/**
 * Ajout et modification d'un article.
 * On sait si un article est ajouté car l'id vaut -1.
 * @return void
 */
    public function updateLivre(): void
    {
        $this->checkIfUserIsConnected();

        // On récupère les données du formulaire.
        $id            = Utils::request("id", -1);
        $titre         = Utils::request("titre");
        $auteur        = Utils::request("auteur");
        $description   = Utils::request("description");
        $disponibilite = Utils::request("dispoSelect");

        //On nettoie les données
        $titre       = Utils::clean($titre);
        $auteur      = Utils::clean($auteur);
        $description = Utils::clean($description);

        // On récupère le livre existant pour garder l'ancienne photo par défaut
        $livreManager = new LivreManager();
        $ancienLivre  = $livreManager->getLivreById($id);
        $filename     = $ancienLivre->getPhoto();

        // On ne traite l'upload QUE si un nouveau fichier a été envoyé
        if (isset($_FILES['photoLivre']) && $_FILES['photoLivre']['error'] !== UPLOAD_ERR_NO_FILE) {

            // On vérifie qu'il n'y a aucune erreur pour la photo
            if ($_FILES['photoLivre']['error']) {
                var_dump($_FILES['photoLivre']['error']);
                throw new Exception("Erreur lors du upload");
            }

            // On vérifier le type de fichier que l'utilisateur tente d'upload
            $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
            if (! in_array($_FILES['photoLivre']['type'], $allowedTypes)) {
                throw new Exception("Format non autorisé");
            }

            // On génére un nom unique
            $filename   = uniqid() . '_' . basename($_FILES['photoLivre']['name']);
            $uploadDir  = './pictures/books/';
            $uploadPath = $uploadDir . $filename;

            // On déplace le fichier
            if (! move_uploaded_file($_FILES['photoLivre']['tmp_name'], $uploadPath)) {
                throw new Exception("Erreur lors de la sauvegarde");
            }
        }

        // On crée l'objet Article.
        $livre = new Livre([
            'id'             => $id,
            'photo'          => $filename,
            'titre'          => $titre,
            'auteur'         => $auteur,
            'description'    => $description,
            'disponibilite'  => $disponibilite,
            'idProprietaire' => $_SESSION['idUser'],
        ]);

        // On ajoute le livre.
        $livreManager->addOrUpdateLivre($livre);

        // On redirige vers la page d'administration.
        Utils::redirect("userProfile");
    }

/**
 * Affiche la page profile public d'un utilisateur
 * @return void
 */
    public function showPublicProfile(): void
    {
        // On récupère l'id de l'utilisateur
        $idUser = Utils::request("id");

        // On récupère les livres dans un tableau.
        $livreManager = new LivreManager();
        $livres       = $livreManager->getAllLivresByIdUser($idUser);

        // On compte les livres de l'utilisateur.
        $countLivre = $livreManager->countAllLivresByUser($idUser);

        // On récupère les infos de l'utilisateur.
        $userManager = new UserManager;
        $user        = $userManager->getUserById($idUser);
        $userDate    = $userManager->getUserSeniorityById($idUser);

        // On affiche la page de profil.
        $view = new View("Profile");
        $view->render("publicProfile", [
            'livres'     => $livres,
            'user'       => $user,
            'userDate'   => $userDate,
            'countLivre' => $countLivre,
        ]);
    }
}

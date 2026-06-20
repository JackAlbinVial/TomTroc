<?php

require_once 'config/config.php';
require_once 'config/autoload.php';

$action = Utils::request('action', 'home');

try {
    // Pour chaque action, on appelle le bon contrôleur et la bonne méthode.
    switch ($action) {
        // Pages accessibles à tous.
        case 'connectUser':
            $userController = new UserController();
            $userController->connectUser();
            break;

        case 'editUser':
            $userController = new UserController();
            $userController->editUser();
            break;

        case 'disconnectUser':
            $userController = new UserController();
            $userController->disconnectUser();
            break;

        case 'connectionForm':
            $userController = new UserController();
            $userController->displayConnectionForm();
            break;

        case 'subscribeUser':
            $userController = new UserController();
            $userController->subscribeUser();
            break;

        case 'subscriptionForm':
            $userController = new UserController();
            $userController->displaySubscriptionForm();
            break;

        case 'userProfile':
            $userController = new UserController();
            $userController->showProfile();
            break;

        case 'updateUserPhoto':
            $userController = new UserController();
            $userController->updateUserPhoto();
            break;

        case 'showUpdateBookForm':
            $userController = new UserController();
            $userController->showUpdateBookForm();
            break;

        case 'deleteBook':
            $userController = new UserController();
            $userController->deleteBook();
            break;

        case 'updateLivre':
            $userController = new UserController();
            $userController->updateLivre();
            break;

        case 'home':
            $livreController = new LivreController();
            $livreController->showHome();
            break;

        case 'book':
            $livreController = new LivreController();
            $livreController->showBooks();
            break;

        case 'searchBook':
            $livreController = new LivreController();
            $livreController->searchBooks();
            break;

        case 'detailBook':
            $livreController = new LivreController();
            $livreController->detailBook();
            break;

        case 'owner':
            $userController = new UserController();
            $userController->showPublicProfile();
            break;

        case 'message':
            $messageController = new MessageController();
            $messageController->showChat();
            break;

        case 'sendMessage':
            $messageController = new MessageController();
            $messageController->sendMessage();
            break;
    }
} catch (Exception $e) {
    echo $e;
}

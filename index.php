<?php

require_once 'config/config.php';
require_once 'config/autoload.php';

$action = Utils::request('action', 'connectionForm');

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
    }
} catch (Exception $e) {
    echo $e;
}

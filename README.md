# TomTroc

TomTroc est un MVC d'un site de mise en relation entre lecteurs,
l'objectif est de pouvoir rentrer en contact via un messagerie afin de s'échanger des livres.

## Fonctionalitées

- Inscription / Connexion
- Consulter les livres disponibles
- Ajouter / modifier / supprimer ses livres
- Messagerie entre utilisateurs
- Profil utilisateur

## Prérequis

- PHP 8.3
- MySQL 8.4
- Apache 2.4

## Configuration

Pour Lancer le projet, commencez par cloner le projet, créez une base de donnée et lancez le script 'tom_troc.sql', ensuite veuillez renseigner les paramètres dans le fichier
config/config.php comme suit :

define('DB_HOST', ''); -> Nom de l'hôte
define('DB_NAME', ''); -> Nom de la BDD
define('DB_USER', ''); -> Nom de l'utilisateur de la BDD
define('DB_PASS', ''); -> Mot de passe de l'utilisateur

<?php

session_start();

define('TEMPLATE_VIEW_PATH', './views/templates/');        // Le chemin vers les templates de vues.
define('MAIN_VIEW_PATH', TEMPLATE_VIEW_PATH . 'main.php'); // Le chemin vers le template principal.

define('DB_HOST', 'localhost');
define('DB_NAME', 'tom_troc');
define('DB_USER', 'root');
define('DB_PASS', '');

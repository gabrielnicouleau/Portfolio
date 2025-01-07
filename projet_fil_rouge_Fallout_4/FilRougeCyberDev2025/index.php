<?php
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'C:\chemin\vers\ton\fichier\de\log\php_error.log');


session_start();


include './App/Utils/functions.php';
include './App/Model/ModelUser.php';
include './App/view/view_header.php';
include './App/view/view_index.php';

//chargement des variables d'environnement
// require_once './env.local.php';

//chargement de l'autoloader de composer
// require_once './vendor/autoload.php';

$header = new ViewHeader($nav) ;
$index = new ViewIndex();

include './App/Controller/controller_header.php';
echo $header->render();
echo $index->render();
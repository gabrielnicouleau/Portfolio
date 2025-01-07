<?php
include './view/header.php';
// affichage du lien vers la page de connexion par défault
$header = new ViewHeader("<a href='controller_connexion.php'>Connexion</a>");

// affichage du lien vers la page compte et du bouton déconnexion si un utilisateur est connecté
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    $header->setNav("<a class='session-on' href='controller_profil.php'>Mon compte</a><br><a class='session-on' href='controller_deconnexion.php'>Déconnexion</a>");
}

?>
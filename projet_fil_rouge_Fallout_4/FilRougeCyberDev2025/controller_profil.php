<?php

include './App/utils/functions.php';
include './App/model/ModelUser.php';
include './App/Manager/Manager_user.php';
include './App/view/view_header.php';
include './App/view/view_profil.php';

class ControllerProfil{
    private ?ViewProfil $profil;

    public function __construct(){
        $this->profil = new ViewProfil();
    }

    public function getProfil(): ?ViewProfil {
        return $this->profil;
    }

    public function setProfil(?ViewProfil $profil): self {
        $this->profil = $profil;
        return $this;
    }

    public function renderViews():void{
        //Je vérifie si quelqu'un est connecté
        if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
            echo $this->getProfil()->render();
        } else {
            header('Location:controller_accueil.php');
            exit;
        }
    }
}

// Inclure le fichier controller_header.php pour afficher l'en-tête
include './App/Controller/controller_header.php';

// Initialiser et afficher l'en-tête
$header = new ViewHeader("<a class='session-on' href='controller_profil.php'>Mon compte</a><br><a class='session-on' href='controller_deconnexion.php'>Déconnexion</a>");
if(!isset($_SESSION['id']) && empty($_SESSION['id'])){
    header('Location:./index.php');
    exit;
}

echo $header->render();
$profil = new ControllerProfil();
$profil->renderViews();
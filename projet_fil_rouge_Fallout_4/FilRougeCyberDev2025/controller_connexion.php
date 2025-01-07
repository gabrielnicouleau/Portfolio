<?php

session_start();

include './App/utils/functions.php';
include './App/model/ModelUser.php';
include './App/Manager/Manager_user.php';
include './App/view/view_header.php';
include './App/view/view_connexion.php';

class ControllerConnexion{
    private ?ModelUser $modelUser;
    private ?ViewConnexion $connexion;

    public function __construct(){
        $this->modelUser = new ManagerUser();
        $this->connexion = new ViewConnexion();
    }

    public function getModelUser(): ?ManagerUser {
        return $this->modelUser;
    }

    public function setModelUser(?ModelUser $modelUser): self {
        $this->modelUser = $modelUser;
        return $this;
    }

    public function getConnexion(): ?ViewConnexion {
        return $this->connexion;
    }

    public function setConnexion(?ViewConnexion $connexion): self {
        $this->connexion = $connexion;
        return $this;
    }

    public function logInUser(){
        if(isset($_POST['submitConnexion'])){
            if(isset($_POST['email']) && !empty($_POST['email'])
            && isset($_POST['password']) && !empty($_POST['password'])){
                if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                    $email = sanitize($_POST['email']);
                    $password = sanitize($_POST['password']);

                    $this->getModelUser()->setEmail($email)->setPassword($password);

                    $data = $this->getModelUser()->readUserByMail();

                    if(!empty($data)){
                        if(password_verify($password,$data[0]['mdp'])){
                            $_SESSION['id'] = $data[0]['id'];
                            $_SESSION['pseudo'] = $data[0]['pseudo'];
                            $_SESSION['email'] = $data[0]['email'];
                            
                            header('Location:./index.php');
                            exit;
                        }else{
                            $this->getConnexion()->setMessage("Email et/ou mot de passe incorrect !");
                        }
                    }else{
                        $this->getConnexion()->setMessage("Email et/ou mot de passe incorrect !");
                    }
                }else{
                    $this->getConnexion()->setMessage("L'email n'est pas au bon format !");
                }
            }else{
                $this->getConnexion()->setMessage("Veuillez remplir tous les champs !");
            }
        }
    }
    
    public function registerUser():void{
        if(isset($_POST['submitInscription'])){
            if(isset($_POST['pseudoInscription']) && !empty($_POST['pseudoInscription'])
            && isset($_POST['emailInscription']) && !empty($_POST['emailInscription'])
            && isset($_POST['passwordInscription']) && !empty($_POST['passwordInscription'])
            && isset($_POST['passwordVerify']) && !empty($_POST['passwordVerify'])){

                    if(filter_var($_POST['emailInscription'],FILTER_VALIDATE_EMAIL)){
                            if($_POST['passwordInscription'] === $_POST['passwordVerify']){
                                    $pseudo = sanitize($_POST['pseudoInscription']);
                                    $email = sanitize($_POST['emailInscription']);
                                    $password = sanitize($_POST['passwordInscription']);
                                    $password = password_hash($password, PASSWORD_BCRYPT);

                                    $this->getModelUser()->setPseudo($pseudo)->setEmail($email)->setPassword($password);

                                    $data = $this->getModelUser()->readUserByMail();

                                    if(empty($data)){                                       
                                        $this->getConnexion()->setMessage($this->getModelUser()->createUser());
                                    }else{
                                        $this->getConnexion()->setMessage("Cet email est déjà utilisé par un autre compte !");
                                    }
                            }else{
                                $this->getConnexion()->setMessage("Vos deux mots de passe ne correspondent pas !");
                            }
                    }else{
                        $this->getConnexion()->setMessage("Votre email n'est pas au bon format !");
                    }
            }else{
                $this->getConnexion()->setMessage("Veuillez remplir tous les champs !");
            }
        }
    }

    public function renderViews():void{
        if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
            header('Location:./index.php');
            exit;
        }
        $this->logInUser();
        $this->registerUser();
        echo $this->getConnexion()->render();
    }
}

// Inclure le fichier controller_header.php pour afficher l'en-tête
include './App/Controller/controller_header.php';

// Initialiser et afficher l'en-tête
$header = new ViewHeader("<a href='controller_connexion.php'>Connexion</a>");
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    header('Location:./index.php');
    exit;
}

echo $header->render();

$Connexion = new ControllerConnexion();
$Connexion->renderViews();

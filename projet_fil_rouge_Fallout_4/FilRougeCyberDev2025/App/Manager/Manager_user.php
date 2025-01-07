<?php
class ManagerUser extends ModelUser{
    public function readUsers():array | string{
        try{
            $req = $this->getBdd()->prepare('SELECT id, pseudo, email, mdp FROM users');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch(EXCEPTION $error){
            return $error->getMessage();
        }

    }

    function readUserByMail():array |string{
        try{
            $req = $this->getBdd()->prepare('SELECT id, pseudo, mdp, email FROM users WHERE email = ? LIMIT 1');
            $email = $this->getEmail();
            $req->bindParam(1,$email,PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetchAll();
            return $data;
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }

    function createUser():string{
        try{
            $req =$this->getBdd()->prepare('INSERT INTO users (pseudo, email, mdp) VALUES (?,?,?)');
            $pseudo = $this->getPseudo();
            $email = $this->getEmail();
            $password = $this->getPassword();
            $req->bindParam(1,$pseudo,PDO::PARAM_STR);
            $req->bindParam(2,$email,PDO::PARAM_STR);
            $req->bindParam(3,$password,PDO::PARAM_STR);
            $req->execute();

            return "L'utilisateur $pseudo a été enregistré avec succès !";
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }
}
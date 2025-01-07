<?php

ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'C:\chemin\vers\ton\fichier\de\log\php_error.log');
session_start();

class ViewConnexion{
    private ?string $message;

    public function __construct(){
        $this->message = "";
    }

    public function getMessage(): string|null{
        return $this->message;
    }
    public function setMessage(?string $newmessage): ViewConnexion{
        $this->message = $newmessage;
        return $this;
    }

    public function render(): string{

        ob_start();
?>
        <main>
        <form action="" id="connexion" method="post">
            <h3>Connexion</h3><br>
            <input type="text" name="email" required placeholder="email"><br>
            <input type="password" name="password" required placeholder="mot de passe"><br>
            <button type="submit" name ="submitConnexion" class="interaction">Connexion</button>
        </form>
        <p id="message"><?php echo $this->getMessage() ?></p>
        <form action="" id="formulaire" method="post">
            <h3>Inscription</h3><br>
            <input type="text" name="pseudoInscription" placeholder="pseudo"><br>
            <input type="email" name="emailInscription" placeholder="email"><br>
            <input type="password" name="passwordInscription" placeholder="mot de passe"><br>
            <input type="password" name="passwordVerify" placeholder="mot de passe"><br>
            <button type="submit" name ="submitInscription" class="interaction">Créer un compte</button>
        </form>
        </main>

        <footer>
        <nav>
            <a href="#">contact</a>
            <a href="#">copyrights</a>
            <a href="#">liens utiles</a>
        </nav>
        </footer>
        
        <div id="app"></div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="module" src="./App/src/script/script.js"></script>
    </body>

    </html>
<?php
        return ob_get_clean();
    }
}
?>
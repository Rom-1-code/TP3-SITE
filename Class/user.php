<?php
class user
{

    //Propiétés
    private $_idUser;
    private $_identifiant;
    private $_mdp;
    
    
    //Methodes
    public function getIdUser()
    {
        return $this->_idUser;
    }
    public function getIdentifiant() 
    {
        return $this->_identifiant;
    }
    public function construct($id_user, $identifiant, $mdp) 
    {
        $this->_idUser = $id_user;
        $this->_identifiant = $identifiant;
        $this->_mdp = $mdp;
    }
    public function Connexionbdd() 
    {
        try {
            $bdd = new PDO('mysql:host=192.168.64.104; dbname=TPSPOTS; charset=utf8', 'root', 'root');
        } catch (Exception $erreur) {
            echo 'Erreur : ' . $erreur->getMessage();
        }
        return $bdd;
    }

    public function ConnexionUser($identifiant, $mdp, $bdd) 
    {
        
        $requser = $bdd->query('SELECT * FROM user WHERE "' . $identifiant . '"=`identifiant` && "' . $mdp . '"=`mdp'); // Vérifie si l'identifiant et le mdp sont les meme quand base
        $requser->execute(array($identifiant, $mdp));// mise en tableau
        $userexist = $requser->rowCount(); 
        if ($userexist == 1) {
            $userinfo = $requser->fetch();
            $_SESSION['identifiant'] = $userinfo['identifiant'];
            
            ?>
                <meta http-equiv="refresh" content="0.01;URL=index.php"> 
            <?php
        } else {

            echo "Identifiant ou mot de passe incorrect !";    
        }
    
}
}
?>
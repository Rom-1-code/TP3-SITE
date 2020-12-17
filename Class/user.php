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
    public function construct($id_user, $identifiant, $mdp) // Constructeur
    {
        $this->_idUser = $id_user;
        $this->_identifiant = $identifiant;
        $this->_mdp = $mdp;
    }
    public function Connexionbdd() // Connexion avec la base de données 
    {
        try {
            $bdd = new PDO('mysql:host=192.168.64.104; dbname=TPSPOTS; charset=utf8', 'root', 'root');
        } catch (Exception $erreur) {
            echo 'Erreur : ' . $erreur->getMessage();
        }
        return $bdd;
    }

    public function ConnexionUser($identifiant, $mdp, $bdd) //Romain FLEMAL
    {
        
        $requser = $bdd->query('SELECT * FROM user WHERE "' . $identifiant . '"=`identifiant` && "' . $mdp . '"=`mdp'); // Vérifie si l'identifiant et le mdp sont les même que dans la bdd
        $requser->execute(array($identifiant, $mdp));// mise dans un tableau
        $userexist = $requser->rowCount(); 
        if ($userexist == 1) {
            $userinfo = $requser->fetch();
            $_SESSION['identifiant'] = $userinfo['identifiant']; // Verification avec la base de données 
            
            ?>
                <meta http-equiv="refresh" content="0.01;URL=index.php"> 
            <?php
        } else {

            echo "Identifiant ou mot de passe incorrect !";    
        }
    
}
}
?>
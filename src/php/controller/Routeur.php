<?php
require_once  __DIR__ . "/JeuController.php";
require_once  __DIR__ . "/BdController.php";
class Routeur{
  private $bd;
  private $jeu;

  function __construct(){
    $this->jeu = new JeuController();
    $this->bd = new BdController();
    $_SESSION['inscriptionFlag'] = 0;
    if (!isset($_SESSION['joueur'])){ // On est pas loggé
      if(isset($_POST['enregistrer'])){ // On a essayé de s'inscrire
        // On tente d'inscrire le joueur
        $this->inscrireJoueur($_POST['pseudoEnr'],$_POST['pswEnr']);
      }
      else{ // On a envoyé des données de connexion
        if(isset($_POST['pseudo'], $_POST['psw'])){

          if ($this->bd->authentifier($_POST['pseudo'], $_POST['psw'])){
            $_SESSION['joueur'] = $_POST['pseudo'];
            $this->jeu->commencerPartie();
          } // On n'a pas rempli
          else{ // proposer de s'inscrire
            require  __DIR__ . "/../view/Inscription.php";
          }
        }
        else {
          $this->login();
        }
      }
    }
    else{
      // Il n'y a pas de partie en cours
      if (!isset($_SESSION['partie'])){
        $this->jeu->commencerPartie();
      } // On a cliqué sur reset
      elseif (isset($_POST['recommencer'])) {
        $this->jeu->recommencer();
      } // On s'est déconnecté
      elseif (isset($_POST['deco'])) {
        $this->deconnecter();
      }
      else{ // on a joué ou appuyé sur f5
        $this->jeu->jouer();
        // Si on a fini on enregistre le score
        if($_SESSION['partie']->getPartieFinie()){
          $this->bd->rentrerScore($_SESSION['partie']);
        }
        // Continuer
        require  __DIR__ . "/../view/VueJeu.php";
      }
    }
  }

  function login(){
    require  __DIR__ . "/../view/Vue.html";
  }

  function deconnecter(){
    unset($_SESSION['partie'],$_SESSION['joueur']);
    $this->login();
  }

  function inscrireJoueur($pseudo,$psw){
    if($this->bd->inscrireJoueur($pseudo,$psw)){
      $this->login();
    }
    else{ // Le pseudo est déjà pris ou ne correspond pas
      require  __DIR__ . "/../view/Inscription.php";
    }

  }



}

 ?>

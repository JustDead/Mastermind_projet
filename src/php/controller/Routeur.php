<?php
require_once "model/Partie.php";
require_once "controller/BdController.php";
class Routeur{
  private $bd;

  function __construct(){
    $this->bd = new BdController();
    $_SESSION['inscriptionFlag'] = false;
    // On est pas loggé
    if (!isset($_SESSION['joueur'])){
      if(isset($_POST['enregistrer'])){ // On a essayé de s'inscrire
        // Vérifier pseudo pris
        $this->inscrireJoueur($_POST['pseudoEnr'],$_POST['pswEnr']);
      }
      else{
        if(isset($_POST['pseudo'], $_POST['psw'])){ // On a envoyé des données
          if ($this->authentifier($_POST['pseudo'], $_POST['psw'])){
            $_SESSION['joueur'] = $_POST['pseudo'];
            $this->commencerPartie();
          } // On n'a pas rempli
          else{ // proposer de s'inscrire
            require 'view/Inscription.php';
          }
        }
        else {
          $this->login();
        }
      }
  }
    else{ // on n'était pas au login
      // Il n'y a pas de partie en cours
      if (!isset($_SESSION['partie'])){
        // On se log
        $this->login();
      } // On a cliqué sur reset
      elseif (isset($_POST['recommencer'])) {
        $this->recommencer();
      } //  On s'est enregistré
      elseif (isset($_POST['enregistrer'])) {
        $this->inscrire($_POST['pseudoEnr'],$_POST['pswEnr']);
      } // On s'est déconnecté
      elseif (isset($_POST['deco'])) {
        $this->deconnecter();
      }
      // Une partie est déjà commencée
      else{
        // La partie est finie (code mort normalement)
        if ($_SESSION['partie']->getPartieFinie()){
          $this->recommencer();
        }
        else{ // on a f5 en plein tour
          // Rejoue le dernier ocup (utile pour debug)
          $this->jouer();
        }
      }
    }
  }

  function authentifier($pseudo,  $mdp){
    return $this->bd->authentifier($pseudo, $mdp);
  }

  function recommencer(){
    unset($_SESSION['partie']);
    $this->commencerPartie();
  }

  function login(){
    require "view/testVue.html";
  }

  function deconnecter(){
    unset($_SESSION['partie'],$_SESSION['joueur']);
    $this->login();
  }

  function inscrireJoueur($pseudo,$psw){
    if($this->bd->inscrireJoueur($pseudo,$psw)){
      $this->login();
    }
    else{
      $_SESSION['inscriptionFlag'] = true;
      require "view/Inscription.php";
    }

  }


  function deconnexion(){
    unset($_SESSION['login']);
    $this->login();
  }

  function getHighScores(){
    return $this->bd->getHighScores();
  }


  function commencerPartie(){
    $_SESSION['partie'] = new Partie($_SESSION['joueur']);
    require "view/testVueJeu.php";
  }

  function jouer(){
    if(isset($_POST['color1'], $_POST['color2'], $_POST['color3'], $_POST['color4'])){
      $c1 = new Couleur($_POST["color1"]);
      $c2 = new Couleur($_POST["color2"]);
      $c3 = new Couleur($_POST["color3"]);
      $c4 = new Couleur($_POST["color4"]);

      $_SESSION['partie']->jouer(new Combinaison($c1,$c2,$c3,$c4));
    }
    // Si on a fini on enregistre le score
    if($_SESSION['partie']->getPartieFinie()){
      $this->bd->rentrerScore($_SESSION['partie']);
    }
    // Continuer
    require "view/testVueJeu.php";
  }


}

 ?>

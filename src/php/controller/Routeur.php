<?php
require_once "model/Partie.php";
require_once "controller/BdController.php";
class Routeur{
  private $bd;

  function __construct(){
    $this->bd = new BdController();

    // On est pas loggé
    if (!isset($_SESSION['joueur'])){
      // On a rempli le formulaire
      if ($this->authentifier($_POST['pseudo'], $_POST['psw'])){
        $_SESSION['joueur'] = $_POST['pseudo'];
        $this->commencerPartie();
      } // On n'a pas rempli
      else{
        $this->login();
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
      }
      // Une partie est déjà commencée et on a tapé f5
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
    return true;
  }

  function recommencer(){
    unset($_SESSION['partie']);
    $this->commencerPartie();
  }

  function login(){
    require "view/testVue.html";
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
    // Continuer
    require "view/testVueJeu.php";
  }


}

 ?>

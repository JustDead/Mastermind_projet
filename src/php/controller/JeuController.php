<?php
require_once __DIR__ . "/../model/Partie.php";

class JeuController{

  function __construct()
  {

  }

function recommencer(){
    unset($_SESSION['partie']);
    $this->commencerPartie();
  }

function commencerPartie(){
    $_SESSION['partie'] = new Partie($_SESSION['joueur']);
    require  __DIR__ . "/../view/VueJeu.php";
  }

function jouer(){
    if(isset($_POST['color1'], $_POST['color2'], $_POST['color3'], $_POST['color4'])){
      $c1 = new Couleur($_POST["color1"]);
      $c2 = new Couleur($_POST["color2"]);
      $c3 = new Couleur($_POST["color3"]);
      $c4 = new Couleur($_POST["color4"]);

      $_SESSION['partie']->jouer(new Combinaison($c1,$c2,$c3,$c4));

    }


  
  }



}


 ?>

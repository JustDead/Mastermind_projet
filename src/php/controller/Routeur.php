<?php
require_once "model/Partie.php";
class Routeur{

  function __construct(){
    // Il n'y a pas de partie en cours
    if (!isset($_SESSION['partie'])){
      // Commencer une partie
      $this->commencerPartie();
    }
    elseif (isset($_POST['recommencer'])) {
      $this->recommencer();
    }
    // Une partie est déjà commencée
    else{ // On rafraîchit la page
      // La partie est finie (code mort normalement)
      if ($_SESSION['partie']->getPartieFinie()){
        // Afficher solution, tableau des scores, demander de rejouer etc
        $this->recommencer();
      }
      else{
        // Demander un coup
        $this->jouer();
      }
    }





  }

  function recommencer(){
    unset($_SESSION['partie']);
    $_SESSION['partie'] = new Partie('Joueur');
    require "view/testVueJeu.php";
  }


  function commencerPartie(){
    $_SESSION['partie'] = new Partie('Joueur');
    ?>
    <form action="TestIndex.php" method="post">
      <input type="submit" name="new" value="commencer">
    </form>
    <?php
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
    if (!$_SESSION['partie']->getPartieFinie()){
      require "view/testVueJeu.php";
    }
    else{
      // Gagner
      if ($_SESSION['partie']->getPartieGagnee()){
        require "view/testVueJeu.php";

      }
      //Perdre
      else{
        require "view/testVueJeu.php";

      }
    }

  }


}

 ?>

<?php
require_once "model/BaseDonnees.php";

class BdController{
  private $bd;

  function __construct(){
    $this->bd = new BaseDonnees();
  }

  function getPseudos(){
    return $this->bd->getPseudos();
  }

  function exists($pseudo){
    return $this->bd->exists($pseudo);
  }

  function inscrireJoueur($pseudo,$psw){
    return $this->bd->inscrireJoueur($pseudo, $psw);
  }

  function authentifier($pseudo,$mdp){
      $resultatMDP = $this->bd->getMdp($pseudo);
      return crypt($mdp,$resultatMDP)==$resultatMDP;
  }

  function getHighScores(){
    return $this->bd->getHighScores();
  }

  function rentrerScore($partie){
    $this->bd->majParties($partie);
  }
}
 ?>

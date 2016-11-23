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

<<<<<<< HEAD
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
=======
  function inscription($pseudo,$psw){
    return $this->bd->inscrireJoueur();
  }

  function authentifier($pseudo,$mdp){
    // SI on trouve
//    if $this->bd->ex
      // Si mdp crypté match
      if(crypt($mdp,$resultatMDP)==$resultatMDP){
        return true;
      }
  }

  function getHighScores(){
    return array(array(1,"zbeub",1),array(2,'miskine',5),array(3,'jisepas',10),array(4,'jisepas',10),array(5,'jisepas',10));
>>>>>>> df46bac3f391f18ca3272c045528c8b5525a9f47
  }
}
 ?>

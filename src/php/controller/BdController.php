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
  }
}
 ?>

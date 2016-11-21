<?php
require_once "model/BaseDonnees.php";

class BdController{
  private $bd;

  function __construct(){
    //$this->bd = new BaseDonnees();
  }

  function getPseudos(){

  }

  function exists($pseudo){

  }

  function authentifier($pseudo,$mdp){

  }

  function getHighScores(){
    return array(array(1,"zbeub",1),array(2,'miskine',5),array(3,'jisepas',10));
  }
}
 ?>

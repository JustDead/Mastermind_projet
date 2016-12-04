<?php
require_once __DIR__ . "/../model/BaseDonnees.php";

class BdController{
  private $bd;

  function __construct(){
    $this->bd = new BaseDonnees();
  }

  function exists($pseudo){
    return $this->bd->exists($pseudo);
  }

  function inscrireJoueur($pseudo,$psw){
    if ($pseudo != $psw){ // Le pseudo et mot de passe doivent être le même
      $_SESSION['inscriptionFlag'] = 1;
      return false;
    }
    if ($this->bd->inscrireJoueur($pseudo, $psw)){
      return true;
    }
    else{ // Le pseudo est déjà pris
      $_SESSION['inscriptionFlag'] = -1;
      return false;
    }
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

  function getStatsJoueur($pseudo){
    // 0 : nb parties gagnées 1: nb parties jouées 2: nb coups dans parties gagnées
    $stats = $this->bd->getStatsJoueur($pseudo);
    // On évite de diviser par 0
    $winRate = $stats[1] == 0 ? 0 : round($stats[0]/$stats[1]*100);
    $coupsMoy = $stats[0] == 0 ? 0 : round($stats[2]/$stats[0]);
    return array($winRate,$coupsMoy);
  }
}
 ?>

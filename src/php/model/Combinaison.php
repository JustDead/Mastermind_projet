<?php
require_once  __DIR__ . "/Couleur.php";
class Combinaison{
  private $couleurs;

  function __construct($c1,$c2,$c3,$c4){
    $this->couleurs = array($c1,$c2,$c3,$c4);
  }

  function compareTo($combiEssai){
    //On transforme les données en tableaux de string représentant le nom de la couleur
    $tabEssai = array_map(function($c){return $c->getNom();}, $combiEssai->getCouleurs());
    $tabGagnant = array_map(function($c){return $c->getNom();}, $this->couleurs);
    // On enlève les pions de bonnes couleur et position
    $gagnant = array_diff_assoc($tabGagnant,$tabEssai);
    $essai = array_diff_assoc($tabEssai,$tabGagnant);
    // On ajoute le nombre de pions exactes
    $check = array();
    for ($i=0; $i < 4-sizeof($gagnant); $i++) {
      array_push($check, new Couleur(0));
    }
    // On compte le nombre d'occurences de chaque couleur dans la solution et dans l'essai
    $compte_Gagnant = array_count_values($gagnant);
    $compte_Essai = array_count_values($essai);
    foreach ($compte_Gagnant as $couleur => $nb) {
      if (isset($compte_Essai[$couleur])){
        //  On ajoute le nombre de pions blancs adapté
        for ($i=0; $i < min($nb,$compte_Essai[$couleur]); $i++) {
          array_push($check, new Couleur(-1));
        }
      }
    }

    // On remplit le résultat avec des pions vides
    while(sizeof($check)<4) {
      array_push($check, new Couleur(null));
    }

    // Enfin, on renvoie la combinaison associée
    $combinaisonCheck = new Combinaison($check[0],$check[1],$check[2],$check[3]);

    return $combinaisonCheck;
  }

  function getCouleurs(){
    return $this->couleurs;
  }

  function __toString(){
    $string = '';
    foreach ($this->getCouleurs() as $c) {
      $string .= $c . '</br>';
    }
    return $string;
  }

}

 ?>

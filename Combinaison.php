<?php
class Combinaison{
  private $couleurs;

  function __construct($c1,$c2,$c3,$c4){
    $this->couleurs = array($c1,$c2,$c3,$c4);
  }

  function compareTo($combiTest){
    // On enlève les pions de bonnes couleur et position
    $gagnant = array_diff_assoc($this->couleurs,$combiTest);
    $essai = array_diff_assoc($combiTest,$this->couleurs);
    // On ajoute le nombre de pions exactes
    $check = array();
    for ($i=0; $i < 4-sizeof($gagnant); $i++) {
      array_push($check, new Couleur(0));
    }
    // On compte le nombre d'occurences à chaque terme
    $compte_Gagnant = array_count_values($gagnant);
    $compte_Essai = array_count_values($essai);
    foreach ($compte_Gagnant as $couleur => $nb) {
      if (array_search($couleur,$compte_Essai)){
        $nb_Essai = $compte_Essai[$couleur];
        $tmp = $nb-$nb_Essai;
        // C'est bon, on ajoute les occurences de la couleur
        if ($tmp==0){
          for ($i=0; $i < $nb; $i++) {
            array_push($check, new Couleur(-1));
          }
        }
        // Il y a plus d'occurences chez le gagnant que l'essai
        elseif ($tmp>0 && $nb_Essai>0) {
          for ($i=0; $i < $nb_Essai; $i++) {
            array_push($check, new Couleur(-1));
          }
        }
        // Il y a plus d'occurences chez l'essai que chez le gagnant
        elseif ($tmp<0) {
          for ($i=0; $i < $nb; $i++) {
            array_push($check, new Couleur(-1));
          }
        }
      }
    }
    // On remplit le résultat avec des pions vides
    for ($i=0; $i < 4-sizeof($check); $i++) {
      array_push($check, new Couleur(null));
    }
    // Enfin, on renvoie la combinaison adaptée
    $combinaisonCheck = new Combinaison($check[0],$check[1],$check[2],$check[3]);

    return $combinaisonCheck;
  }

}

 ?>

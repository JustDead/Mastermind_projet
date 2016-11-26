<?php
require_once  __DIR__ . "/Combinaison.php";
class Partie{
  private $compteur_coups;         // entier qui compte le nombre de coups joués par le joueur
  private $partie_finie;          // false si partie en cours, true si partie finie (10 coups ou Combi trouvée)
  private $partie_gagnee;         // false si partie perdue, true si partie gagnée
  private $coups_joues;           // matrice contenant les coups joués : coup X combinaison (check:joué)
  private $joueur;                // Le joueur qui va jouer
  private $combinaison_gagnante;  // La combinaison créée lors de l'instanciation de cette classe

  public function __construct($leJoueur){
    $this->joueur = $leJoueur;
    $this->partie_finie = false;
    $this->partie_gagnee = false;
    $this->compteur_coups = 0;
    $this->coups_joues = array();
    // Création aléatoire de la combinaison gagante de la partie
    $this->combinaison_gagnante = new Combinaison(new Couleur(rand(1,8)),new Couleur(rand(1,8)),new Couleur(rand(1,8)), new Couleur(rand(1,8)));
  }

  public function jouer($combinaison_joueur){
    $combinaison_check = $this->combinaison_gagnante->compareTo($combinaison_joueur);
    // On transforme les couleurs en 0 si noir (valide) ou 1 sinon, puis on fait la somme pour voir si tout est bon
    $check = array_sum(array_map(function($c){return $c->getNom()=='noir' ? 0 : 1;}, $combinaison_check->getCouleurs()));
    if($check==0){
      $this->partie_gagnee = true;
      $this->partie_finie = true;
    }
    array_push($this->coups_joues, array($combinaison_joueur,$combinaison_check));
    $this->compteur_coups++;
    $this->checkFini();
  }

  public function checkFini(){
      $this->partie_finie = $this->compteur_coups>9 || $this->partie_gagnee;
  }

  function getCoupsJoues(){
    return $this->coups_joues;
  }

  function getCombiGagnante(){
    return $this->combinaison_gagnante;
  }

  function getPartieFinie(){
    return $this->partie_finie;
  }

  function getPartieGagnee(){
    return $this->partie_gagnee;
  }

  function getNbCoups(){
    return $this->compteur_coups;
  }

  function getPseudoJoueur(){
    return $this->joueur;
  }
}
?>

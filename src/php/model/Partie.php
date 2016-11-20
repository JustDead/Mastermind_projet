<?php
require_once "Combinaison.php";
class Partie{
  private $compteur_Coup;         // entier qui compte le nombre de coups jouer par le joueur
  private $partie_Finie;          // false si en partie, true si partie finie (10 coups ou Combi trouvée)
  private $partie_Gagnee;         // false si partie perdue, true si partie gagnée
  private $coups_Joues;           // matrice contenant les coups jouer coup X combinaison jouer/check
  private $joueur;                // Le joueur qui va jouer
  private $combinaison_Gagnante;  // La combinaison créer lors de l'instanciation de cette classe

  public function __construct($leJoueur){
    $this->$joueur = $leJoueur;
    $this->$partie_Fini = false;
    $this->$partie_Gagnee = false;
    $this->$compteur_Coup = 0;
    $this->$coups_Joues = array();
    // Création aléatoire de la combinaison gagante de la partie
    $this->$combinaison_Gagante = new Combinaison(new Couleur(rand(1,8)),new Couleur(rand(1,8)),new Couleur(rand(1,8)), new Couleur(rand(1,8)));
  }

  public function jouer($combinaison_joueur){
    $combinaison_check = $this->$combinaison_gagnante->compareTo($combinaison_joueur);
    if($combinaison_check==new Combinaison(new Couleur(0),new Couleur(0),new Couleur(0),new Couleur(0))){
      $this->$partie_Gagnee = true;
      $this->$partie_Fini = true;
    }
    array_push($this->$coupsJoues, array($combinaison_joueur,$combinaison_check));
    $this->$compteur_Coup++;
    $this->checkFini();
  }

  public function checkFini(){
    if($compteur_Coup>9){
      $partie_Finie = true;
    }
  }
}
?>

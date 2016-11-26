<?php
class Couleur{
  // Nom pour savoir quelle couleur on manipule
  private $nom;
  // Code hexadécimal pour l'affichage
  private $hexa;

  function __construct($numero){
    if (!isset($numero)){
      $numero = 42;
    }
    switch ($numero) {
      // La couleur est correcte mais pas l'emplacement
      case -1:
        $this->nom = 'blanc';
        $this->hexa = '#FFF';
        break;
      // La couleur et l'emplacement sont corrects
      case 0:
        $this->nom = 'noir';
        $this->hexa = '#000';
        break;
      // Les couleurs sont attribuées arbitrairement
      case 1:
        $this->nom = 'jaune';
        $this->hexa = '#FFD911';
        break;
      case 2:
        $this->nom = 'vert';
        $this->hexa = '#75BB17';
        break;
      case 3:
        $this->nom = 'cyan';
        $this->hexa = '#088C7A';
        break;
      case 4:
        $this->nom = 'bleu';
        $this->hexa = '#182CA2';
        break;
      case 5:
        $this->nom = 'violet';
        $this->hexa = '#6E0E94';
        break;
      case 6:
        $this->nom = 'magenta';
        $this->hexa = '#AE0A71';
        break;
      case 7:
        $this->nom = 'bordeaux';
        $this->hexa = '#66001D';
        break;
      case 8:
        $this->nom = 'orange';
        $this->hexa = '#DF7C00';
        break;
      // Rien n'est correct, on affiche du transparent car c'est vide
      default:
        $this->nom ='vide';
        $this->hexa = 'rgba(0, 0, 255, 0, 0)';
        break;
    }
  }

  function getNom(){
    return $this->nom;
  }

  function getHexa(){
    return $this->hexa;
  }

  function __toString(){
    return $this->nom.' '.$this->hexa;
  }

}
 ?>

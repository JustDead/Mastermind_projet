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
        $this->hexa = '#FF0';
        break;
      case 2:
        $this->nom = 'vert';
        $this->hexa = '#0F0';
        break;
      case 3:
        $this->nom = 'bleu';
        $this->hexa = '#00F';
        break;
      case 4:
        $this->nom = 'orange';
        $this->hexa = '#FFA500';
        break;
      case 5:
        $this->nom = 'marron';
        $this->hexa = '#800';
        break;
      case 6:
        $this->nom = 'violet';
        $this->hexa = '#800080';
        break;
      case 7:
        $this->nom = 'fuschia';
        $this->hexa = '#F0F';
        break;
      case 8:
        $this->nom = 'rouge';
        $this->hexa = '#F00';
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

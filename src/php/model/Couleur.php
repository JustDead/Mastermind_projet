<?php
class Couleur{
  // Nom pour savoir quelle couleur on manipule
  private $nom;
  // Code hexadéciamle pour l'affichage
  private $hexa;

  function __construct($numero){
    switch ($numero) {
      // La couleur est correcte mais pas l'emplacement
      case -1:
        $nom = 'blanc';
        $hexa = '#FFF';
        break;
      // La couleur et l'meplacement sont corrects
      case 0:
        $nom = 'noir';
        $hexa = '#000';
        break;
      // Les couleurs sont attribuées arbitrairement
      case 1:
        $nom = 'jaune';
        $hexa = '#FF0';
        break;
      case 2:
        $nom = 'vert';
        $hexa = '#0F0';
        break;
      case 3:
        $nom = 'bleu';
        $hexa = '#00F';
        break;
      case 4:
        $nom = 'orange';
        $hexa = '#FFA500';
        break;
      case 5:
        $nom = 'marron';
        $hexa = '#800';
        break;
      case 6:
        $nom = 'violet';
        $hexa = '#800080';
        break;
      case 7:
        $nom = 'fuschia';
        $hexa = '#F0F';
        break;
      case 8:
        $nom = 'rouge';
        $hexa = '#F00';
        break;
      // Rien n'est correct, on affiche du transparent car c'est vide
      default:
        $nom ='vide';
        $hexa = 'rgba(0, 0, 255, 0, 0)';
        break;
    }
  }


}
 ?>

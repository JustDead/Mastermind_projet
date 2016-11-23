<?php
		
// On teste les fonctionnalités apportées
require_once "../model/Partie.php";


//Couleurs : OK
$c1 = new Couleur(1);
$c2 = new Couleur(2);
$c3 = new Couleur(3);
$c4 = new Couleur(4);
$c5 = new Couleur(5);
$c6 = new Couleur(6);
$c7 = new Couleur(7);
$c8 = new Couleur(8);

/*Combinaisons : OK
$combi1 = new Combinaison($c2,$c2,$c3,$c4);
$combi1->testAfficher();
echo '</br>';
$combi2 = new Combinaison($c3,$c4,$c2,$c4);
$combi2->testAfficher();

$combi3 = $combi1->compareTo($combi2);
$combi3->testAfficher();

Partie : OK


$partie = new Partie("Joueur");

echo $partie->getcombiGagnante();
echo $partie->getPartieFinie() ? 'fini' : 'en cours' ;
echo $partie->getPartieGagnee() ? 'gg' : 'loser';

$combi1 = new Combinaison($c1,$c5,$c6,$c7);
$combi2 = new Combinaison($c2,$c3,$c2,$c4);
$combi3 = new Combinaison($c3,$c5,$c8,$c3);
$combi4 = new Combinaison($c1,$c2,$c2,$c5);
$combi5 = new Combinaison($c4,$c5,$c1,$c7);

$partie->jouer($combi1);
$partie->jouer($combi2);
$partie->jouer($combi3);
$partie->jouer($combi4);
$partie->jouer($combi5);
*//*$partie->jouer($combi5);
$partie->jouer($combi5);
$partie->jouer($combi5);
$partie->jouer($combi5);
$partie->jouer($combi5);*/
//$partie->jouer($partie->getcombiGagnante());

/*foreach ($partie->getCoupsJoues() as $coup) {
  echo '</br>Coup :</br>' . $coup[0] . '</br>Check :</br>' . $coup[1] . '</br>';
}
echo '<br>Nb coups :' . $partie->getNbCoups();
echo $partie->getPartieFinie() ? 'fini' : 'en cours' ;
echo $partie->getPartieGagnee() ? 'gg' : 'loser';

*/

?>

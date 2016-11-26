<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Mastermind</title>
<link rel="stylesheet" href="view/VueJeu.css" type="text/css" />
</head>
<body>
  <form action="index.php" method="post">
    <input type="submit" name="deco" value="Deconnexion" class="deconnexion">
  </form>
<div class="fenetre_jeu">
  <div class="fenetre_joueur">
    <?php
    if (!$_SESSION['partie']->getPartieFinie()){
      require "view/tableauEssai.html";
    }
    else{
      require "view/finPartie.php";
    }
    ?>
  </div>
  <div class="affichage">
    <table>
      <?php
      foreach ($_SESSION['partie']->getCoupsJoues() as $coup) {
        ?>
          <tr>
            <?php
            foreach ($coup[0]->getCouleurs() as $couleur) {
              ?>
              <td><div class = "circle", style ="background-color :<?php echo $couleur->getHexa();?>"></div></td>
            <?php } ?>
            <td>
              <table>
                <?php $check = array_map(function($c){return $c->getHexa();},$coup[1]->getCouleurs()); ?>
                <tr>
                  <td><div class = "check", style ="background-color :<?php echo $check[0];?>"></div></td>
                  <td><div class = "check", style ="background-color :<?php echo $check[1];?>"></div></td>
                </tr>
                <tr>
                  <td><div class = "check", style ="background-color :<?php echo $check[2];?>"></div></td>
                  <td><div class = "check", style ="background-color :<?php echo $check[3];?>"></div></td>
                </tr>
              </table>
            </td>
          </tr>
        <?php
      }

      for ($i=0; $i < 10 - $_SESSION['partie']->getNbCoups(); $i++) {  ?>
        <tr>
          <?php
          $transp = new Couleur(null);
          $transp = $transp->getHexa();
          for ($j=0; $j < 4; $j++) {
            ?>
              <td><div class = "circle", style ="background-color :<?php echo $transp;?>; border : 1px solid black;"></div></td>
            <?php
          } ?>
          <td>
            <table>
              <tr>
                <td><div class = "check", style ="background-color :<?php echo $transp; ?>"></div></td>
                <td><div class = "check", style ="background-color :<?php echo $transp; ?>"></div></td>
              </tr>
              <tr>
                <td><div class = "check", style ="background-color :<?php echo $transp; ?>"></div></td>
                <td><div class = "check", style ="background-color :<?php echo $transp; ?>"></div></td>
              </tr>
            </table>
          </td>
        </tr>
        <?php
      }
      ?>
      <tr>
        <?php
        if (!$_SESSION['partie']->getPartieFinie()){
          for ($j=0; $j < 4; $j++) {
            ?>
              <td><div class = "gagnant">?</div></td>
            <?php
          }
        }
        else{
          foreach($_SESSION['partie']->getCombiGagnante()->getCouleurs() as $c){
            ?>
            <td><div class = "circle", style ="background-color :<?php echo $c->getHexa();?>"></div></td>
          <?php
          }
        }?>
      </tr>

  </table>
  <form action="index.php" method="post">
    <input type="submit" name="recommencer" value="Reset" class="soumettre"/>
  </form>
  </form>
    </div>
  </div>
  </body>
  </html>

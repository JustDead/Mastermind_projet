<div class = "resultat">
  <?php
  echo $_SESSION['partie']->getPartieGagnee() ? "Gagné  en " . $_SESSION['partie']->getNbCoups() . $_SESSION['partie']->getNbCoups()>1 ? "coups" : "coup, tricheur"  . " !" : "Perdu !!!";
  ?>
  </div>
  <table class ="highscores">
    <tr><label class ="titreHS">HighScores</label></tr>



  </table>

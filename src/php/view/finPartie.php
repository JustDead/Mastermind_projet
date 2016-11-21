<div class = "resultat">
  <?php
  echo $_SESSION['partie']->getPartieGagnee() ? ("Gagné  en " . $_SESSION['partie']->getNbCoups() . ($_SESSION['partie']->getNbCoups()>1 ? " coups" : " coup, tricheur")  . " !" ) : "Perdu !!!";
  ?>
  </div>
  <table class ="highscores">
    <tr><label class ="titreHS">HighScores</label></tr>
    <tr>
      <th>
        Place
      </th>
      <th>
        Pseudo
      </th>
      <th>
        Coups
      </th>
    </tr>
    <?php
    foreach ($this->getHighScores() as $score) {
      ?>
      <tr>
          <td><?php echo $score[0] ?></td>
          <td><?php echo $score[1] ?></td>
          <td><?php echo $score[2] ?></td>
      </tr>
      <?php
    }
    ?>
  </table>

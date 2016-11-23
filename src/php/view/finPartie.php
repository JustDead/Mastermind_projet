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
    $i =1;
    foreach ($this->getHighScores() as $score) {
      ?>
      <tr>
          <td><?php echo $i ; $i++?></td>
          <td><?php echo $score['pseudo'] ?></td>
          <td><?php echo $score['nombreCoups'] ?></td>
      </tr>
      <?php
    }
    ?>
  </table>

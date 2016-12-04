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
    foreach ($this->bd->getHighScores() as $score) {
      ?>
      <tr>
          <td><?php echo $i ; $i++?></td>
          <td><?php echo $score['pseudo'] ?></td>
          <td><?php echo $score['nombreCoups'] ?></td>
      </tr>
      <?php
    }
    ?>
    <tr><td><label class ="titreHS">Statistiques</label></td></tr>
    <tr>
      <th>Ratio de victoires</th>
      <th>Nombre de coups moyens pour gagner</th>
    </tr>
    <tr>
      <td><?php echo $this->bd->getStatsJoueur($_SESSION['joueur'])[0]; ?>%</td>
      <td><?php echo $this->bd->getStatsJoueur($_SESSION['joueur'])[1]; ?></td>
    </tr>
  </table>

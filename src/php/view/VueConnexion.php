<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Mastermind</title>
<link rel="stylesheet" href="view/Vue.css" type="text/css" />
</head>
<body>
<div class="fenetre_jeu">
  <div class="fenetre_auth">
    <div class="auth">
      <form method="post" action="index.php">
        <?php
        if (isset($_POST['pseudo'])) {
          ?>
          <p style = "color : red">
            Pseudo ou mot de passe incorrect
          </p>
          <?php
        } ?>
          <p class="texte">Pseudo</p>
          <input type="text" name="pseudo"/>
          <br />
          <br />
          <p class="texte">Mot de passe</p>
          <input type="password" name="psw"/>
          <br />
          <br />
          <input type="submit" name="Valider" value="CONNEXION" class=soumettre/>
<?php if(isset($_POST['pseudo'])) { ?>
          <input type="submit" name="inscription" value="INSCRIPTION">
<?php } ?>

      </form>
    </div>
  </div>
</div>
</body>
</html>

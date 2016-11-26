<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Mastermind</title>
<link rel="stylesheet" href="view/Vue.css" type="text/css" />
</head>
<body>
  <form action="index.php" method="post">
    <input type="submit" name="login" value="login">
  </form>
<div class="fenetre_jeu">
  <div class="fenetre_auth">
    <div class="auth">
      <form method="post" action="index.php">
          <p class="texte">Pseudo</p>
          <input type="text" name="pseudoEnr"
          <?php if ($_SESSION['inscriptionFlag']) {
            echo 'placeholder = "Pseudo déjà pris"';
          } ?>
          />
          <br />
          <br />
          <p class="texte">Mot de passe</p>
          <input type="password" name="pswEnr"/>
          <br />
          <br />
          <input type="submit" name="enregistrer" value="S'INSCRIRE" class="soumettre"/>
      </form>
    </div>
  </div>
</div>
</body>
</html>

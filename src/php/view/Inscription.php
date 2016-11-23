<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Mastermind</title>
<link rel="stylesheet" href="view/testVue.css" type="text/css" />
</head>
<body>
<<<<<<< HEAD
  <form action="TestIndex.php" method="post">
    <input type="submit" name="login" value="login">
  </form>
=======
>>>>>>> df46bac3f391f18ca3272c045528c8b5525a9f47
<div class="fenetre_jeu">
  <div class="fenetre_auth">
    <div class="auth">
      <form method="post" action="TestIndex.php">
          <p class="texte"
          <?php if ($_SESSION['inscriptionFlag']) {
            ?>
<<<<<<< HEAD
            placeholder = "Attention, pseudo déjà pris"
            <?php
          } ?>
=======
            placeholder = 'Attention, pseudo déjà pris'
            <?php
          } ?>

>>>>>>> df46bac3f391f18ca3272c045528c8b5525a9f47
          >Pseudo</p>
          <input type="text" name="pseudoEnr"/>
          <br />
          <br />
          <p class="texte">Mot de passe</p>
          <input type="password" name="pswEnr"/>
          <br />
          <br />
          <input type="submit" name="enregistrer" value="S'INSCRIRE"/>
      </form>
    </div>
  </div>
</div>
</body>
</html>

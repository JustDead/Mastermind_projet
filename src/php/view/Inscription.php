<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Mastermind</title>
<link rel="stylesheet" href="view/testVue.css" type="text/css" />
</head>
<body>
<div class="fenetre_jeu">
  <div class="fenetre_auth">
    <div class="auth">
      <form method="post" action="TestIndex.php">
          <p class="texte"
          <?php if ($_SESSION['inscriptionFlag']) {
            ?>
            placeholder = 'Attention, pseudo déjà pris'
            <?php
          } ?>

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

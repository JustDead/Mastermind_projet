<form method="post" action="index.php">
  <table classe="choix">
    <tr>
      <th><input type="radio" name="color1" value="1" id = "b11" class="couleur1"/><label for="b11"></label></th>
      <th><input type="radio" name="color2" value="1" id = "b21" class="couleur1"/><label for="b21"></label></th>
      <th><input type="radio" name="color3" value="1" id = "b31" class="couleur1"/><label for="b31"></label></th>
      <th><input type="radio" name="color4" value="1" id = "b41" class="couleur1"/><label for="b41"></label></th>
    </tr>
    <tr>
      <th><input type="radio" name="color1" value="2" id = "b12" class="couleur2"/><label for="b12"></label></th>
      <th><input type="radio" name="color2" value="2" id = "b22" class="couleur2"/><label for="b22"></label></th>
      <th><input type="radio" name="color3" value="2" id = "b32" class="couleur2"/><label for="b32"></label></th>
      <th><input type="radio" name="color4" value="2" id = "b42" class="couleur2"/><label for="b42"></label></th>
    </tr>
    <tr>
      <th><input type="radio" name="color1" value="3" id = "b13" class="couleur3"/><label for="b13"></label></th>
      <th><input type="radio" name="color2" value="3" id = "b23" class="couleur3"/><label for="b23"></label></th>
      <th><input type="radio" name="color3" value="3" id = "b33" class="couleur3"/><label for="b33"></label></th>
      <th><input type="radio" name="color4" value="3" id = "b43" class="couleur3"/><label for="b43"></label></th>
    </tr>
    <tr>
      <th><input type="radio" name="color1" value="4" id = "b14" class="couleur4"/><label for="b14"></label></th>
      <th><input type="radio" name="color2" value="4" id = "b24" class="couleur4"/><label for="b24"></label></th>
      <th><input type="radio" name="color3" value="4" id = "b34" class="couleur4"/><label for="b34"></label></th>
      <th><input type="radio" name="color4" value="4" id = "b44" class="couleur4"/><label for="b44"></label></th>
    </tr>
    <tr>
      <th><input type="radio" name="color1" value="5" id = "b15" class="couleur5"/><label for="b15"></label></th>
      <th><input type="radio" name="color2" value="5" id = "b25" class="couleur5"/><label for="b25"></label></th>
      <th><input type="radio" name="color3" value="5" id = "b35" class="couleur5"/><label for="b35"></label></th>
      <th><input type="radio" name="color4" value="5" id = "b45" class="couleur5"/><label for="b45"></label></th>
    </tr>
    <tr>
      <th><input type="radio" name="color1" value="6" id = "b16" class="couleur6"/><label for="b16"></label></th>
      <th><input type="radio" name="color2" value="6" id = "b26" class="couleur6"/><label for="b26"></label></th>
      <th><input type="radio" name="color3" value="6" id = "b36" class="couleur6"/><label for="b36"></label></th>
      <th><input type="radio" name="color4" value="6" id = "b46" class="couleur6"/><label for="b46"></label></th>
    </tr>
    <tr>
      <th><input type="radio" name="color1" value="7" id = "b17" class="couleur7"/><label for="b17"></label></th>
      <th><input type="radio" name="color2" value="7" id = "b27" class="couleur7"/><label for="b27"></label></th>
      <th><input type="radio" name="color3" value="7" id = "b37" class="couleur7"/><label for="b37"></label></th>
      <th><input type="radio" name="color4" value="7" id = "b47" class="couleur7"/><label for="b47"></label></th>
    </tr>
    <tr>
      <th><input type="radio" name="color1" value="8" id = "b18" class="couleur8"/><label for="b18"></label></th>
      <th><input type="radio" name="color2" value="8" id = "b28" class="couleur8"/><label for="b28"></label></th>
      <th><input type="radio" name="color3" value="8" id = "b38" class="couleur8"/><label for="b38"></label></th>
      <th><input type="radio" name="color4" value="8" id = "b48" class="couleur8"/><label for="b48"></label></th>
    </tr>
  </table>
  <p style="color : #CCC">
    Nombre de coups restant : <?php echo 10-$_SESSION['partie']->getNbCoups(); ?>
  </p>
  <input type="submit" name="jouer" value="Jouer" class="soumettre"/>

</form>

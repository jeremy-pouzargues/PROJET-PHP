<?php

      $step  = $_GET['step'];

      if ($step = 'errconf')
          $msg = "les deux mots de passes ne correspondent pas" ;


?>

<main>
  <h1> nouveau mdp </h1>
  <from method="post" action="../controller/generatePwdC.php?token= <?= $i_token ?>">
    <input type="password" name="newMdp" placeholder="nouveau mot de passe"><br>
    <p> Confirmez votre mot de passe <br></p>
    <input type="password" name="confMdp" placeholder="confirmer mot de passe">
    <input type="submit" name="action" value="envoyer">
    <?= $msg ?>
  <form>
</main>

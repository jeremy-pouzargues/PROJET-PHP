<?php

  $step    = $_GET['step'];
  if ($step == 'hello'){
    $s_msg = 'veuillez entrer votre nouveau mot de passe';
  }
  else if ($step == 'errconf') {
    $s_msg = 'les 2 mots de passes entrés sont differenets';
    $s_token = $_GET['token'];
  }
  else if ($step = 'errmdp') {
    $s_msg = 'vous ne respectez pas les critères de sécurité';
    $s_token = $_GET['token'];
  }


  $title        = 'Nouveau mot de passe';
  $style        = '../assets/css/generatePwd.css';
  $style_common = '../assets/css/connexion-inscription.css';


  	ob_start()
?>

<main>
  <div id="LogoMainContainer">
      <img src="../assets/images/test2.png" id="LogoMain">
  </div>
  <div id="PageTitleContainer">
      <h1 id="PageTitle"> nouveau mot de passe </h1>
      <h2 id="message"> <?= $s_msg ?> </h2>
  </div>
  <div id="FormPwdContainer">
    <form  action="../controller/generatePwdC.php?token=<?= $s_token ?>"  method="post">
      <input type="password" name="newPwd" placeholder="nouveau mot de passe"><br>
      <p> Confirmez votre mot de passe <br></p>
      <input type="password" name="confPwd" placeholder="confirmer mot de passe"><br>
      <input type="submit" name="action" value="envoyer"><br>
    </form>
  </div>
</main>

<?php

	$content = ob_get_clean();
	require('../template_empty.php');

?>

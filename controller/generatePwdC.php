<?php
    require ('../model/generatePwdM.php');

    $s_newPwd  = $_POST['newMdp'];
    $s_confPwd = $_POST['confMdp'];

    $i_token   = $_GET['token'];

    print_r()

    // on verifie si le token existe  dans la bd et on redirige en fonction
    if($i_token == null || !verifToken($i_token))
      header('Location : accesInterdit.html');


    if($s_newMdp == $s_confMdp)
      header("Location :../view/generatePwdV.php?step=errconf");

    changePwd($i_token,$s_newPwd);

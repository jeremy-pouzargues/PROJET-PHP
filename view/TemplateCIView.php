<!-- Template pour les pages d'inscription et de connexion -->
<?php
    include('popupV.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="icon" type="image/png" href="../assets/images/LogoThemeFonce.png" />

    <link rel="stylesheet" href="./assets/css/ArchiConIns.css">
    <link rel="stylesheet" href="./assets/css/<?= $css_link ?>.css">
    <title><?= $page_title ?> | FreeNote</title>
</head>
<body>
    <main>
       <?= $content ?>
    </main>
</body>
</html>



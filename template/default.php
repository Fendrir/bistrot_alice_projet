<? include('template/bouton_admin.php'); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bistrot_alice_projet/node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../bistrot_alice_projet/css/style.css">
    <title>Le Bistrot d'Alice</title>
</head>
<body>

<?php

    $boutons ="";

  if(!empty($_SESSION['nick'])){

    $boutons = '<li><button class="btn">Gérer</button></li>
                <li><button class="btn">Se déconnecter</button></li>';

  }

?>

<ul class="list-unstyled">
    <li>Accueil</li>
    <li>Contact</li>
    <li>
        <ul class="list-inline">
            <li>Fb</li>
            <li>Twitter</li>
            <li>Trip</li>
            <li><a href="?p=connexion">Connexion</a></li>
        </ul>
    <?php echo $boutons;
    var_dump($_SESSION['nick']); ?>
</ul>



<?php echo $content; ?>

<script src="../bistrot_alice_projet/node_modules/jquery/dist/jquery.js"></script>
<script src="../bistrot_alice_projet/node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="../bistrot_alice_projet/js/app.js"></script>
</body>
</html>
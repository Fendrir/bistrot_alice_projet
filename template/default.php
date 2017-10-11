<?php
session_start();

    include('template/bouton_admin.php');


include('database/connect_bdd.php');
?>

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

<?php echo $content; ?>

<script src="../bistrot_alice_projet/node_modules/jquery/dist/jquery.js"></script>
<script src="../bistrot_alice_projet/node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="../bistrot_alice_projet/js/app.js"></script>
</body>
</html>
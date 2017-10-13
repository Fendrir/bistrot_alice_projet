<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.8.0/css/flag-icon.css">
    <link rel="stylesheet" href="../bistrot_alice_projet/node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../bistrot_alice_projet/css/imageModal.css">
    <link rel="stylesheet" href="../bistrot_alice_projet/css/style.css">
    <title>Le Bistrot d'Alice</title>
</head>
<body>

<!-- Image Modal Part -->
<div id="myModal" class="modal2 closeImg">

    <!-- where image is showed -->
    <img id="imgModal" class="modal-content2">

    <!-- where caption will pop, based on alt of src -->
    <div id="caption"></div>
</div>
<!-- FIN Image Modal Part -->

<div class="container">

    <div class="row justify-content-center">
    <?php include('bouton_nav.php') ?>
        <?php echo $content; ?>
        <?php echo $_SESSION['nick']; ?>

    </div>
    <!-- correspond à la fin de la div du row des boutons nav_bar -->

</div>




<script src="../bistrot_alice_projet/node_modules/jquery/dist/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="../bistrot_alice_projet/node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="../bistrot_alice_projet/js/imageModal.js"></script>
<script src="../bistrot_alice_projet/js/app.js"></script>
</body>
</html>
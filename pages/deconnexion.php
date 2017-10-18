<?php
$_SESSION = array();
session_destroy();
?>
<div class="col-9 mt-5 text-center align-middle">
    <h1 class="align-middle">Vous vous êtes déconnecté.</h1>
    <p class="mt-5">Vous allez être redirigé à l'accueil automatiquement dans 5 secondes.</p>
    <p>Si rien ne se passe, <a href="?p=connexion">vous pouvez cliquer ici.</a></p>
</div>
<meta http-equiv="refresh" content="5; URL=?p=home">
</div>
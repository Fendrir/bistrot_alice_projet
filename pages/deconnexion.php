<?php
$_SESSION = array();
session_destroy();
?>
<div class="col-9 whiteDiv mt-5 text-center align-self-center">
    <h1 class="align-middle">Vous vous êtes déconnecté.</h1>
    <p class="mt-5">Vous allez être redirigé à l'accueil automatiquement dans 3 secondes.</p>
    <p>Si rien ne se passe, <a href="?p=connexion">vous pouvez cliquer ici.</a></p>
</div>
<meta http-equiv="refresh" content="3; URL=?p=home">
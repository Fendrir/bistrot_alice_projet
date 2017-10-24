<?php
// Stockage des données $_SESSION dans un tableau pour tout grouper
$_SESSION = array();
// Destruction de la session et des $_SESSION
session_destroy();
?>
<div class="col text-center">
    <div class="col whiteDiv">
        <h1>Vous vous êtes déconnecté.</h1>
        <p class="mt-5">Vous allez être redirigé à l'accueil automatiquement dans 3 secondes.</p>
        <p>Si rien ne se passe, <a href="?p=connexion">vous pouvez cliquer ici.</a></p>
    </div>
</div>
<!-- Redirection automatique au bout de 3 secondes sur ?p=home -->
<meta http-equiv="refresh" content="3; URL=?p=home">
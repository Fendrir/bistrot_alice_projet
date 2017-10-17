<?php
$sql = "SELECT adm_nick, adm_pwd FROM admin WHERE adm_oid = '1'";
$result = $conn->query($sql);
$row = $result->fetch_row();

$nick = $row[0];
$pwd = $row[1];
$nickPost = $_POST['nick'];

if ($nickPost === $nick && password_verify($_POST['pwd'], $pwd)) {
    ?>
    <div class="col-9 mt-5 text-center">
        <h1 class="mt-5">Bienvenue <?= $nick; ?> !</h1>
        <p class="mt-5">Vous allez être redirigé automatiquement dans 5 secondes.</p>
        <p>Si rien ne se passe, <a href="?p=administration">vous pouvez cliquer ici.</a></p>
    </div>
    <meta http-equiv="refresh" content="5; URL=?p=administration">
    <?php  $_SESSION['nick'] = $nick;
} else {
    ?>
    <div class="col-9 mt-5 text-center">
        <h1>Erreur !</h1>
        <h3 class="mt-5">Mauvais identifiant/mot de passe !</h3>
        <p class="mt-5">Vous allez être redirigé automatiquement dans 5 secondes.</p>
        <p>Si rien ne se passe, <a href="?p=connexion">vous pouvez cliquer ici.</a></p>
    </div>
    <meta http-equiv="refresh" content="5; URL=?p=connexion">
    <?php
}
?>
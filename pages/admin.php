<?php
$sql = "SELECT adm_nick, adm_pwd FROM admin WHERE adm_oid = '1'";
$result = $conn->query($sql);
$row = $result->fetch_row();

$nick = htmlspecialchars($row[0], ENT_QUOTES);
$pwd = htmlspecialchars($row[1], ENT_QUOTES);
$nickPost = htmlspecialchars($_POST['nick'], ENT_QUOTES);

if ($nickPost === $nick && password_verify(htmlspecialchars($_POST['pwd'], ENT_QUOTES), $pwd)) {
    ?>
    <div class="col-9 whiteDiv align-self-center text-center">
        <h1>Bienvenue <?= $nick; ?> !</h1>
        <p class="mt-5">Vous allez être redirigé automatiquement dans 3 secondes.</p>
        <p>Si rien ne se passe, <a href="?p=administration">vous pouvez cliquer ici.</a></p>
    </div>
    <meta http-equiv="refresh" content="3; URL=?p=administration">
    <?php $_SESSION['nick'] = $nick;
} else {
    ?>
    <div class="col-9 whiteDiv align-self-center text-center">
        <h1>Erreur !</h1>
        <h3 class="mt-5">Mauvais identifiant/mot de passe !</h3>
        <p class="mt-5">Vous allez être redirigé automatiquement dans 3 secondes.</p>
        <p>Si rien ne se passe, <a href="?p=connexion">vous pouvez cliquer ici.</a></p>
    </div>
    <meta http-equiv="refresh" content="3; URL=?p=connexion">
    <?php
}
?>
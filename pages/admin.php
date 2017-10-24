<?php
// Récupération identifiants dans la DB
$sql = "SELECT adm_nick, adm_pwd FROM admin WHERE adm_oid = '1'";
$result = $conn->query($sql);
$row = $result->fetch_row();

// Récupération pseudo
$nick = htmlspecialchars($row[0], ENT_QUOTES);
//Récupération password
$pwd = htmlspecialchars($row[1], ENT_QUOTES);
//Récupératon pseudo input
$nickPost = htmlspecialchars($_POST['nick'], ENT_QUOTES);
//Récupération password input
$pwdPost = htmlspecialchars($_POST['pwd'], ENT_QUOTES);

//Comparaison des inputs et des logs dans la DB
//Pwd vérifié via password_verify (méthode BCRYPT)
if ($nickPost === $nick && password_verify($pwdPost, $pwd)) {
    ?>
    <div class="col text-center">
        <div class="col whiteDiv">
            <h1>Bienvenue Franck !</h1>
            <p class="mt-5">Vous allez être redirigé automatiquement dans 3 secondes.</p>
            <p>Si rien ne se passe, <a href="?p=administration">vous pouvez cliquer ici.</a></p>
        </div>
    </div>
    <!-- Redirection automatique au bout de 3 secondes sur ?p=administration -->
    <meta http-equiv="refresh" content="3; URL=?p=administration">
    <?php $_SESSION['nick'] = 'Franck';
} else {
    ?>
    <div class="col text-center">
        <div class="col whiteDiv">
            <h1>Erreur !</h1>
            <h3 class="mt-5">Mauvais identifiant/mot de passe !</h3>
            <p class="mt-5">Vous allez être redirigé automatiquement dans 3 secondes.</p>
            <p>Si rien ne se passe, <a href="?p=connexion">vous pouvez cliquer ici.</a></p>
        </div>
    </div>
    <!-- Redirection automatique au bout de 3 secondes sur ?p=connexion -->
    <meta http-equiv="refresh" content="3; URL=?p=connexion">
    <?php
}
?>
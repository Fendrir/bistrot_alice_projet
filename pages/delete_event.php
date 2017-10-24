<?php
if(!isset($_SESSION['nick']) || $_SESSION['nick'] !== 'Franck') {
    ?>
    <!-- Erreur -->
    <div class="col text-center">
        <div class="col whiteDiv">
            <h1>Erreur !</h1>
            <p>Veuillez réessayer svp</p>
            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour à la page précédente</a>
        </div>
    </div>
    <!-- FIN Erreur -->
    <?php
} else {
    $sql = "SELECT eve_img FROM events_restau WHERE eve_oid >= 1";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $image = $row['eve_img'];
        $unlink = unlink($image);
    }
    $sql = "UPDATE events_restau SET eve_title = 'Pas d\'évènement', eve_img = '', eve_alt='empty' WHERE eve_oid >= 1";
    $result = $conn->query($sql);
}
?>

<div class="col text-center">
    <div class="col whiteDiv">
        <h1 class="mt-3">Evènement supprimé</h1>
        <p class="mt-5">Vous allez être redirigé automatiquement dans 3 secondes.</p>
        <p>Si rien ne se passe, <a href="?p=administration&div=buttonEventDiv">vous pouvez cliquer ici.</a></p>
    </div>
</div>
<!-- Redirection automatique au bout de 3 secondes sur ?p=administration&div=buttonEventDiv -->
<!-- div=buttonEventDiv sert à notre script JS pour afficher la div correspondante à l'arrivée sur la page -->
<meta http-equiv="refresh" content="5; URL=?p=administration&div=buttonEventDiv">

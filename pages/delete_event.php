<?php
if(!isset($_SESSION['nick']) || $_SESSION['nick'] !== 'Franck') {
    echo 'erreur lolilol';

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

<div class="col-9 whiteDiv align-self-center text-center">
    <div class="mt-3">
        <h1>Evènement supprimé</h1>
        <p class="mt-5">Vous allez être redirigé automatiquement dans 3 secondes.</p>
        <p>Si rien ne se passe, <a href="?p=administration&div=buttonEventDiv">vous pouvez cliquer ici.</a></p>
    </div>
</div>
<meta http-equiv="refresh" content="5; URL=?p=administration&div=buttonEventDiv">

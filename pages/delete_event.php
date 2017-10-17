<?php
if(!isset($_SESSION['nick']) || $_SESSION['nick'] !== 'Franck') {
    echo 'erreur lolilol';

} else {
    $sql = "SELECT eve_img FROM events_restau WHERE eve_oid >= 1";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $image = $row['eve_img'];
        $unlink = unlink($image);
        if ($unlink) echo "suppression ok";
    }

$sql = "UPDATE events_restau SET eve_title = 'Pas d\'évènement', eve_img = 'empty', eve_alt='empty' WHERE eve_oid >= 1";
$result = $conn->query($sql);
}
?>
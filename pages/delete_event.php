<?php
if(!isset($_SESSION['nick']) || $_SESSION['nick'] !== 'Franck') {
    echo 'erreur lolilol';

} else {
    $id = htmlspecialchars($_GET['id']);
    var_dump($id);
    $sql = "SELECT eve_img FROM events_restau WHERE eve_oid = '".$id."'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $image = $row['eve_img'];
        $unlink = unlink($image);
        if ($unlink) echo "suppression ok";
    }

$sql = "UPDATE events_restau SET eve_title = 'empty', eve_img = '' WHERE eve_oid = '".$id."'";
$result = $conn->query($sql);
}
?>
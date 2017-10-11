<?php
$sql = "SELECT adm_nick, adm_pwd FROM admin WHERE adm_oid = '1'";
$result = $conn->query($sql);
$row = $result->fetch_row();

$nick = $row[0];
$pwd = $row[1];
$nickPost = $_POST['nick'];

if($_SESSION['nick'] === 'Franck'){
} else if ($nickPost === $nick && password_verify($_POST['pwd'], $pwd)) {
    ?>
    <meta http-equiv="refresh" content="5; URL=?p=administration">
    <?php  $_SESSION['nick'] = $nick;
} else {
    ?>
    <meta http-equiv="refresh" content="5; URL=?p=connexion">
    <?php echo "connection failed";
}
?>
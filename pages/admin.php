<?php
$sql = "SELECT adm_nick, adm_pwd FROM admin WHERE adm_oid = '1'";
$result = $conn->query($sql);
$row = $result->fetch_row();

$nick = $row[0];
$pwd = $row[1];
$nickPost = $_POST['nick'];

if ($nickPost === $nick && password_verify($_POST['pwd'], $pwd)) {
    $_SESSION['nick'] = $nick;
    echo 'lolol';
} else {
    ?>
    <meta http-equiv="refresh" content="5; URL=?p=connexion">
    <? echo "connection fail";
}
?>
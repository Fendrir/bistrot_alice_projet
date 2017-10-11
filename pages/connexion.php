


<form action="" method="post">
    <input type="text" name="nick">
    <input type="password" name="pwd">
    <button class="btn" type="submit">send</button>
</form>

<?php


$sql = "SELECT adm_nick, adm_pwd FROM admin WHERE adm_oid = 1";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    $nick = $row["adm_nick"];
    $pwd = $row["adm_pwd"];
}


$nickPost = $_POST['nick'];

if ($nickPost === $nick && password_verify($_POST['pwd'], $pwd)) {
    $_SESSION['nick'] = $nickPost;
    header("refresh:5;url=?p=admin");
    
    
} else {
    echo "connection fail";
}

?>

<?php

if(isset($_GET['p'])){
    $p = $_GET['p'];
}else{
    $p = 'home';
}

ob_start();
if($p === 'home'){
    include('pages/home.php');
}
if($p === 'connexion'){
    include('pages/connexion.php');
}
if($p === 'admin'){
    include('pages/admin.php');
}
$content = ob_get_clean();
include('template/default.php');

?>

<?php
var_dump($_SESSION['nick']);
?>
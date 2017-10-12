<?php
session_start();

include('database/connect_bdd.php');

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
if($p === 'contact'){
    include('pages/contact.php');
}
$content = ob_get_clean();
include('template/default.php');
 
?>
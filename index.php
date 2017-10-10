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
$content = ob_get_clean();
include('template/default.php');

?>

<?php
include('template/header.php');
include('template/content_index.php');
include('template/footer.php');
?>

<?php
session_start();
include('database/connect_bdd.php');

if(htmlspecialchars(isset($_GET['p']), ENT_QUOTES)){
    $p = htmlspecialchars($_GET['p'], ENT_QUOTES);
}else{
    $p = 'home';
}

ob_start();
if($p === 'home'){
    include('pages/home.php');
}
elseif($p === 'connexion'){
    include('pages/connexion.php');
}
elseif($p === 'admin'){
    include('pages/admin.php');
}
elseif($p === 'administration'){
    include('pages/administration.php');
}
elseif($p === 'deconnexion'){
    include('pages/deconnexion.php');
}
elseif($p === 'upload'){
    include('pages/upload.php');
}
elseif($p === 'uploadevent'){
    include('pages/uploadevent.php');
}
elseif($p === 'delete_event'){
    include('pages/delete_event.php');
}
elseif($p === 'upload_plat'){
    include('pages/upload_plat.php');
}
elseif($p === 'upload_video'){
    include('pages/upload_video.php');
}
elseif($p === 'upload_prez'){
    include('pages/upload_prez.php');
}
elseif($p === 'upload_identifiers'){
    include('pages/upload_identifiers.php');
}
elseif($p === 'contact'){
    include('pages/contact.php');
} else  {
    include('pages/erreur.php');
}
$content = ob_get_clean();
include('template/default.php');
mysqli_close($conn);

?>
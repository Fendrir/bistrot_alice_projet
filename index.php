<?php
session_start();
//Connexion à la DB
include('database/connect_bdd.php');

//Set de $p par défaut pour afficher l'index
if(htmlspecialchars(isset($_GET['p']), ENT_QUOTES)){
    $p = htmlspecialchars($_GET['p'], ENT_QUOTES);
}else{
    $p = 'home';
}

//Mise en cache des pages
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
//stockage du include dans $content
$content = ob_get_clean();
//Include du template
include('template/default.php');
//Fermeture de la connexion à la DB
mysqli_close($conn);
?>
<?php

if(!isset($_SESSION['nick']) || $_SESSION['nick'] !== 'Franck') {
    $_SESSION['nick'] = 'Invité';
    $boutons = "";
}
if($_SESSION['nick'] === 'Franck'){
    $boutons = '<li><a href="?p=administration"><button class="btn">Gérer</button></a></li>
                <li><a href="?p=deconnexion"><button class="btn">Se déconnecter</button></a></li>';
}

?>
<div class="row justify-content-center">
<div class="col-3">
<ul class="list-unstyled">
<li><img class="img-fluid" src="../bistrot_alice_projet/images_bistrot/logo.png" alt="logo Bistro" sizes="" srcset=""></li>



<li><a href="?p=home">Accueil</a></li>
<li><a href="?p=contact">Contact</a></li>
<li><a href="?p=connexion">Connexion</a></li>
</ul>
<div class="row justify-content-center">
    <div class="col-auto">
<a href="https://www.facebook.com/LeBistrotDAlice/"><i class="fa fa-facebook-official fa-2x" aria-hidden="true" title="Facebook"></i></a> 
  <a href="https://twitter.com/"><i class="fa fa-twitter-square fa-2x" aria-hidden="true" title="Twitter"></i></a>
    <a href="https://www.tripadvisor.fr/Restaurant_Review-g187151-d11909210-Reviews-Le_Bistrot_D_Alice-Carcassonne_Aude_Occitanie.html" target="_blank"><i class="fa fa-tripadvisor fa-2x" aria-hidden="true" title="TripAdvisor"></i></a>
</div></div>

<div class="row justify-content-center">
<div class="col-auto">
    
    <img class="img-fluid flag-icon" src="node_modules/flag-icon-css/flags/1x1/fr.svg" alt="Français" title="Français">
    <img class="img-fluid flag-icon" src="node_modules/flag-icon-css/flags/1x1/us.svg" alt="Anglais" title="English">
</div></div>

<?php echo $boutons;
var_dump($_SESSION['nick']); ?>
</ul>
</div>

            <ul class="list-unstyled">
                <li><a href="?p=home">Accueil</a></li>
                <li>Contact</li>
                <li>
                    <ul class="list-inline">
                        <li>Fb</li>
                        <li>Twitter</li>
                        <li>Trip</li>
                        <li><a href="?p=connexion">Connexion</a></li>
                    </ul>
                <?php echo $boutons;
                var_dump($_SESSION['nick']); ?>
            </ul>
        </div>

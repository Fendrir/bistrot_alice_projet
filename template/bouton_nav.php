<?php
//Vérification du login pour l'affichage des boutons d'administration
if(!isset($_SESSION['nick']) || $_SESSION['nick'] !== 'Franck') {
    $_SESSION['nick'] = 'Invité';
    $boutons = "";
}
if($_SESSION['nick'] === 'Franck'){
    //Si l'admin est co les boutons s'affichent
    $boutons = '<a id="administration" class="menuButtonAdmin mt-2" href="?p=administration"><li class="align-self-center">Administration</li></a>
                <a id="deconnexion"  class="menuButtonDeco mt-2" href="?p=deconnexion"><li class="align-self-center">Se déconnecter</li></a>';

}

//Pour afficher le logo
function identifiers($server = 'localhost', $user = 'root', $pwd = 'admin', $db = 'bistrot')
{
    $conn = new mysqli($server, $user, $pwd, $db);
    $sql = "SELECT ide_title, ide_content FROM identifiers WHERE ide_oid = 1";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo '<a href="?p=home" alt="Accueil">';
        echo '<img class="img-fluid logo whiteDiv whiteDivNoBot" src="'.$row['ide_content'].'" alt="'.$row['ide_title'].'">';
        echo '</a>';
    }
}
?>

<div class="col-md-2">
    <nav class="row navbar-light">
        <div class="row">
            <div class="col-12">
        <?php
        identifiers();
        ?>
        </div>
        </div>
        <div class="container-fluid whiteDiv whiteDivNoTop p-3 mb-4">
            <div class="col">
                <ul class="navbar-nav row">
                    <a id="home" class="menuButton mt-2" href="?p=home"><li class="align-self-center">Accueil</li></a>
                    <a id="contact" class="menuButton mt-2" href="?p=contact"><li class="align-self-center">Contact</li></a>
                    <!--                        <li class="nav-item"><a class="nav-link" href="?p=connexion">Connexion</a></li>-->
                    <?php echo $boutons; ?>
                </ul>
            </div>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <a href="https://www.facebook.com/LeBistrotDAlice/" target="_blank"><i class="fa fa-facebook-official fa-2x" aria-hidden="true" title="Facebook"></i></a>
                    <a href="https://twitter.com/franck11bistrot" target="_blank"><i class="fa fa-twitter-square fa-2x ml-2" aria-hidden="true" title="Twitter"></i></a>
                    <a href="https://www.tripadvisor.fr/Restaurant_Review-g187151-d11909210-Reviews-Le_Bistrot_D_Alice-Carcassonne_Aude_Occitanie.html" target="_blank"><i class="fa fa-tripadvisor fa-2x ml-2" aria-hidden="true" title="TripAdvisor"></i></a>
                </div>
            </div>
            <div class="col-md text-center d-none d-md-block">
                <img class="img-fluid" src="images fixes/FaitMaison.png"/>
            </div>
            <div class="col-md text-center d-block d-sm-block d-md-none  mt-2">
                <img class="img-fluid-2" src="images fixes/FaitMaison.png"/>
            </div>
            <!--            <div class="row justify-content-center">-->
            <!--                <div class="col-auto">-->
            <!--                    <img class="img-fluid flag-icon" src="node_modules/flag-icon-css/flags/1x1/fr.svg" alt="Français" title="Français">-->
            <!--                    <img class="img-fluid flag-icon" src="node_modules/flag-icon-css/flags/1x1/gb.svg" alt="Anglais" title="English">-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
    </nav>
</div>


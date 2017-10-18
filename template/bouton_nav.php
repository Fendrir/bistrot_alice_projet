<?php

if(!isset($_SESSION['nick']) || $_SESSION['nick'] !== 'Franck') {
    $_SESSION['nick'] = 'Invité';
    $boutons = "";
}
if($_SESSION['nick'] === 'Franck'){

    $boutons = '<li class="nav-item align-self-center"><a class="nav-link" href="?p=administration"><div class="row-fluid btn_admin">Administrations </div></a></li>
                <li class="nav-item align-self-center"><a class="nav-link" href="?p=deconnexion"><div class="row-fluid btn_deco">Se déconnecter</div></a></li>';

}

function identifiers($server = 'localhost', $user = 'root', $pwd = 'admin', $db = 'bistrot')
{
    $conn = new mysqli($server, $user, $pwd, $db);
    $sql = "SELECT ide_title, ide_content FROM identifiers WHERE ide_oid = 1";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo '<img class="img-fluid" src="'.$row['ide_content'].'" alt="'.$row['ide_title'].'">';
    }
}
?>


    <div class="col-md-2">
        

        <nav class=" navbar-light" style="background-color: ;">
            
        <?php
        identifiers();
        ?>
 
        <div class="container-fluid">

            <div class="row">

                <div class="col-md">

                    <ul class="navbar-nav">

                        <li class="nav-item align-self-center"><a class="nav-link" href="?p=home"><div class="row btn_bordeau">Accueil</div></a></li>

                        <li class="nav-item align-self-center"><a class="nav-link" href="?p=contact"><div class="row btn_bordeau">Contact</div></a></li>

                        <!-- <li class="nav-item"><a class="nav-link" href="?p=connexion">Connexion</a></li> -->

                        <?php echo $boutons; ?>

                    </ul>
                </div>

            </div>
        </div>


            <div class="row justify-content-center">
                <div class="col-auto">
                    <a href="https://www.facebook.com/LeBistrotDAlice/"><i class="fa fa-facebook-official fa-2x" aria-hidden="true" title="Facebook"></i></a> 
                    <a href="https://twitter.com/"><i class="fa fa-twitter-square fa-2x" aria-hidden="true" title="Twitter"></i></a>
                    <a href="https://www.tripadvisor.fr/Restaurant_Review-g187151-d11909210-Reviews-Le_Bistrot_D_Alice-Carcassonne_Aude_Occitanie.html" target="_blank"><i class="fa fa-tripadvisor fa-2x" aria-hidden="true" title="TripAdvisor"></i></a>
                </div>
            </div>
                
            <div class="row justify-content-center">
                <div class="col-auto">
                        
                    <img class="img-fluid flag-icon" src="node_modules/flag-icon-css/flags/1x1/fr.svg" alt="Français" title="Français">
                    <img class="img-fluid flag-icon" src="node_modules/flag-icon-css/flags/1x1/gb.svg" alt="Anglais" title="English">
                </div>
            </div>

        

            

        </nav>

    </div>


<?php
if(!isset($_SESSION['nick']) || $_SESSION['nick'] !== 'Franck') {
    $_SESSION['nick'] = 'Invité';
    $boutons = "";
}
if($_SESSION['nick'] === 'Franck'){
    $boutons = '<li><button class="btn">Gérer</button></li>
                <li><a href="?p=deconnexion"><button class="btn">Se déconnecter</button></a></li>';
}
?>



    <div class="row">

        <div class="col-md-3">

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

    
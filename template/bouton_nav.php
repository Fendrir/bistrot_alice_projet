<?php

    $boutons ="";

  if(!empty($_SESSION['nick'])){

    $boutons = '<li><button class="btn">Gérer</button></li>
                <li><button class="btn">Se déconnecter</button></li>';

  }

?>



    <div class="row">

        <div class="col-md-3">

            <ul class="list-unstyled">
                <li><a href="?p=home">Accueil</a></li>
                <li><a href="?p=contact">Contact</a></li>
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

    
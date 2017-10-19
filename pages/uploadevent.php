<?php
if(!isset($_SESSION['nick']) || $_SESSION['nick'] !== 'Franck') {       //Si le user est arrivé ici par "hasard"
    ?>
    <!-- Erreur -->
    <div class="col-9 align-self-center text-center">
        <h1>Erreur !</h1>
        <p>Veuillez réessayer svp</p>
        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour à la page précédente</a>
    </div>
    <!-- FIN Erreur -->
    <?php
} else {
    if($_FILES['banEvent']['size'] !== 0 || $_FILES['image']['size'] !== 0){
        ?>
        <!-- Résumé du post -->
        <div class="col-9 align-self-center text-center border">
            <h1>Evènement ajouté avec succès !</h1>
            <div class="col mt-5">
                <h3><?= $_POST['titre'] ?></h3>
            </div>
                <div class="row mt-3">
                <div class="col">
                    <h5>Bannière de l'évènement</h5>
                    <?php
                    upload('banEvent', 1);
                    ?></div>
                <div class="col">
                    <h5>Carte à afficher</h5> <?php
                    upload('image', 2);
                    ?></div>
            </div>
            <div class="mt-3 mb-3">
                <a href="?p=administration">
                    <button class="btn btn-info">Retour à la page d'administration</button>
                </a>
            </div>
        </div>

        <!-- FIN Résumé du post -->
        <?php
    } else {
        echo 'erreur';
    }
}

function upload($inputName, $lineId, $server = 'localhost', $user = 'root', $pwd = 'admin', $db = 'bistrot')
{
    $conn = new mysqli($server, $user, $pwd, $db);

    $_FILES[$inputName]['name'];    //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_image.png).
    $_FILES[$inputName]['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
    $_FILES[$inputName]['error'];    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.

    if ($_FILES[$inputName]['error'] > 0) {        //S'il y a eu des erreurs lors de l'upload
        ?>
        <!-- Erreur -->
        <div class="col-9 align-self-center text-center">
            <h1>Erreur !</h1>
            <p>Veuillez réessayer svp</p>
            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour à la page précédente</a>
        </div>
        <!-- FIN Erreur -->
        <?php
    } else {
        $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');
        //1. strrchr renvoie l'extension avec le point (« . »).
        //2. substr(chaine,1) ignore le premier caractère de chaine.
        //3. strtolower met l'extension en minuscules.
        $extension_upload = strtolower(substr(strrchr($_FILES[$inputName]['name'], '.'), 1));
        if (in_array($extension_upload, $extensions_valides)) {     //Si l'extension du fichier correspond aux formats jpg, jpeg, gif ou png
            $sql = "SELECT eve_title, eve_img FROM events_restau WHERE eve_oid = $lineId"; //Select de la row de l'event
            $result = $conn->query($sql);

            if (!is_dir('images')) {        //Si le dossier images n'existe pas on le créer
                mkdir('images');
            }
          
            while ($row = $result->fetch_assoc()) {
                if (!empty($row['eve_img'])){
                    $image = $row['eve_img'];
                    unlink($image);
                }
            }

            $tmp_name = $_FILES[$inputName]['tmp_name'];                           //Récupération du chemin de l'image uploadée
            $name = 'event' . $lineId . $_FILES[$inputName]['name'];                   //Modification du nom de l'image pour la rendre unique sur le serveur
            $path = "images";                                                   //Chemin pour diriger l'image
            $pathDB = "$path/$name";                                            //Concaténation du chemin + nom de l'image
            $resultat = move_uploaded_file($tmp_name, "$pathDB");    //Mouvement de l'image uploadée vers le fichier ciblé
            if ($resultat) {        //Si tout est OK, mise à jour de la DB
                $titre = $_POST['titre'];
                $sql2 = "UPDATE events_restau SET eve_title = '$titre', eve_img = '$pathDB', eve_alt='$pathDB' WHERE eve_oid = $lineId";
                $conn->query($sql2);
                ?>
                <!-- Chemin de l'image -->

                <img class="taille" src="<?= $pathDB ?>" alt="<?= $pathDB ?>"/>

                <!-- FIN chemin de l'image -->
                <?php
            }
        } else {
            ?>
            <!-- Erreur -->
            <div class="col-9 align-self-center text-center">
                <h1>Erreur !</h1>
                <p>Mauvais format d'image !</p>
                <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour à la page précédente</a>
            </div>
            <!-- FIN Erreur -->
            <?php
        }
    }
}?>
<?php
$nickSession = $_SESSION['nick'];
if(htmlspecialchars(!isset($nickSession), ENT_QUOTES) || htmlspecialchars($nickSession, ENT_QUOTES) !== 'Franck') {       //Si le user est arrivé ici par "hasard"
    ?>
    <!-- Erreur -->
    <div class="col text-center">
        <div class="col whiteDiv">
            <h1>Erreur !</h1>
            <p>Veuillez réessayer svp</p>
            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour à la page précédente</a>
        </div>
    </div>
    <!-- FIN Erreur -->
    <?php
} else {
    if(htmlspecialchars($_FILES['banEvent']['size'], ENT_QUOTES) !== 0 || htmlspecialchars($_FILES['image']['size'], ENT_QUOTES) !== 0){
        ?>
        <!-- Résumé du post -->
        <div class="col text-center">
            <div class="col whiteDiv">
                <h1>Evènement ajouté avec succès !</h1>
                <div class="col mb-3">
                    <h3><?= $_POST['titre'] ?></h3>
                </div>
                <div class="row">
                    <div class="col">
                        <h5 class="mt-3 mb-3">Bannière de l'évènement</h5>
                        <?php
                        upload('banEvent', 1);
                        ?></div>
                    <div class="col">
                        <h5 class="mt-3 mb-3">Carte à afficher</h5> <?php
                        upload('image', 2);
                        ?></div>
                </div>
                <div class="mt-3 mb-3">
                    <a href="?p=administration&div=buttonEventDiv">
                        <button class="btn btn-info">Retour à la page d'administration</button>
                    </a>
                </div>
            </div>
        </div>
        <!-- FIN Résumé du post -->
        <?php
    } else {
        ?>
        <div class="col text-center">
            <div class="col whiteDiv">
                <h1>Erreur !</h1>
                <p>Veuillez réessayer svp</p>
                <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour à la page précédente</a>
            </div>
        </div>
        <?php
    }
}

function upload($inputName, $lineId, $server = 'localhost', $user = 'root', $pwd = 'admin', $db = 'bistrot')
{
    $conn = new mysqli($server, $user, $pwd, $db);

    htmlspecialchars($_FILES[$inputName]['name'], ENT_QUOTES);    //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_image.png).
    htmlspecialchars($_FILES[$inputName]['tmp_name'], ENT_QUOTES); //L'adresse vers le fichier uploadé dans le répertoire temporaire.
    htmlspecialchars($_FILES[$inputName]['error'], ENT_QUOTES);    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.

    if (htmlspecialchars($_FILES[$inputName]['error'] , ENT_QUOTES)> 0) {        //S'il y a eu des erreurs lors de l'upload
        ?>
        <!-- Erreur -->
        <div class="col text-center">
            <div class="col whiteDiv">
                <h1>Erreur !</h1>
                <p>Veuillez réessayer svp</p>
                <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour à la page précédente</a>
            </div>
        </div>
        <!-- FIN Erreur -->
        <?php
    } else {
        $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');
        //1. strrchr renvoie l'extension avec le point (« . »).
        //2. substr(chaine,1) ignore le premier caractère de chaine.
        //3. strtolower met l'extension en minuscules.
        //4. Comparaison de l'extension du fichier avec le contenu du tableau précédent
        $extension_upload = strtolower(substr(strrchr(htmlspecialchars($_FILES[$inputName]['name'], ENT_QUOTES), '.'), 1));
        if (in_array($extension_upload, $extensions_valides)) {     //Si l'extension du fichier correspond aux formats jpg, jpeg, gif ou png
            $sql = "SELECT eve_title, eve_img FROM events_restau WHERE eve_oid = $lineId"; //Select de la row de l'event
            $result = $conn->query($sql);

            if (!is_dir('images')) {        //Si le dossier images n'existe pas on le crée
                mkdir('images');
            }

            while ($row = $result->fetch_assoc()) {
                if (!empty($row['eve_img'])){
                    $image = $row['eve_img'];
                    unlink($image);
                }
            }

            $tmp_name = htmlspecialchars($_FILES[$inputName]['tmp_name'], ENT_QUOTES);                     //Récupération du chemin de l'image uploadée
            $name = 'event' . $lineId . htmlspecialchars($_FILES[$inputName]['name'], ENT_QUOTES);         //Modification du nom de l'image pour la rendre unique sur le serveur
            $path = "images";                                                                                    //Chemin pour diriger l'image
            $pathDB = "$path/$name";                                                                             //Concaténation du chemin + nom de l'image
            $resultat = move_uploaded_file($tmp_name, "$pathDB");                                     //Mouvement de l'image uploadée vers le fichier ciblé
            if ($resultat) {                                                                                    //Si tout est OK, mise à jour de la DB
                $titre = $_POST['titre'];
                $sql2 = "UPDATE events_restau SET eve_title = '$titre', eve_img = '$pathDB', eve_alt='$pathDB' WHERE eve_oid = $lineId";
                $conn->query($sql2);
                ?>
                <!-- Chemin de l'image -->

                <img class="img-fluid" src="<?= $pathDB ?>" alt="<?= $pathDB ?>"/>

                <!-- FIN chemin de l'image -->
                <?php
            }
        } else {
            ?>
            <!-- Erreur -->
            <div class="col text-center">
                <div class="col whiteDiv">
                    <h1>Erreur !</h1>
                    <p>Mauvais format d'image !</p>
                    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour à la page précédente</a>
                </div>
            </div>
            <!-- FIN Erreur -->
            <?php
        }
    }
}?>
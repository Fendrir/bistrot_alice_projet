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
    $id = htmlspecialchars($_GET['id']);
    htmlspecialchars($_FILES['image']['name'], ENT_QUOTES);    //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_image.png).
    htmlspecialchars($_FILES['image']['tmp_name'], ENT_QUOTES); //L'adresse vers le fichier uploadé dans le répertoire temporaire.
    htmlspecialchars($_FILES['image']['error'], ENT_QUOTES);    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.

    if (htmlspecialchars($_FILES['image']['error'] , ENT_QUOTES)> 0) {        //S'il y a eu des erreurs lors de l'upload
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
        $extension_upload = strtolower(substr(strrchr(htmlspecialchars($_FILES['image']['name'], ENT_QUOTES), '.'), 1));
        if(in_array($extension_upload, $extensions_valides)) {     //Si l'extension du fichier correspond aux formats jpg, jpeg, gif ou png
            $sql = "SELECT ide_title, ide_content FROM identifiers WHERE ide_oid = '".$id."'"; //Select de la row de l'event
            $result = $conn->query($sql);

            // Suppression de l'ancienne image sur le serveur
            while ($row = $result->fetch_assoc()) {
                if(!empty($row['ide_content'])){
                    $image = $row['ide_content'];
                    unlink($image);
                }
            }

            if (!is_dir('images')) {        //Si le dossier images n'existe pas on le crée
                mkdir('images');
            }

            $tmp_name = htmlspecialchars($_FILES['image']['tmp_name'], ENT_QUOTES);                      //Récupération du chemin de l'image uploadée
            $name = 'identifiers' . $id . htmlspecialchars($_FILES['image']['name'], ENT_QUOTES);        //Modification du nom de l'image pour la rendre unique sur le serveur
            $path = "images";                                                                                  //Chemin pour diriger l'image
            $pathDB = "$path/$name";                                                                           //Concaténation du chemin + nom de l'image
            $resultat = move_uploaded_file($tmp_name, "$pathDB");                                   //Mouvement de l'image uploadée vers le fichier ciblé
            if ($resultat) {                                                                                  //Si tout est OK, mise à jour DB
                $titre = htmlspecialchars($_POST['titre'], ENT_QUOTES);
                if($id === '1'){
                    $sql2 = "UPDATE identifiers SET ide_title = 'Logo', ide_content = '$pathDB' WHERE ide_oid = 1";
                } else {
                    $sql2 = "UPDATE identifiers SET ide_title = 'Bannière', ide_content = '$pathDB' WHERE ide_oid = 2";
                }
                $result2 = $conn->query($sql2);
                ?>
                <!-- Résumé du post -->
                <div class="col text-center">
                    <div class="col whiteDiv">
                        <h1>Image ajoutée avec succès !</h1>
                        <div class="col mt-5">
                            <h3><?= htmlspecialchars($_POST['titre'], ENT_QUOTES) ?></h3>
                        </div>
                        <div class="col">
                            <img class="img-fluid" src="<?= $pathDB ?>" alt="<?= $pathDB ?>"/>
                        </div>
                        <div class="mt-3 mb-3">
                            <a href="?p=administration&div=buttonDiversDiv">
                                <button class="btn btn-info">Retour à la page d'administration</button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- FIN Résumé du post -->
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
}
?>
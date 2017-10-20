<?php
$nickSession = $_SESSION['nick'];
if(htmlspecialchars(!isset($nickSession), ENT_QUOTES) || htmlspecialchars($nickSession, ENT_QUOTES) !== 'Franck') {       //Si le user est arrivé ici par "hasard"
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
    function banEvent($server = 'localhost', $user = 'root', $pwd = 'admin', $db = 'bistrot')
    {
        $conn = new mysqli($server, $user, $pwd, $db);
        $sql = "SELECT eve_title, eve_img, eve_alt FROM events_restau WHERE eve_oid = 1";
        $result = $conn->query($sql);
        $sql2 = "SELECT eve_title, eve_img, eve_alt FROM events_restau WHERE eve_oid = 2";
        $result2 = $conn->query($sql2);

        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="buttonEventDiv divToHide whiteDiv hidden row border">
                <div class="col-md-7 align-self-center">
                    <form class="mt-3" method="post" action="?p=uploadevent" enctype="multipart/form-data">
                        <h5 class="mt-3">Bannière de l'évènement</h5>
                        <input class="btn btn-info" type="file" name="banEvent" id="content" required/><br>
                        <h5 class="mt-3">Image de l'évènement</h5>
                        <input class="btn btn-info" type="file" name="image" id="content" required/><br>
                        <input class="form-group mt-3 text-center inputName" maxlength="50" type="text" name="titre" id="titre" placeholder="Nom de l'évènement" autocomplete="off"><br>
                        <button class="btn btn-info button_admin form-group" type="submit">Envoyer</button>
                    </form>
                    <form id="buttonDeleteEvent" class="hidden" action="?p=delete_event&id=1" method="post">
                        <button class="button_admin btn btn-info">Supprimer</button>
                    </form>
                </div>
                <div class="col-md-5 align-self-center">
                    <div class="col mt-3">
                        <i><h4 id="titleEvent"><?= $row['eve_title'] ?></h4></i>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 titleEvent crop">
                            <h5>Bannière de l'évènement</h5>
                            <img class="img-fluid myImg imgEvent" src="<?= $row['eve_img'] ?>" alt="<?= $row['eve_alt'] ?>"/>
                        </div>
                        <div class="col-md-12 titleEvent mt-4 mb-4">
                            <h5>Carte de l'évènement</h5>
                            <?php
                            while ($row2 = $result2->fetch_assoc()) {
                                echo '<img class="img-fluid myImg imgEvent" alt="'.$row2['eve_img'].'" src="'.$row2['eve_img'].'"/>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    function multi($globalDivTitle = 'buttonPlat', $title = 'pla_title', $img = 'pla_img', $table = 'plat', $oid = 'pla_oid',
                   $titleDiv = 'Plat', $titleInputFile = 'Image du plat',
                   $titleInput = 'Nom du plat', $uploadURL = '?p=upload_plat',
                   $server = 'localhost', $user = 'root', $pwd = 'admin', $db = 'bistrot'){

        $conn = new mysqli($server, $user, $pwd, $db);
        $sql = "SELECT $title, $img FROM $table WHERE $oid > 0";
        $result = $conn->query($sql);
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="<?= $globalDivTitle; ?>Div divToHide whiteDiv hidden border row mb-3">
                <div class="col-md-7 align-self-center mt-3">
                    <h4><?= $titleDiv . ' ' . $i; ?> - <i><?= $row[$title] ?></i></h4>
                    <form class="mt-3" method="post" action="<?= $uploadURL . '&id=' . $i; ?>"
                          enctype="multipart/form-data">
                        <h5 class="mb-2"><?= $titleInputFile; ?></h5>
                        <input class="btn btn-info" type="file" name="image" required/><br>
                        <input class="form-group mt-3 text-center inputName" maxlength="50" type="text" name="titre" id="titre" placeholder="<?= $titleInput; ?>" autocomplete="off"><br>
                        <button class="button_admin btn btn-info" type="submit">Envoyer</button>
                    </form>
                </div>
                <div class="col-md-5 align-self-center mt-3 mb-3">
                    <img class="taille img-fluid myImg" src="<?= $row[$img] ?>" alt="<?= $row[$title] ?>"/>
                </div>
            </div>
            <?php
            $i++;
        }
    }

    function video($server = 'localhost', $user = 'root', $pwd = 'admin', $db = 'bistrot'){
        $conn = new mysqli($server, $user, $pwd, $db);
        $sql = "SELECT vid_link FROM video WHERE vid_oid = 1";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            ?>
            <div class="buttonVideoDiv divToHide whiteDiv hidden border row">
                <div class="col-md-6 align-self-center">
                    <h4>Vidéo</h4>
                    <form class="mt-3" method="post" action="?p=upload_video">
                        <input class="form-group inputName text-center" maxlength="50" id="videoLink" name="videoLink" type="text" placeholder="ID de la vidéo" required><br>
                        <button class="button_admin btn btn-info" type="submit">Envoyer</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <iframe class="taillevideo-admin mt-3 mb-3" src="https://youtube.com/embed/<?= $row['vid_link'] ?>" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <?php
        }
    }

    function presentation($server = 'localhost', $user = 'root', $pwd = 'admin', $db = 'bistrot')
    {
        $conn = new mysqli($server, $user, $pwd, $db);
        $sql = "SELECT pre_title, pre_content FROM presentation WHERE pre_oid = 1";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="buttonPrezDiv divToHide whiteDiv hidden border row">
                <div class="col-12">
                    <form class="mt-3" method="post" action="?p=upload_prez">
                        <h5><label for="prezTitle"></label></h5>
                        <input class="form-group inputName text-center" maxlength="50" type="text" id="prezTitle" name="prezTitle" placeholder="Titre de présentation (optionnel)">
                        <h5 for="prezContent">Texte de présentation</h5>
                        <textarea class="form-group inputName texteAreaAdmin" id="prezContent" name="prezContent" rows="10" required><?= $row['pre_content'] ?></textarea>
                        <button class="button_admin btn btn-info mt-3" type="submit">Envoyer</button>
                    </form>
                </div>

            </div>
            <?php
        }
    }
}
?>

<div class="col-9 text-center">
    <div class="row">
        <div class="col-12">

            <ul class="list-inline buttons-administration">
                <li class="list-inline-item mt-3"><button id="buttonEvent" class="btn btn-info">Evènements</button></li>
                <li class="list-inline-item mt-3"><button id="buttonVideo" class="btn btn-info">Vidéo</button></li>
                <li class="list-inline-item mt-3"><button id="buttonCarte" class="btn btn-info">Cartes</button></li>
                <li class="list-inline-item mt-3"><button id="buttonPlat" class="btn btn-info">Plats</button></li>
                <li class="list-inline-item mt-3"><button id="buttonDivers" class="btn btn-info">Divers</button></li>
                <li class="list-inline-item mt-3"><button id="buttonPrez" class="btn btn-info">Présentation</button></li>
            </ul>
        </div>
        <div class="col-12">
        <?php
        banEvent(); // GESTION DES EVENTS
        video();    // GESTION DE LA VIDEO
        multi();    // GESTION DES PLATS
        multi('buttonCarte', 'car_title', 'car_img', 'carte', 'car_oid',
            'Carte', 'Image de la carte', 'Nom de la carte', '?p=upload');  //GESTION DES CARTES
        multi('buttonDivers', 'ide_title', 'ide_content', 'identifiers', 'ide_oid',
            'Divers', 'Image', 'Titre de l\'image', '?p=upload_identifiers');    // GESTION DES DIVERS
        presentation();
            ?>
        </div>
    </div>
</div>
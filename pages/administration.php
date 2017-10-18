<?php
if(!isset($_SESSION['nick']) || $_SESSION['nick'] !== 'Franck') {
    echo 'erreur lolilol';
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
            <div class="col-md-4 btn btn-warning">
                <form class="mt-3 btn btn-info" method="post" action="?p=uploadevent" enctype="multipart/form-data">
                    <h5 class="mt-3">Bannière de l'évènement</h5>
                    <input class="btn btn-warning" type="file" name="banEvent" id="content" required/><br>
                    <h5 class="mt-3">Image de l'évènement</h5>
                    <input class="btn btn-warning" type="file" name="image" id="content" required/><br>
                    <input class="input-group mt-3 text-center" type="text" name="titre" id="titre" placeholder="Nom de l'évènement" autocomplete="off"><br>
                    <button class="btn btn-warning" type="submit">Envoyer</button>
                </form>
                <form id="buttonDeleteEvent" class="hidden" action="?p=delete_event&id=1" method="post">
                    <button class="button_admin btn btn-danger">Supprimer</button>
                </form>
            </div>
            <div class="col-md-4 align-self-center">
                <div class="col">
                    <h4 id="titleEvent"><?= $row['eve_title'] ?></h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 titleEvent crop">
                        <h5>Bannière de l'évènement</h5>
                        <img class="taille myImg imgEvent" src="<?= $row['eve_img'] ?>" alt="<?= $row['eve_alt'] ?>"/>
                    </div>
                    <div class="col-md-12 titleEvent crop mt-4 mb-4">
                        <h5>Carte de l'évènement</h5>
                        <?php
                        while ($row2 = $result2->fetch_assoc()) {
                            echo '<img class="taille myImg imgEvent" alt="'.$row2['eve_img'].'" src="'.$row2['eve_img'].'"/>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    function video($server = 'localhost', $user = 'root', $pwd = 'admin', $db = 'bistrot'){
        $conn = new mysqli($server, $user, $pwd, $db);
        $sql = "SELECT vid_link FROM video WHERE vid_oid = 1";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            ?>
            <div class="col-md-4 border btn btn-warning">
                <h4>Vidéo</h4>
                <form class="mt-3" method="post" action="?p=upload_video">
                    <h5><label for="videoLink">Lien de la vidéo</label></h5>
                    <input class="form-group" id="videoLink" name="videoLink" type="text" required><br>
                    <button class="button_admin btn btn-info" type="submit">Envoyer</button>
                </form>
                    <h4>Aperçu</h4>
                    <iframe class="taillevideo-admin text-center" src="https://www.youtube.com/embed/<?= $row['vid_link'] ?>" frameborder="0" allowfullscreen></iframe>
            </div>
            <?php
        }
    }

    function multi($title = 'pla_title', $img = 'pla_img', $table = 'plat', $oid = 'pla_oid',
                   $titleDiv = 'Plat', $titleInputFile = 'Image du plat',
                   $titleInput = 'Nom du plat', $uploadURL = '?p=upload_plat',
                   $server = 'localhost', $user = 'root', $pwd = 'admin', $db = 'bistrot'){

        $conn = new mysqli($server, $user, $pwd, $db);
        $sql = "SELECT $title, $img FROM $table WHERE $oid > 0";
        $result = $conn->query($sql);
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="col-md-4 border btn btn-warning">
                <h4><?= $titleDiv . ' ' . $i; ?></h4>
                <form class="mt-3" method="post" action="<?= $uploadURL . '&id=' . $i; ?>"
                      enctype="multipart/form-data">
                    <h5><?= $titleInputFile; ?></h5>
                    <input class="btn btn-info" type="file" name="image" required/><br>
                    <input class="form-group mt-3 text-center" type="text" name="titre" id="titre" placeholder="<?= $titleInput; ?>" autocomplete="off"><br>
                    <button class="button_admin btn btn-info" type="submit">Envoyer</button>
                </form>
                <div class="col">
                    <h4><?= $row[$title] ?></h4>
                    <img class="taille img-fluid myImg align-middle" src="<?= $row[$img] ?>" alt="<?= $row[$title] ?>"/></div>
            </div>
            <?php
            $i++;
        }
    }
}
?>

<div class="col-9 text-center">
    <div class="row">
        <?php
        banEvent(); // GESTION DES EVENTS
        video();    // GESTION DE LA VIDEO
        multi();    // GESTION DES PLATS
        multi('car_title', 'car_img', 'carte', 'car_oid',
            'Carte', 'Image de la carte', 'Nom de la carte', '?p=upload');  //GESTION DES CARTES

        ?>
    </div>
</div>
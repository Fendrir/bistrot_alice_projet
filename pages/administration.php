<?php
if(!isset($_SESSION['nick']) || $_SESSION['nick'] !== 'Franck') {
    echo 'erreur lolilol';

} else {
function multi($title = 'pla_title', $img = 'pla_img', $table = 'plat', $oid = 'pla_oid',
               $titleDiv = 'Plat', $titleInputFile = 'Image du plat', $titleInput = 'Nom du plat', $uploadURL = '?p=upload_plat'){
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "bistrot";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT $title, $img FROM $table WHERE $oid > 0";
    $result = $conn->query($sql);
    $i = 1;
    while($row = $result->fetch_assoc()){
        ?>
        <!-- GESTION DES PLATS AFFICHES -->
        <div class="row">
            <div class="col border border-top-0 align-middle">
                <h4><?= $titleDiv.' '.$i; ?></h4>
                <form class="mt-3 btn btn-warning" method="post" action="<?= $uploadURL.'&id='.$i; ?>" enctype="multipart/form-data">
                    <h5><?= $titleInputFile; ?></h5>
                    <input class="btn btn-warning" type="file" name="image"/><br>
                    <label class="mt-3" for="titre"><h5><?= $titleInput; ?></h5></label>
                    <input class="input-group" type="text" name="titre" id="titre"><br>
                    <button class="btn btn-info" type="submit">Envoyer</button>
                </form>
            </div>
            <div class="col border border-top-0 border-left-0"><h4><?= $row[$title] ?></h4>
                <img class="taille align-middle" alt="<?= $row[$img] ?>" src="<?= $row[$img] ?>"/></div>
        </div>
        <!-- FIN GESTION DES PLATS -->
        <?php
        $i++;
    }
}
?>

<div class="col-9 text-center">
    <?php
    $sql = "SELECT eve_title, eve_img FROM events_restau WHERE eve_oid = 1";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
        ?>

        <!-- GESTION DES EVENEMENTS -->
        <div class="row">
            <div class="col border">
                <h4>Evènement</h4>

                <form class="mt-3 btn btn-info" method="post" action="?p=uploadevent&id=1" enctype="multipart/form-data">
                    <h5 class="mt-3">Image de l'évènement</h5>
                    <input class="btn btn-warning" type="file" name="image" id="content" /><br>
                    <label class="mt-3" for="titre"><h5>Nom de l'évènement</h5></label>
                    <input class="input-group" type="text" name="titre" id="titre"><br>
                    <button class="btn btn-warning" type="submit">Envoyer</button>
                </form>
                <form action="?p=delete_event&id=1" method="post">
                    <button class="btn btn-danger">Supprimer l'évènement</button>
                </form>
            </div>
            <div class="col border border-left-0"><h4><?= $row['eve_title'] ?></h4>
                <img class="taille align-middle" alt="<?= $row['eve_img'] ?>" src="<?= $row['eve_img'] ?>"/></div>
        </div>
        <!-- FIN GESTION DES EVENEMENTS -->
        <?php
    }

    multi();    // GESTION DES PLATS
    multi('car_title', 'car_img', 'carte', 'car_oid',
        'Carte', 'Image de la carte', 'Nom de la carte', '?p=upload');  //GESTION DES CARTES
    }
    ?>

</div>

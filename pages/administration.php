<?php
if(!isset($_SESSION['nick']) || $_SESSION['nick'] !== 'Franck') {
    echo 'erreur lolilol';

} else {
?>

<div class="col-9 text-center">
    <?php
    $sql = "SELECT car_title, car_img FROM carte WHERE car_oid > 0";
    $result = $conn->query($sql);
    $i = 1;
    while($row = $result->fetch_assoc()){
        ?>
        <!-- GESTION DE LA CARTE <?= $i ?>-->
        <div class="row mt-0">
            <div class="col border border-bottom-0 align-middle">
                <h4>Plat <?= $i; ?></h4>

                <form class="mt-3 btn btn-warning" method="post" action="?p=upload&id=<?= $i ?>" enctype="multipart/form-data">
                    <h5>Image du plat</h5>
                    <input class="btn btn-warning" type="file" name="image"/><br>
                    <label class="mt-3" for="titre"><h5>Nom du plat</h5></label>
                    <input class="input-group" type="text" name="titre" id="titre"><br>
                    <button class="btn btn-info" type="submit">Envoyer</button>
                </form>
            </div>
            <div class="col border border-left-0 border-bottom-0"><h4><?= $row['car_title'] ?></h4>
                <img class="taille align-middle" alt="<?= $row['car_img'] ?>" src="<?= $row['car_img'] ?>"/></div>
        </div>
        <?php
        $i++;
    }
    $sql = "SELECT eve_title, eve_img FROM events_restau WHERE eve_oid = 1";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
        ?>
        <!-- FIN GESTION DES CARTES -->
        <!-- GESTION DES EVENEMENTS -->

        <div class="row">
            <div class="col border">
                <h4>Evènement</h4>

                <form class="mt-3 btn btn-info" method="post" action="?p=upload&id=<?= $i ?>" enctype="multipart/form-data">
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
        <?php
    }
    }
    ?>
    <!-- FIN GESTION DES EVENEMENTS -->
</div>

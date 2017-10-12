<?php
if(!isset($_SESSION['nick']) || $_SESSION['nick'] !== 'Franck') {
    echo 'erreur lolilol';

} else {
?>

<div class="col-9">
    <?php
    $sql = "SELECT car_title, car_img FROM carte WHERE car_oid > 0";
    $result = $conn->query($sql);
    $i = 1;
    while($row = $result->fetch_assoc()){
        ?>
        <!-- GESTION DE LA CARTE <?= $i ?>-->
        <div class="row">
            <div class="col">

                <form method="post" action="?p=upload&id=<?= $i ?>" enctype="multipart/form-data">
                    <input type="file" name="image" id="mon_fichier" /><br />
                    <label for="titre">Titre du fichier (max. 50 caractères) :</label><br />
                    <input type="text" name="titre" id="titre">
                    <input type="submit" name="submit" value="Envoyer" />
                </form>
            </div>
            <div class="col"><h3><?= $row['car_title'] ?></h3>
                <img alt="<?= $row['car_img'] ?>" src="<?= $row['car_img'] ?>"/></div>
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
            <div class="col">

                <form method="post" action="?p=uploadevent&id=1" enctype="multipart/form-data">
                    <input type="file" name="image" id="mon_fichier" /><br />
                    <label for="titre">Titre du fichier (max. 50 caractères) :</label><br />
                    <input type="text" name="titre" id="titre">
                    <input type="submit" name="submit" value="Envoyer" />
                </form>
                <form action="?p=delete_event&id=1" method="post">
                    <button class="btn btn-danger">Supprimer l'évènement</button>
                </form>
            </div>

            <div class="col" id="event"><h3><?= $row['eve_title'] ?></h3>
                <img alt="<?= $row['eve_img'] ?>" src="<?= $row['eve_img'] ?>"/></div>
        </div>
        <?php
    }
    }
    ?>
    <!-- FIN GESTION DES EVENEMENTS -->
</div>

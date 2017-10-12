<?php
if(!isset($_SESSION['nick']) || $_SESSION['nick'] !== 'Franck') {
    echo 'erreur lolilol';

    } else {
?>
    <form method="post" action="?p=upload&id=2" enctype="multipart/form-data">
        <label for="mon_fichier">Fichier (tous formats | max. 1 Mo) :</label><br />
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
        <input type="file" name="image" id="mon_fichier" /><br />
        <label for="titre">Titre du fichier (max. 50 caractères) :</label><br />
        <input type="text" name="titre" id="titre">
        <input type="submit" name="submit" value="Envoyer" />
    </form>

<?php
    $sql = "SELECT car_title, car_img FROM carte WHERE car_oid = '2'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
        echo $row['car_title'];
        echo '<img src="'.$row['car_img'].'"/>"';

    }
}
?>



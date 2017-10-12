<?php
if(!isset($_SESSION['nick']) || $_SESSION['nick'] !== 'Franck') {
    echo 'erreur lolilol';

} else {

    $sql = "SELECT car_title, car_img FROM carte WHERE car_oid = '2'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
        echo $row['car_title'];
        echo $row['car_img'];

    }

    unlink('../images/'.$row['car_img']);
    $_FILES['image']['name'];    //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_image.png).
    $_FILES['image']['type'];     //Le type du fichier. Par exemple, cela peut être « image/png ».
    $_FILES['image']['size'];     //La taille du fichier en octets.
    $_FILES['image']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
    $_FILES['image']['error'];    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.

    var_dump($_FILES);

    if ($_FILES['image']['error'] > 0) $erreur = "Erreur lors du transfert";

    $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
    $extension_upload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
    if (in_array($extension_upload, $extensions_valides)) echo "Extension correcte";

    $image_sizes = getimagesize($_FILES['image']['tmp_name']);

    if (!is_dir('../images')) {
        mkdir('../images');
    }

    $tmp_name = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    $path = "../images/";
    $pathDB = "$path/$name";
    $resultat = move_uploaded_file($tmp_name, "$pathDB");
    if ($resultat) echo "Transfert réussi";

    $titre = $_POST['titre'];
    echo $titre;
    $sql2 = "UPDATE carte SET car_title = '$titre', car_img = '$pathDB' WHERE car_oid = '2'";
    $result2 = $conn->query($sql2);
}
?>

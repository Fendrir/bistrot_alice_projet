<?php
if(!isset($_SESSION['nick']) || $_SESSION['nick'] !== 'Franck') {
    echo 'erreur lolilol';

    } else {
?>
    <form action="?p=upload&id=1" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
    <form action="?p=upload&id=2" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
    <form action="?p=upload&id=3" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
<?php
}
?>

<?php
$sql = "SELECT car_title, car_img FROM carte WHERE car_oid > 1";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    echo $row['car_title'];
    echo '<img src="'.$row['car_img'].'"/>';
}
//$row = $result->fetch_row();
//
//$nick = $row[1];
//$img = $row[2];

var_dump($row[2]);
echo $nick;
echo "<img src=".$img."/>";
?>

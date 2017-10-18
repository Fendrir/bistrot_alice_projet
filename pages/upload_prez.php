<?php
if(!isset($_SESSION['nick']) || $_SESSION['nick'] !== 'Franck') {
    echo 'erreur lolilol';

} else {
    $prezTitle = $_POST['prezTitle'];
    $prezContent = $_POST['prezContent'];
    $sql = "UPDATE presentation SET pre_title = '$prezTitle', pre_content = '$prezContent' WHERE pre_oid = 1";
    $result = $conn->query($sql);
    ?>
    <!-- Résumé du post -->
    <div class="col-9 align-self-center text-center border">
        <h1>Présentation modifiée avec succès !</h1>
        <div class="col mt-5">
            <h3><?= $prezTitle ?></h3>
        </div>
        <div class="mt-3">
            <p><?= $prezContent ?></p>
        </div>
        <div class="mt-3 mb-3">
            <a href="?p=administration">
                <button class="btn btn-info">Retour à la page d'administration</button>
            </a>
        </div>
    </div>
    <!-- FIN Résumé du post -->
    <?php
}
?>

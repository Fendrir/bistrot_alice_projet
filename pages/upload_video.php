<?php
if(!isset($_SESSION['nick']) || $_SESSION['nick'] !== 'Franck') {
    echo 'erreur lolilol';

} else {
    $videoLink = $_POST['videoLink'];
    $sql = "UPDATE video SET vid_link = '$videoLink' WHERE vid_oid = 1";
    $result = $conn->query($sql);
    ?>
    <!-- Résumé du post -->
    <div class="col-9 align-self-center text-center border">
        <h1>Vidéo ajoutée avec succès !</h1>
        <div class="col mt-5">
            <iframe class="taillevideo text-center" src="https://www.youtube.com/embed/<?= $videoLink ?>" frameborder="0"
                    allowfullscreen></iframe>
        </div>
        <div class="mt-3 mb-3">
            <a href="?p=administration&div=buttonVideoDiv">
                <button class="btn btn-info">Retour à la page d'administration</button>
            </a>
        </div>
    </div>
    <!-- FIN Résumé du post -->
    <?php
}
?>

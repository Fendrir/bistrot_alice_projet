<?php
$nickSession = $_SESSION['nick'];
if(htmlspecialchars(!isset($nickSession), ENT_QUOTES) || htmlspecialchars($nickSession, ENT_QUOTES) !== 'Franck') {       //Si le user est arrivé ici par "hasard"
    ?>
    <!-- Erreur -->
    <div class="col-9 whiteDiv align-self-center text-center">
        <h1>Erreur !</h1>
        <p>Veuillez réessayer svp</p>
        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour à la page précédente</a>
    </div>
    <!-- FIN Erreur -->
    <?php
} else {
    $videoLink = htmlspecialchars($_POST['videoLink'], ENT_QUOTES);
    $sql = "UPDATE video SET vid_link = '$videoLink' WHERE vid_oid = 1";
    $result = $conn->query($sql);
    ?>
    <!-- Résumé du post -->
    <div class="col-9 whiteDiv align-self-center text-center border">
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

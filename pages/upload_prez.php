<?php
$nickSession = $_SESSION['nick'];
if(htmlspecialchars(!isset($nickSession), ENT_QUOTES) || htmlspecialchars($nickSession, ENT_QUOTES) !== 'Franck') {       //Si le user est arrivé ici par "hasard"
    ?>
    <!-- Erreur -->
    <div class="col-9 align-self-center text-center">
        <h1>Erreur !</h1>
        <p>Veuillez réessayer svp</p>
        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour à la page précédente</a>
    </div>
    <!-- FIN Erreur -->
    <?php
} else {
    $prezTitle = htmlspecialchars($_POST['prezTitle'], ENT_QUOTES);
    $prezContent = htmlspecialchars($_POST['prezContent'], ENT_QUOTES);
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
            <a href="?p=administration&div=buttonPrezDiv">
                <button class="btn btn-info">Retour à la page d'administration</button>
            </a>
        </div>
    </div>
    <!-- FIN Résumé du post -->
    <?php
}
?>

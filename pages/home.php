<?php
//Fonction pour afficher la bannière du site
//Contient un data-toggle pour afficher le modal qui contient le carrousel des cartes
function identifierBan($server = 'localhost', $user = 'root', $pwd = 'admin', $db = 'bistrot')
{
    $conn = new mysqli($server, $user, $pwd, $db);
    $sql = "SELECT ide_title, ide_content FROM identifiers WHERE ide_oid = 2";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo '<a data-toggle="modal" data-target=".carte-menu-modal-lg" href="#">
                <img class="img-fluid" src="'.$row['ide_content'].'" alt="'.$row['ide_title'].'"/>
              </a>';
    }
}

//Fonction pour afficher les plats sur le site
function img($num = 1, $id = 1, $table = 'plat', $data1 = 'pla_img', $data2 = 'pla_title',
             $tableid = 'pla_oid', $classImg = 'myImg', $server = 'localhost', $user = 'root',
             $pwd = 'admin', $db = 'bistrot'){
    $conn = new mysqli($server, $user, $pwd, $db);
    $sql = "SELECT $data1 FROM $table WHERE $tableid = $num";
    $result = $conn->query($sql);
    $sql2 = "SELECT $data2 FROM $table WHERE $tableid = $num + 1";
    $result2 = $conn->query($sql2);
    while ($row = $result->fetch_assoc()) {
        //Si lors de l'appel de la fonction $table === 'events_restau', alors on affiche l'image correspondante
        //On se sert de $data2 de 2 façons différentes pour l'alt donc il faut l'appeler aussi de 2 façons
        if($table === 'events_restau'){
            echo '<img class="banEvent events img-fluid" src="' . $row[$data1] . '"';
            while ($row2 = $result2->fetch_assoc()) {
                //Set de l'alt sur la bannière event
                echo 'alt="' . $row2[$data2] . '">';
            }
        } else {
            $sql = "SELECT $data1, $data2 FROM $table WHERE $tableid = $num";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                //Set d'une div hvrbox qui fera descendre un voile noir sur le plat sur lequel la souris passe
                echo '<div class="hvrbox lobster">';
                echo '<div class="hvrbox-layer_bottom">';
                //Image du plat
                echo '<img id="' . $id . '" class="img-fluid ' . $classImg . '" src="' . $row[$data1] . '" alt="' . $row[$data2] . '"/>';
                //Animation du voile
                echo '<div class="hvrbox-layer_top hvrbox-layer_slidedown">';
                //Texte du voile
                echo '<div class="hvrbox-text">'.$row[$data2].'</div>'.'</div>';
                echo '</div>';
                echo '</div>';
            }
        }
    }
}

//Fonction pour gérer le carrousel de cartes
function imgCarrousel($num = 1, $table = 'carte', $data1 = 'car_img', $data2 = 'car_title',
                      $tableid = 'car_oid', $server = 'localhost', $user = 'root',
                      $pwd = 'admin', $db = 'bistrot'){
    $conn = new mysqli($server, $user, $pwd, $db);
    $sql = "SELECT $data1, $data2 FROM $table WHERE $tableid = $num";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo '<img class="text-center img-fluid" src="' . $row[$data1] . '" alt="' . $row[$data2] . '">';
    }
}

//Fonction pour le texte de présentation
function presentation($server = 'localhost', $user = 'root', $pwd = 'admin', $db = 'bistrot')
{
    $conn = new mysqli($server, $user, $pwd, $db);
    $sql = "SELECT pre_title, pre_content FROM presentation WHERE pre_oid = 1";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        if(!empty($row['pre_title'])){
            echo '<h5 class="col-12">'.$row['pre_title'].'</h5>';
        }
        echo '<i><p class="text-center">'.$row['pre_content'].'</p></i>';
    }
}

//Fonction d'appel de la vidéo, elle doit venir de youtube, l'user entre seulement l'ID dans la DB, expliqué dans la fiche fournie au client
function video($server = 'localhost', $user = 'root', $pwd = 'admin', $db = 'bistrot')
{
    $conn = new mysqli($server, $user, $pwd, $db);
    $sql = "SELECT vid_link FROM video WHERE vid_oid = 1";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo '<iframe class="taillevideo text-center" src="https://www.youtube.com/embed/'.$row['vid_link'].'" frameborder="0" allowfullscreen></iframe>';
    }
}
?>

<div class="col-md text-center">
    <div class="col pt-2 pt-md-4 pb-2 pb-md-4 whiteDiv">
        <div class="row">
            <div class="col p-0">
                 <!-- Bannière du caroussel -->
                <?php
                identifierBan();
                ?>
                <!-- FIN Bannière -->
            </div>
        </div>
        <div class="row p-0">
            <div class="col p-0 mt-4 hidden text-center" id="events">
            <!-- Bannière d'event -->
                <?php img( 1, 'banEvents', 'events_restau', 'eve_img', 'eve_alt', 'eve_oid', 'events' ); ?>
            <!-- FIN Bannière -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mt-4 p-0 p-md-1">
                <div class="row">
                    <div class="col-md-6 crop">
                    <!-- Plat 1 -->
                        <?php img(1, 1); ?>
                    <!-- FIN Plat 1 -->
                    </div>
                    <div class="col-md-6 mt-md-0 mt-4 crop">
                    <!-- Plat 2 -->
                        <?php img(2, 2); ?>
                    <!-- FIN Plat 2 -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center mt-4">
                    <!-- Vidéo -->
                        <?php video(); ?>
                    <!-- FIN Vidéo -->
                    </div>
                </div>
            </div>
            <div class="col-md p-0 p-md-1 ml-md-3">
                <div class="col mt-2">
                    <div class="whiteDiv noRad row border text-center pt-3 pb-0">
                    <!-- Présentation -->
                        <?php presentation(); ?>
                    <!-- FIN Présentation -->
                    </div>
                </div>
                <div class="row mt-3 mt-md-2">
                    <div class="col-md-12 crop">
                    <!-- Plat 3 -->
                        <?php img(3, 3); ?>
                    <!-- FIN Plat 3 -->
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal  -->

<!-- Large modal -->

<div class="modal fade carte-menu-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" data-dismiss="modal">
            <div class="row">
                <div class="col-md-12">
                     <!-- num = numéro de l'image, voir la fonction associée -->
                    <?php imgCarrousel(1); ?>
                </div>
                <div class="col-md-12 mt-2">
                    <?php imgCarrousel(2); ?>
                </div>
                <div class="col-md-12 mt-2">
                    <?php imgCarrousel(3); ?>
                </div>
            </div>
        </div>
    </div>
    <!--Fin Modal-->
</div>



<?php
function identifierBan($server = 'localhost', $user = 'root', $pwd = 'admin', $db = 'bistrot')
{
    $conn = new mysqli($server, $user, $pwd, $db);
    $sql = "SELECT ide_title, ide_content FROM identifiers WHERE ide_oid = 2";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo '<a data-toggle="modal" data-target=".carte-menu-modal-lg" href="#">
                <img class="img-fluid" src="'.$row['ide_content'].'" alt="'.$row['ide_title'].'"/>
              </a>
';
    }
}

function img($num = 1, $id = 1, $table = 'plat', $data1 = 'pla_img', $data2 = 'pla_title',
             $tableid = 'pla_oid', $classImg = 'myImg', $server = 'localhost', $user = 'root',
             $pwd = 'admin', $db = 'bistrot'){
    $conn = new mysqli($server, $user, $pwd, $db);
    $sql = "SELECT $data1 FROM $table WHERE $tableid = $num";
    $result = $conn->query($sql);
    $sql2 = "SELECT $data2 FROM $table WHERE $tableid = $num + 1";
    $result2 = $conn->query($sql2);
    while ($row = $result->fetch_assoc()) {
        if($table === 'events_restau'){
            echo '<img class="align-middle banEvent events img-fluid " src="' . $row[$data1] . '"';
            while ($row2 = $result2->fetch_assoc()) {
                echo 'alt="' . $row2[$data2] . '">';
            }

        } else {
            $sql = "SELECT $data1, $data2 FROM $table WHERE $tableid = $num";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo '<img id="' . $id . '" class="img-fluid ' . $classImg . '" src="' . $row[$data1] . '" alt="' . $row[$data2] . '"/>';
            }
        }
    }
}

function imgCaroussel($num = 1, $table = 'carte', $data1 = 'car_img', $data2 = 'car_title',
                      $tableid = 'car_oid', $server = 'localhost', $user = 'root',
                      $pwd = 'admin', $db = 'bistrot'){
    $conn = new mysqli($server, $user, $pwd, $db);
    $sql = "SELECT $data1, $data2 FROM $table WHERE $tableid = $num";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo '<img class="d-block text-center img-fluid" src="' . $row[$data1] . '" alt="' . $row[$data2] . '">';
    }
}

function presentation($server = 'localhost', $user = 'root', $pwd = 'admin', $db = 'bistrot')
{
    $conn = new mysqli($server, $user, $pwd, $db);
    $sql = "SELECT pre_title, pre_content FROM presentation WHERE pre_oid = 1";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        if(!empty($row['pre_title'])){
        echo '<h5 class="col-12">'.$row['pre_title'].'</h5>';
        }
        echo '<p class="text-justify">'.$row['pre_content'].'</p>';
    }
}

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

<div class="col-md-9 text-center">
    <div class="row">
        <!-- image lien sur le caroussel -->
        <?php
        identifierBan();
        ?>
    </div>

    <div class="row">
        <div class="mt-4 hidden text-center cropBan" id="events">
            <?php img( 1, 'banEvents', 'events_restau', 'eve_img', 'eve_alt', 'eve_oid', 'events' ); ?>
        </div>
    </div>
    <div class="row">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="row">
                    <div class="col-md-6 crop">
                    <?php img(1, 1); ?>
                </div>
                    <div class="col-md-6 mt-md-0 mt-4 crop">
                    <?php img(2, 2); ?>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center mt-4">
                    <?php video(); ?>
                </div>
                </div>
            </div>
            <div class="col-md">
<<<<<<< HEAD
                <div class="col-12 mt-3">
                    <div class="row text-center">
                        <p>En hommage à sa grand-mère Alice, qui lui a transmis le goût de la bonne cuisine, 
                        Franck Massiera vous reçoit au Bistrot d'Alice, un lieu convivial à la déco vintage à mi-chemin entre le 
                        bistrot parisien et le bouchon lyonnais.
                        </br>
                        Vous mangerez à table ou sur le zinc du comptoir, profitant des saveurs simples de plats traditionnels faits maison, d'un bon verre de vin local... 
                        Et aussi du spectacle de mise en cuisine par le chef et son équipe qui préparent et montent les assiettes devant vos yeux.
                        </p>
=======
                <div class="col-12 mt-2">
                    <div class="row text-center border p-2">
                        <?php
                        presentation();
                        ?>
>>>>>>> 62bf5f536fd3005a611451579d319f298daef714
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12 crop">
                    <?php img(3, 3); ?>
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
            <!-- Caroussel -->
            <div class="row">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">

                        <div class="carousel-item active">
                                <?php imgCaroussel(1); ?>
                            </div>
                        <div class="carousel-item">
                                <?php imgCaroussel(2); ?>
                            </div>
                        <div class="carousel-item">
                                <?php imgCaroussel(3); ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-3">
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
<!--Fin Modal-->
</div>



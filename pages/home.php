<?php
function img($id, $table, $data1, $data2, $tableid)
{
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "bistrot";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT $data1, $data2 FROM $table WHERE $tableid = $id";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo '<img class="taille align-middle myImg" src="' . $row[$data1] . '" alt="' . $row[$data2] . '"/>';
    }
}
?>

<div class="col-md-9">

    <!-- image lien sur le caroussel -->

    <div class="row">

        <a data-toggle="modal" data-target=".carte-menu-modal-lg" href="#"><img class="align-middle" src="images_bistrot/carte_printemps.jpg" alt="image_menu_saison"/></a>

    </div>

    <div class="row" id="events">
        <?php img(1, 'events_restau', 'eve_img', 'eve_title', 'eve_oid' ); ?>
    </div>
    <div class="row">

        <div class="col-md-4 ">
            <?php img(1, 'carte', 'car_img', 'car_title', 'car_oid' ); ?>
            <div class="row">

                <div class="col-md-12">

                    <iframe class="taillevideo align-middle" src="https://www.youtube.com/embed/T5UsrAxid74" frameborder="0" allowfullscreen></iframe>

                </div>

            </div>

        </div>


        <div class="col-md-4 ">
            <?php img(2, 'carte', 'car_img', 'car_title', 'car_oid' ); ?>
        </div>

        <div class="col-md-4">

            <div class="row">

                <div class="col-md-12">

                    <p>Je suis la prez par ici Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam tempora natus quo eos error provident
                        quisquam reprehenderit sit asperiores libero ipsam aut ut, commodi minus, placeat facilis id earum quod? ipsum dolor sit amet
                        consectetur adipisicing elit.
                        Numquam tempora natus quo eos error</p>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">
                    <?php img(3, 'carte', 'car_img', 'car_title', 'car_oid' ); ?>
                </div>

            </div>

        </div>

    </div>



    <!-- Modal  -->

    <!-- Large modal -->

    <div class="modal fade carte-menu-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- caroussel -->


                <div class="row">

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

                        </ol>
                        <div class="carousel-inner" role="listbox">

                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="images_bistrot/carte_boisson.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="images_bistrot/carte_dessert.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="images_bistrot/carte_vins.jpg" alt="Third slide">
                            </div>
                        </div>
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


            </div>
        </div>
    </div>



</div>


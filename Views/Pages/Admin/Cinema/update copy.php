<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = 'Settings Bioscoop';
    include './Views/Layout/header.php';
    ?>
</head>

<body>


    <?php include './Views/Pages/Admin/Layout/sidebar.php' ?>

    <div class="col py-3">
        <div class="container">
            <form action="index.php?con=cinema&op=update" method="POST" enctype="multipart/form-data">
                <div class="d-flex justify-content-between">
                    <h2>Settings Bioscoop</h2>
                    <button class="btn bg-dark bg-opacity-50 text-white" type="submit" name="submit">Opslaan</button>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" name="cinema_name" id="cinema_Name" class="form-control" placeholder='Bioscoop naam' value="<?= !empty($dataCinema[0]['cinema_name']) ? $dataCinema[0]['cinema_name'] : null ?>">
                            <label for="cinema_Name">Bioscoop naam</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-6">
                            <input type="file" name="cinema_img" id="cinema_Img" class="form-control" value="<?= !empty($dataCinema[0]['cinema_img']) ? $dataCinema[0]['cinema_img'] : null ?>">
                            <label for="cinema_Name">Bioscoop Thumbnail</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="page">Bioscoop omschrijving pagina</label>
                        <textarea type="textarea" id="Page" name="cinema_desc" rows="20" cols="50"><?= !empty($dataCinema[0]['cinema_desc']) ? $dataCinema[0]['cinema_desc'] : null ?></textarea>
                    </div>

                    <div class="col-md-6">
                        <h5>Openingstijden</h5>
                        <div class="form-floating mb-3">
                            <label for="open_dates">Open op?</label>
                            <textarea class="form-control" name="open_dates" placeholder="Open op?" id="Open_Dates" style="height: 100px"><?= !empty($reach[1]['message']) ? $reach[1]['message'] : null ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h5>Adres</h5>
                        <div class="form-floating mb-3">
                            <label for="adres">Adres</label>
                            <textarea class="form-control" name="adres" placeholder="Adres" id="Adres" style="height: 100px"><?= !empty($reach[2]['message']) ? $reach[2]['message'] : null ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h5>Bereikbaarheid</h5>
                        <div class="form-floating mb-3">
                            <label for="reach_information">informatie</label>
                            <textarea class="form-control" name="reach_information" placeholder="Beschikbaarheid informatie" id="floatingReach1" style="height: 100px"><?= !empty($reach[3]['message']) ? $reach[3]['message'] : null ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="auto">Auto</label>
                            <textarea class="form-control" name="reach_car" placeholder="Auto" id="Auto" style="height: 100px"><?= !empty($reach[4]['message']) ? $reach[4]['message'] : null ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="public_trafic">Openbaar vervoer</label>
                            <textarea class="form-control" name="reach_public_trafic" placeholder="Openbaar vervoer" id="trafic" style="height: 100px"><?= !empty($reach[5]['message']) ? $reach[5]['message'] : null ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="bike">Fiets</label>
                            <textarea class="form-control" name="reach_bike" placeholder="Fiets" id="fiets" style="height: 100px"><?= !empty($reach[6]['message']) ? $reach[6]['message'] : null ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="chair">Rolstoeltoegankelijkheid</label>
                            <textarea class="form-control" name="reach_wheel_chair" placeholder="Rolstoeltoegankelijkheid" id="Chair" style="height: 100px"><?= !empty($reach[7]['message']) ? $reach[7]['message'] : null ?></textarea>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    </div>
    </div>

</body>
</html>
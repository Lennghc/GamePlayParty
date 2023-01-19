<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = 'update Zaal';
    include './Views/Layout/header.php';
    ?>
</head>

<body>


    <?php include './Views/Pages/Admin/Layout/sidebar.php' ?>

    <div class="col py-3">
        <div class="container">
            <form action="index.php?con=lounge&op=update&id=<?=$_GET['id']?>" method="POST">
                <h1 class="">Zaal updaten</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="lounge_nmr" id="lounge_Nmr" value="<?= !empty($result['lounge_nmr']) ? $result['lounge_nmr'] : null ?>" placeholder="Zaal nummer">
                            <label for="lounge_Nmr">Zaal nummer</label>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-floating mb-3">
                            <input type="text" name="lounge_screensize" class="form-control" id="lounge_Screensize" value="<?= !empty($result['lounge_screensize']) ? $result['lounge_screensize'] : null ?>" placeholder="Scherm groten">
                            <label for="lounge_Screensize">Scherm grootte</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="number" name="lounge_chair_places" class="form-control" id="lounge_Chair_Places" value="<?= !empty($result['lounge_chair_places']) ? $result['lounge_chair_places'] : null ?>" placeholder="Zit plaatsen" />
                            <label for="lounge_Chair_Places">Aantal zitplaatsen</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="number" name="lounge_wheelchair_places" class="form-control" id="lounge_Wheel_Chair_places" value="<?= !empty($result['lounge_wheelchair_places']) ? $result['lounge_wheelchair_places'] : null ?>" placeholder="Rolstoel plaatsen" />
                            <label for="lounge_Wheel_Chair_places">Aantal rolstoelplaatsen</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <button type="submit" name="submit" class="form-group btn btn-primary">
                            Zaal updaten
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    </div>
    </div>



</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Home";
    include 'Views/Layout/header.php';
    ?>
</head>

<body>
    <img src="Assets/Img/gpp.svg" id="logo_image" alt="">
    <div class="container row">
        <div class="col-md-7 title-under-logo"><?= $result[0]['Home_title'] ?></div>
    </div>

    <?php include 'Views/Layout/navbar.php'; ?>


    <div class="container conatiner_landing_page">

            <div class="row" style="margin-top: 7rem;">
                <div class="text-start fw-bold"><?= $result[0]['Home_starter_content'] ?></div>

                <div class="col-md-12">
                    <?= $result[0]['Home_main_content'] ?>

                    <a class="" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <span class="collapsed">
                            Lees meer
                    </span>
                    <span class="expanded">
                            Lees minder
                    </span>
                    </a>

                </div>

            </div>

            <div class="col-md-6 box-right">
                <!-- <img src="Assets/Img/gameconsole.jpg" alt="" class="img-gameconsole"></img> -->
            </div>
    </div>



    <?php include 'Views/Layout/footer.php'; ?>

</body>

</html>
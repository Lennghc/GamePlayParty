<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Bioscoop details";
    include 'Views/Layout/header.php';
    ?>
</head>

<body>
    <img src="Assets/Img/gpp.svg" id="logo_image" alt="">
    <div class="container row">
        <div class="col-md-7 title-under-logo"><span style="font-family:sans-serif!important;"><?= !empty($informationText[2]) ? $informationText[2] : null ?></span></div>
    </div>

    <?php include 'Views/Layout/navbar.php';   ?>

    <div class="container conatiner_landing_page">
        <div class="row">

            <div class="col-md-9" id="information">

                <div class="btn-group" role="group" id="button-group" aria-label="Basic example">
                    <a type="button" class="btn bg-success bg-opacity-25" href="#tijden">Beschikbare Tijden</a>
                    <a type="button" class="btn bg-success bg-opacity-25" href="#information">Informatie</a>
                    <a type="button" class="btn bg-success bg-opacity-25" href="#adres">Adres</a>
                </div>

                <?= !empty($informationText[0]) ? $informationText[0] : null ?>

                <div class="row" id="tijden" role="group">

                    <?= !empty($button) ? $button : null ?>
                    <div id="adres"></div>

                </div>
            </div>

            <div class="col-md-3 bg-secondary bg-gradient bg-opacity-10">

                <div class="p-1">

                    <?= !empty($informationText[1]) ? $informationText[1] : null ?>

                </div>

            </div>


        </div>


    </div>







    <?php include 'Views/Layout/footer.php'; ?>


</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Bioscopen";
    include 'Views/Layout/header.php';
    ?>
</head>

<body>
    <img src="Assets/Img/gpp.svg" id="logo_image" alt="">
    <div class="container row">
        <div class="col-md-7 title-under-logo"><span style="font-family:sans-serif!important;">Bioscopen in de buurt</span></div>
    </div>

    <?php include 'Views/Layout/navbar.php'; ?>

    <div class="container">

        <div class="row mb-4">

            <?= !empty($list) ? $list : null ?>

        </div>

    </div>

    <?php include 'Views/Layout/footer.php'; ?>

</body>

</html>
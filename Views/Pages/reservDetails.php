<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Reserverings gegevens";
    include 'Views/Layout/header.php';
    ?>
    <link rel="stylesheet" href="<?= PATH_DIR ?>/Assets/Css/reservDetails.css">

    <style>

    </style>
</head>

<body>
    <img src="Assets/Img/gpp.svg" id="logo_image" alt="">
    <div class="container row">
        <div class="col-md-7 title-under-logo">Reserverings gegevens</div>
    </div>

    <?php include 'Views/Layout/navbar.php'; ?>


    <div class="container container-bottom">
        <div class="row">
            <div class="col-md-6 box-left stack-top">
                <?= !empty($formInputs) ? $formInputs : null ?>
            </div>

            <div class="col-md-6 box-right stack-top">
                <?= !empty($rates) ? $rates : null ?>
            </div>

        </div>
    </div>

    <script>
        $('.add').click(function() {
            $(this).prev().val(+$(this).prev().val() + 1);
        });
        $('.sub').click(function() {
            if ($(this).next().val() > 0) $(this).next().val(+$(this).next().val() - 1);
        });
    </script>




    <?php include 'Views/Layout/footer.php'; ?>


</body>

</html>
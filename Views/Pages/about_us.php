<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "About us";
    include 'Views/Layout/header.php';
    ?>
</head>

<body>
    <img src="Assets/Img/gpp.svg" id="logo_image" alt="">
    <div class="container row">
        <div class="col-md-7 title-under-logo"><span style="font-family:sans-serif!important;"><?=$result[0]['About_title']?></span></div>
    </div>

    <?php include 'Views/Layout/navbar.php'; ?>

    <div class="container conatiner_landing_page">

        <div class="row">
            <h5 class="fs-5 fw-bold text-start">Wie zijn wij?</h5>

            <div class="col-md-12">
                <p><?=$result[0]['About_main_content']?>
                </p>
            </div>
            
            <div class="col-md-12">
                <h5 class="fs-5 fw-bold">Contact ons</h5>

                <p><?=$result[0]['About_contact_info']?>
                </p>
                <a href="mailto:gameplayparty@gmail.com"><div class="button">Mail ons!</div></a>
            </div>
        </div>
    </div>

    <?php include 'Views/Layout/footer.php'; ?>

</body>

</html>
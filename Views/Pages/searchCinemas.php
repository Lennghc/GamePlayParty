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
        <div class="col-md-7 title-under-logo">Bioscopen in Utrecht</div>
    </div>

    <?php include 'Views/Layout/navbar.php'; ?>

    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <h2></h2>
                <div class="list-group">
                    <a class="list-group-item list-group-item-action active" href="?con=home&op=cinemaDetails" role="button">Kinepolis Jaarbeurs</a>
                    <a class="list-group-item list-group-item-action" href="#" role="button">...</a>
                    <a class="list-group-item list-group-item-action" href="#" role="button">...</a>
                    <a class="list-group-item list-group-item-action" href="#" role="button">...</a>
                </div>

            </div>

        </div>

    </div>

    

    









    <?php include 'Views/Layout/footer.php'; ?>

</body>

</html>
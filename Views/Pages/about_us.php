<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "About Us";
    include 'Views/Layout/header.php';
    ?>
</head>

<body>
    <img src="Assets/Img/gpp.svg" id="logo_image" alt="">


    <?php include 'Views/Layout/navbar.php'; ?>


<?= !empty($page) ? html_entity_decode($page) : null ?>



    <?php include 'Views/Layout/footer.php'; ?>

</body>

</html>
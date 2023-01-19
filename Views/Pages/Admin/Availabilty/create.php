<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = 'Beschikbaarheid instellen';
    include './Views/Layout/header.php';
    ?>
</head>

<body>


    <?php include './Views/Pages/Admin/Layout/sidebar.php' ?>

    <div class="col py-3">
        <?= !empty($selectLoungeOptions) ? $selectLoungeOptions : null ?>


    </div>
    </div>
    </div>



</body>

</html>
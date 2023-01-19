<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $title = 'Bioscopen';
    include './Views/Layout/header.php';
    ?>
</head>

<body>


    <?php include './Views/Pages/Admin/Layout/sidebar.php' ?>

    <div class="col py-3">
        <h2>Beschikbaarheid zalen   </h2>
        <?= !empty($table) ? $table : null ?>

    </div>
    </div>
    </div>



</body>


</html>
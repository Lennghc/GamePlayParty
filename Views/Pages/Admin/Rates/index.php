<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = 'Tarieven';
    include './Views/Layout/header.php';
    ?>
</head>

<body>


    <?php include './Views/Pages/Admin/Layout/sidebar.php' ?>

    <div class="col py-3">
        <h2>Tarieven overzicht</h2>
        <?= !empty($ratesTable) ? $ratesTable : null ?>

    </div>
    </div>
    </div>



</body>

</html>
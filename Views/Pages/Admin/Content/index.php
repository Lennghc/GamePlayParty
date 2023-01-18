<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $title = 'Bioscopen';
    include './Views/Layout/header.php';
    ?>
    <style>
        th:nth-child(1), td:nth-child(1) {
            display: none;
        }

        th:nth-child(3), td:nth-child(3) {
            display: none;
        }
    </style>
</head>

<body>


    <?php include './Views/Pages/Admin/Layout/sidebar.php' ?>

    <div class="col py-3">
        <h2>Pagina bewerken</h2>
        <?= !empty($display) ? $display : null ?>
    </div>
    </div>
    </div>



</body>


</html>
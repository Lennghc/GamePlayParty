<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = 'Tarief maken';
    include './Views/Layout/header.php';
    ?>
</head>

<body>


    <?php include './Views/Pages/Admin/Layout/sidebar.php' ?>

    <div class="col py-3">
        <div class="container">
            <h2>Tarief maken</h2>

            <form action="index.php?con=rate&op=create" method="POST">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="rates_desc">Beschrijving</label>
                        <input type="text" id="rates_desc" name="rates_desc" class="form-control" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="rates_price">Prijs</label>
                        <input type="text" name="rates_price" id="rates_price" class="form-control" required>
                    </div>

                    <div class="d-grid mx-auto">
                        <button type="submit" class="btn bg-success bg-opacity-50" name="submit">Maak aan</button>
                    </div>

                </div>
            </form>


        </div>

    </div>
    </div>
    </div>



</body>

</html>
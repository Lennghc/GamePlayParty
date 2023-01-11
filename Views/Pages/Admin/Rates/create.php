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
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" id="rates_Desc" name="rates_desc" class="form-control" placeholder="Beschrijving" required>
                            <label for="rates_Desc">Beschrijving</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="rates_price" id="rates_Price" class="form-control" placeholder="Prijs" required>
                            <label for="rates_Price">Prijs</label>
                        </div>
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
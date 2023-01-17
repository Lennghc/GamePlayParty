<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = 'Bewerken Home pagina';
    include './Views/Layout/header.php';
    ?>
</head>

<body>


    <?php include './Views/Pages/Admin/Layout/sidebar.php' ?>
    <div class="col py-3">
        <div class="container">
            <form action="index.php?con=content&op=home" method="POST">
                <div class="d-flex justify-content-between">
                    <h2>Bewerken Homepagina</h2>
                    <button class="btn bg-dark bg-opacity-50 text-white" type="submit" name="submit">Opslaan</button>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="home_title" id="home_title" class="form-control" placeholder='Awesome Titel' value="<?= $result[0]['Home_title'] ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h5>Klein stukkie content</h5>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="start_content" placeholder="Power to the players" id="Page" style="height: 100px"><?= !empty($result[0]['Home_starter_content']) ? $result[0]['Home_starter_content'] : null ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h5>Groot stukkie content</h5>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="main_content" placeholder="Dit is alle belangrijke tekst" id="Page" style="height: 100px"><?= !empty($result[0]['Home_main_content']) ? $result[0]['Home_main_content'] : null ?></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>

</body>

</html>
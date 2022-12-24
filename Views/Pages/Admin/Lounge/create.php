<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Create Cinema";
    include 'Views/Layout/header.php';
    ?>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#cinema_desc'
        });

        tinymce.init({
            selector: '#cinema_reachabilty'
        });
    </script>
</head>

<body class="text-center">

    <section class="main">
        <div class="container">
            <form action="index.php?con=lounge&op=create" method="POST">
                <h1 class="">Zaal creeren</h1>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="text">Zaal nummer</label>
                        <input type="text" name="lounge_nmr" class="form-control" />
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="text">Scherm groten</label>
                        <input type="text" name="lounge_screensize" class="form-control" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 group-control">
                        <label for="number">Zit plaatsen</label>
                        <input type="number" name="lounge_chair_places" class="form-control" />
                    </div>

                    <div class="col-md-6 group-control">
                        <label for="number">Rolstoel plaatsen</label>
                        <input type="number" name="lounge_wheelchair_places" class="form-control" />
                    </div>
                </div>

                <div class="row">

                </div>
                <div class="row">
                    <div class="col-md-3 group-control">
                        <label for="time">Start tijd</label>
                        <input type="time" name="slot_start_time" class="form-control" />
                    </div>

                    <div class="col-md-3 group-control">
                        <label for="time">Eind tijd</label>
                        <input type="time" name="slot_end_time" class="form-control" />
                    </div>


                    <div class="col-md-3 col-6 group-control">
                        <label for="date">Datum</label>
                        <input type="date" name="reservated_date" class="form-control" />
                    </div>
                    <div class="form-group">


                        <button type="submit" name="submit" class="form-group btn btn-primary">
                            Maak zaal aan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <?= $dump ?>

</html>
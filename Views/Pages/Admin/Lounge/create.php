<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = 'Create Zaal';
    include './Views/Layout/header.php';
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

<body>


    <?php include './Views/Pages/Admin/Layout/sidebar.php' ?>

    <div class="col py-3">
        <div class="container">
            <form action="index.php?con=lounge&op=create" method="POST">
                <h1 class="">Zaal cre&euml;ren</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="lounge_nmr" id="lounge_Nmr" placeholder="Zaal nummer">
                            <label for="lounge_Nmr">Zaal nummer</label>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-floating mb-3">
                            <input type="text" name="lounge_screensize" class="form-control" id="lounge_Screensize" placeholder="Scherm groten">
                            <label for="lounge_Screensize">Scherm grootte</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="number" name="lounge_chair_places" class="form-control" id="lounge_Chair_Places" placeholder="Zit plaatsen" />
                            <label for="lounge_Chair_Places">Aantal zitplaatsen</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="number" name="lounge_wheelchair_places" class="form-control" id="lounge_Wheel_Chair_places" placeholder="Rolstoel plaatsen" />
                            <label for="lounge_Wheel_Chair_places">Aantal rolstoelplaatsen</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 ">
                        <div class="form-floating mb-3">
                            <input type="time" name="slot_start_time" class="form-control" id="slot_Start_Time" placeholder="Start tijd" />
                            <label for="slot_Start_Time">Start tijd</label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="time" name="slot_end_time" class="form-control" id="slot_End_Time" placeholder="Eind tijd" />
                            <label for="slot_End_Time">Eind tijd</label>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="date" name="reservated_date" class="form-control" id="reservated_Date" placeholder="Datum" />
                            <label for="reservated_Date">Datum</label>
                        </div>
                    </div>
                    <div class="form-group">


                        <button type="submit" name="submit" class="form-group btn btn-primary">
                            Maak zaal aan
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    </div>
    </div>



</body>

</html>
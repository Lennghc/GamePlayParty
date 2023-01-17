<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Bioscoop details";
    include 'Views/Layout/header.php';
    ?>
</head>

<body>
    <img src="Assets/Img/gpp.svg" id="logo_image" alt="">
    <div class="container row">
        <div class="col-md-7 title-under-logo"><span style="font-family:sans-serif!important;"><?= !empty($informationText[2]) ? $informationText[2] : null ?></span></div>
    </div>

    <?php include 'Views/Layout/navbar.php';   ?>

    <div class="container conatiner_landing_page">
        <div class="row">

            <div class="col-md-9" id="information">

                <div class="btn-group" role="group" id="button-group" aria-label="Basic example">
                    <a type="button" class="btn bg-success bg-opacity-25" href="#tijden">Beschikbare Tijden</a>
                    <a type="button" class="btn bg-success bg-opacity-25" href="#information">Informatie</a>
                    <a type="button" class="btn bg-success bg-opacity-25" href="#adres">Adres</a>
                </div>

                <?= !empty($informationText[0]) ? $informationText[0] : null ?>

                <div class="row" id="tijden" role="group">

                    <?= !empty($button) ? $button : null ?>
                    <form method="post" id="datepicker">
                        <div class="col-md-4">
                            <input type="hidden" id="cinema" value="<?= !empty($_GET['id']) ? $_GET['id'] : null ?>">
                            <input type="date" id="date" min="<?= date('Y-m-d') ?>" class="form-control" onchange="dateOfThatWeek(event)">
                        </div>

                    </form>
                    <div id="buttons" class="p-3"></div>

                    <div id="adres"></div>

                </div>
            </div>

            <div class="col-md-3 bg-secondary bg-gradient bg-opacity-10">

                <div class="p-1">

                    <?= !empty($informationText[1]) ? $informationText[1] : null ?>

                </div>

            </div>


        </div>


    </div>

    <script>
        function dateOfThatWeek(e) {

            var date = e.target.value;
            var id = $('#cinema').val();

            $.ajax({
                url: "index.php?con=cinema&op=searchTimeSlots",
                type: "POST",
                data: {
                    date: date,
                    cinema: id,
                },
                beforeSend: function(xhr) {
                    doAuthLoading('#buttons');
                },
                cache: false,
                success: function(data, textStatus, xhr) {
                    stopLoading('#buttons', 'success');

                    if (xhr.status == 201) {
                        // if status is (201 created), set de input fields to empty and give one message back of success

                        document.getElementById('buttons').innerHTML = data.html;

                    }

                },
                error: function(data) {
                    stopLoading('#date', 'Try again later!');
                    $("#date").remove("disabled");

                    if (data.responseJSON && data.responseJSON.errors) {
                        let errors = data.responseJSON.errors.map(error => {
                            return `${error} <br>`;
                        });

                        document.getElementById('buttons').innerHTML = errors;
                        
                    }
                }
            });

        }


        const stopLoading = function(selector, value) {
            if ($("#loading")) {
                $("#loading").remove();
                $(selector).html(value);
            }
        }

        const doAuthLoading = function(selector) {
            document.querySelector(selector).innerHTML = `
    <div id="loading" class="spinner-border text-dark" style="width: 1.5rem; height: 1.5rem; border-width: 0.2em;" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
`;
        }
    </script>
    <?php include 'Views/Layout/footer.php'; ?>


</body>

</html>
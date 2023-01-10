<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Reserverings gegevens";
    include 'Views/Layout/header.php';
    ?>
    <link rel="stylesheet" href="<?= PATH_DIR ?>/Assets/Css/reservDetails.css">

    <style>

    </style>
</head>

<body>
    <img src="Assets/Img/gpp.svg" id="logo_image" alt="">
    <div class="container row">
        <div class="col-md-7 title-under-logo">Reserverings gegevens</div>
    </div>

    <?php include 'Views/Layout/navbar.php'; ?>


    <div class="container container-bottom">
        <div class="row">
            <div class="col-md-6 box-left stack-top">
                <?= !empty($formInputs) ? $formInputs : null ?>
            </div>

            <div class="col-md-6 box-right stack-top">
                <?= !empty($rates) ? $rates : null ?>
            </div>

        </div>
    </div>

    <script>
        function ratesCalculate(id, calc) {

            var parrentRow = document.querySelector('#rates' + id);
            var price = parrentRow.querySelector('#price');
            var replaceDot = price.innerText.replace(",", ".");
            var calculateNumber = Number(replaceDot.slice(2));
            var totalText = document.querySelector('#total');

            let Euro = new Intl.NumberFormat('nl-NL', {
                style: 'currency',
                currency: 'EUR'
            });

            if (calc == 2) {

                function add(id) {

                    var value = parrentRow.querySelector('#inputField' + id).value;
                    value = isNaN(value) ? 0 : value;
                    value++;

                    if (value != 31) {
                        document.querySelector('#inputField' + id).value = value;
                        var newPrice = calculateNumber * value;
                        parrentRow.querySelector('#subtotal').innerHTML = Euro.format(newPrice);
                    }

                    return value;
                }
                add(id);
            }

            if (calc == 1) {
                function sub(id) {

                    var value = parrentRow.querySelector('#inputField' + id).value
                    value = isNaN(value) ? 0 : value;
                    value--;

                    if (value != -1) {
                        document.querySelector('#inputField' + id).value = value;
                        var newPrice = calculateNumber * value;
                        parrentRow.querySelector('#subtotal').innerHTML = Euro.format(newPrice);

                    }

                    return value;
                }
                sub(id);
            }


            var allPrice = document.querySelectorAll('#subtotal');


            var total = 0;

            allPrice.forEach(element => {
                // console.log(element.innerText);
                var removeDot = element.innerText.replace(",", ".");
                var calculateTotalNumber = Number(removeDot.slice(2));
                // console.log(calculateTotalNumber);

                total = total + calculateTotalNumber;
            });

            totalText.innerText = Euro.format(total);


        }
    </script>




    <?php include 'Views/Layout/footer.php'; ?>


</body>

</html>
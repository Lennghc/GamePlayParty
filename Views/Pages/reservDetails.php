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
                <div class="container">

                    <form action="">
                        <h4>Aantal personen</h4>
                        <div class="row">
                            <div class="col-md-5">
                                <p>Normaal | € 10,80</p>
                            </div>
                            <div class="col-sm-3 reservDetails-inputfield">
                                <div class="input-group input-group-sm">
                                    <button type="button" class="btn btn-danger btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                        <span class="fa fa-minus"></span>
                                    </button>
                                    <input type="text" name="quant[1]" class="form-control input-number" value="8" min="0" max="30">
                                    <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[1]">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <p>€ 0,00</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <p>Kinderen t/m 11 jaar | € 6,50</p>
                            </div>
                            <div class="col-sm-3 reservDetails-inputfield">
                                <div class="input-group input-group-sm">
                                    <button type="button" class="btn btn-danger btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                        <span class="fa fa-minus"></span>
                                    </button>
                                    <input type="text" name="quant[1]" class="form-control input-number" value="8" min="0" max="30">
                                    <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[1]">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <p>€ 0,00</p>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-5">
                                <p>Jeugd 12 t/m 17 jaar | € 8,50</p>
                            </div>
                            <div class="col-sm-3 reservDetails-inputfield">
                                <div class="input-group input-group-sm">
                                    <button type="button" class="btn btn-danger btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                        <span class="fa fa-minus"></span>
                                    </button>
                                    <input type="text" name="quant[1]" class="form-control input-number" value="8" min="0" max="30">
                                    <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[1]">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <p>€ 0,00</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <p>65+ | € 9,00</p>
                            </div>
                            <div class="col-sm-3 reservDetails-inputfield">
                                <div class="input-group input-group-sm">
                                    <button type="button" class="btn btn-danger btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                        <span class="fa fa-minus"></span>
                                    </button>
                                    <input type="text" name="quant[1]" class="form-control input-number" value="8" min="0" max="30">
                                    <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[1]">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <p>€ 0,00</p>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-5">
                                <p>Studenten, CJP & BankGiro Lotterij VIP-KAART | € 8,50</p>
                            </div>
                            <div class="col-sm-3 reservDetails-inputfield">
                                <div class="input-group input-group-sm">
                                    <button type="button" class="btn btn-danger btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                        <span class="fa fa-minus"></span>
                                    </button>
                                    <input type="text" name="quant[1]" class="form-control input-number" value="8" min="0" max="30">
                                    <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[1]">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <p>€ 0,00</p>
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="button" class="btn bg-primary bg-opacity-10">Volgende</button>
                            </div>
                        </div>



                    </form>

                </div>
            </div>

        </div>
    </div>

    <script>
        $('.btn-number').click(function(e) {
            e.preventDefault();

            fieldName = $(this).attr('data-field');
            type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                if (type == 'minus') {

                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if (type == 'plus') {

                    if (currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });
        $('.input-number').focusin(function() {
            $(this).data('oldValue', $(this).val());
        });
        $('.input-number').change(function() {

            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            name = $(this).attr('name');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                $(this).val($(this).data('oldValue'));
            }
            if (valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                $(this).val($(this).data('oldValue'));
            }


        });
    </script>




    <?php include 'Views/Layout/footer.php'; ?>


</body>

</html>
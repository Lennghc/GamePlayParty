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

            var value = parrentRow.querySelector('#inputField_' + id).value;
            value = isNaN(value) ? 0 : value;
            value++;

            if (value != 31) {
                document.querySelector('#inputField_' + id).value = value;
                var newPrice = calculateNumber * value;
                parrentRow.querySelector('#subtotal').innerHTML = Euro.format(newPrice);
            }

            return value;
        }
        add(id);
    }

    if (calc == 1) {
        function sub(id) {

            var value = parrentRow.querySelector('#inputField_' + id).value
            value = isNaN(value) ? 0 : value;
            value--;

            if (value != -1) {
                document.querySelector('#inputField_' + id).value = value;
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
        var removeDot = element.innerText.replace(",", ".");
        var calculateTotalNumber = Number(removeDot.slice(2));
        total = total + calculateTotalNumber;
    });

    totalText.innerText = Euro.format(total);

}










$('#rates_button').on('click', function () {


    var inputArray = [];
    var sendData = [];
    var Data = [];
    var inputs = document.querySelectorAll('.input-number');
    inputs.forEach(input => {
            $(input).attr("readonly", true);
            inputArray = {
                rates_id: [input.getAttribute("data-type")],
                people: [input.value]
            };

            Data.push(sendData.concat(inputArray));
    });

        var minPlusButtons = document.querySelectorAll('.minplus')
        minPlusButtons.forEach(element => {
            $(element).attr("disabled", "disabled");
        });


        $("#rates_button").attr("disabled", "disabled");



        $.ajax({
            url: "index.php?con=reserv&op=pdf",
            type: "POST",
            data: {
                data: Data,
                id: $('#reservation').val()
            },
            beforeSend: function (xhr) {
                doAuthLoading('#rates_button');
            },
            cache: false,
            success: function (data, textStatus, xhr) {
                stopLoading('#rates_button', 'Pre-order success');

                if (xhr.status == 201) {
                    // if status is (201 created), set de input fields to empty and give one message back of success
                    // $('#rates-form')[0].reset();
                    toast('U heeft met success een pre-order gemaatkt!', 'success', 'toast-top-right');

                    // $("#rates_button").remove();
                    // $('#download').append("<a id='url' class='btn bg-success bg-opacity-25'>Download</a>")
                    // $("#url").attr('href', data.url);
                    // setTimeout(() => {
                    //     window.location.replace('index.php?con=auth&op=login');
                    // }, 2000);

                }

            },
            error: function (data) {
                stopLoading('#rates_button', 'Try again later!');
                $("#rates_button").remove("disabled");

                if (data.responseJSON && data.responseJSON.errors) {
                    let errors = data.responseJSON.errors.map(error => {
                        return `${error} <br>`;
                    });

                    toast(errors, 'error', 'toast-top-right');
                }
            }
        });
});





const stopLoading = function (selector, value) {
    if ($("#loading")) {
        $("#loading").remove();
        $(selector).html(value);
    }
}

const doAuthLoading = function (selector) {
    document.querySelector(selector).innerHTML = `
    <div id="loading" class="spinner-border text-dark" style="width: 1.5rem; height: 1.5rem; border-width: 0.2em;" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
`;
}
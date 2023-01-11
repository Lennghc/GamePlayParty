$('#signup_button').on('click', function() {
    var username = $('#username').val();
    var email = $('#email').val();
    var password = $('#enter').val();
    var passwordConfirm = $('#retype').val();

    // check all the values are set and not empty
    if (email != "" && password != "" && passwordConfirm != "") {

        $("#signup_button").attr("disabled", "disabled");

        $.ajax({
            url: "index.php?con=auth&op=handleregister",
            type: "POST",
            data: {
                username: username,
                email: email,
                password: password,
                password_confirmation: passwordConfirm
            },
            beforeSend: function(xhr) {
                doAuthLoading('#signup_button');
            },
            cache: false,
            success: function(data, textStatus, xhr) {
                stopLoading('#signup_button', 'Registeren');

                if (xhr.status == 201) {
                    // if status is (201 created), set de input fields to empty and give one message back of success
                    $('#signup-form')[0].reset();
                    toast('Registration successful!', 'success', 'toast-top-right');

                    setTimeout(() => {
                        window.location.replace('index.php?con=auth&op=login');
                    }, 2000);

                }

            },
            error: function(data) {
                stopLoading('#signup_button', 'Registeren');
                $("#signup_button").removeAttr("disabled");

                if (data.responseJSON && data.responseJSON.errors) {
                    let errors = data.responseJSON.errors.map(error => {
                        return `${error} <br>`;
                    });

                    toast(errors, 'error', 'toast-top-right');
                }
            }
        });
    } else {
        // check if alle fields are set
        toast("Please fill all the fields!", 'error', 'toast-top-right');
    }
});



$('#login_button').on('click', function () {
    var email = $('#email').val();
    var password = $('#enter').val();

    // check if values are set and not empty
    if (email != "" && password != "") {

        $("#login_button").attr("disabled", "disabled");

        $.ajax({
            url: "index.php?con=auth&op=handlelogin",
            type: "POST",
            data: {
                email: email,
                password: password
            },
            beforeSend: function (xhr) {
                doAuthLoading('#login_button');
            },
            cache: false,
            success: function (data, textStatus, xhr)  {
                stopLoading('#login_button', 'Inloggen');
                toast(`Welcome back, ${data.username}`, 'success', 'toast-top-right');

                setTimeout(() => {
                    window.location.replace('index.php');
                }, 2000);
            },
            error: function (data) {
                stopLoading('#login_button', 'Inloggen');
                $("#login_button").removeAttr("disabled");

                if(data.responseJSON && data.responseJSON.errors) {
                    let errors = data.responseJSON.errors.map(error => {
                        return `${error} <br>`;
                    });

                    toast(errors, 'error', 'toast-top-right');
                }
            }
        });
    }
    else {
        // fields are incomplete
        toast("Please fill all the fields!", 'error', 'toast-top-right');
    }
});




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
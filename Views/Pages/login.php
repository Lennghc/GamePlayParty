<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Login";
    include 'Views/Layout/header.php';
    ?>
    <link rel="stylesheet" href="<?= PATH_DIR ?>/Assets/Css/login.css">

</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto">
        <div class="formstyle">
            <form onsubmit="event.preventDefault();" method="POST">
                <img class="mb-4" src="<?= PATH_DIR ?>/Assets/Img/Lunn.jpg" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Inloggen</h1>

                <div class="form-floating">
                    <input type="email" class="form-control" id="email" placeholder="naam@voorbeeld.com">
                    <label for="email">Email adres</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="enter" style="margin-bottom: 10px; border-radius: 0.375rem; border-top-right-radius: 0; border-top-left-radius: 0;" placeholder="Wachtwoord">
                    <label for="enter">Wachtwoord</label>
                </div>

                <input class="w-100 btn btn-lg btn-success" type="submit" id="login_button" value="Inloggen"></input>
                <p class="mt-5 mb-3 text-muted">&copy; WebWorld</p>
            </form>
        </div>
    </main>



</body>
<script src="<?= PATH_DIR ?>/Assets/Js/auth.js"></script>

<?php
if (isset($_SESSION['toast'])) {
    echo $_SESSION['toast'];
    unset($_SESSION['toast']);
}
?>


</html>
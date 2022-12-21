<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Registreren";
    include 'Views/Layout/header.php';
    ?>
    <link rel="stylesheet" href="<?= PATH_DIR ?>/Assets/Css/Login.css">

</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto">
        <div class="formstyle">
            <form onsubmit="event.preventDefault();" id="signup-form" method="POST">
                <img class="mb-4" src="<?= PATH_DIR ?>/Assets/Img/login.png" alt="" width="100" height="100">
                <h1 class="h3 mb-3 fw-normal">Registreren</h1>

                <div class="form-floating">
                    <input type="email" class="form-control" id="email" placeholder="naam@voorbeeld.com">
                    <label for="email">Email adres</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="username" placeholder="gebruikersnaam">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="enter" placeholder="Wachtwoord">
                    <label for="enter">Wachtwoord</label>
                </div>
                <div class="form-floating">
                    <input type="password" style="margin-bottom: 10px; border-radius: 0.375rem; border-top-right-radius: 0; border-top-left-radius: 0;" class="form-control" id="retype" placeholder="Herhaal Wachtwoord">
                    <label for="retype">Herhaal Wachtwoord</label>
                </div>

                <button class="w-100 btn btn-lg btn-success" id="signup_button" type="submit">Registreren</button>
                <a href="index.php?con=home&op=login">Inloggen</a>
                <a href="index.php">Ga terug</a>
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
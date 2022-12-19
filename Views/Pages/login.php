<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Login";
    include 'Views/Layout/header.php';
    ?>
</head>

<body class="text-center">

<main class="form-signin w-100 m-auto">
    <div class="formstyle">
        <form action="?con=home&op=login" method="POST">
            <img class="mb-4" src="<?= PATH_DIR ?>/Assets/Img/Lunn.jpg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Inloggen</h1>

            <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="naam@voorbeeld.com">
            <label for="floatingInput">Email adres</label>
            </div>
            <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Wachtwoord">
            <label for="floatingPassword">Wachtwoord</label>
            </div>

            <input class="w-100 btn btn-lg btn-success" type="submit" value="Inloggen"></input>
            <p class="mt-5 mb-3 text-muted">&copy; WebWorld</p>
        </form>
    </div>
</main>



  </body>
</html>
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
        selector: '#mytextarea'
      });
    </script>
</head>
<body class="text-center">

<main class="form-signin w-100 m-auto">
    <div class="formstyle">
        <form onsubmit="event.preventDefault();" method="POST">
            <i class="fa-solid fa-square-plus"></i>
            <h1 class="h3 mb-3 fw-normal">Create</h1>

            <div class="form-floating">
            <input type="text" name="cinema_name" class="form-control" id="cinema_name" placeholder="naam@voorbeeld.com">
            <label for="cinema_name">Bioscoop naam</label>
            </div>

            <div class="form-floating">
            <label for="cinema_desc">Beschrijving Bioscoop</label>
            <textarea id="mytextarea" rows="15"></textarea>

            </div>

            <input class="w-100 btn btn-lg btn-success" type="submit" id="" value="Create"></input>

            <p class="mt-5 mb-3 text-muted">&copy; WebWorld</p>
        </form>
    </div>
</main>

</html>
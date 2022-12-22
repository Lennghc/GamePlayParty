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
        selector: '#cinema_desc'
      });

      tinymce.init({
        selector: '#cinema_reachabilty'
      });
    </script>
</head>
<body class="text-center">

<main class="form-signin w-100 m-auto">
    <div class="formstyle">
        <form action="?con=cinema&op=create" method="POST">
            <i class="fa-solid fa-square-plus"></i>
            <h1 class="h3 mb-3 fw-normal">Create</h1>

            <div class="form-floating">
                <input type="text" name="cinema_name" class="form-control" id="cinema_name" placeholder="Bioscoop naam">
                <label for="cinema_name">Bioscoop naam</label>
            </div>

            <div class="form-floating">
                <textarea name="cinema_desc" id="cinema_desc" rows="15" placeholder="Beschrijving Bioscoop"></textarea>
            </div>

            <div class="form-floating">
                <textarea name="cinema_reachabilty" id="cinema_reachabilty" rows="15" placeholder="Bereikbaarheid Bioscoop"></textarea>
            </div>

            <input class="w-100 btn btn-lg btn-success" type="submit" name="submit" value="Create"></input>

            <p class="mt-5 mb-3 text-muted">&copy; WebWorld</p>
        </form>
    </div>
</main>

</html>
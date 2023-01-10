<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Create Cinema";
    include 'Views/Layout/header.php';
    ?>
    <script>
      tinymce.init({
        selector: '#cinema_desc'
      });

      tinymce.init({
        selector: '#cinema_reachabilty'
      });
    </script>

    <style>
        form {
            display: flex;
            flex-direction: column;
        }

        .formPosition {
            margin: auto;
        }
    </style>
</head>
<body class="text-center">

<main class="form-signin w-100 m-auto">
    <div class="formstyle">
        <form action="?con=cinema&op=create" method="POST">
            <h1 class="h3 mb-3 fw-normal">Wat is de naam van uw bioscoop?</h1>
        <div class="container formPosition">

            <div class="row">
                <div class="col-sm-3"></div>

                <div class="col-sm-6">
                    <div class="form-floating">
                        <input type="text" name="cinema_name" class="form-control" id="cinema_name" placeholder="Bioscoop naam">
                        <label for="cinema_name">Bioscoop naam</label>
                    </div>
                </div>

                <div class="col-sm-3"></div>
            </div>

            <!-- <div class="row">
                <div class="col-sm-6">
                    <div class="form-floating">
                        <textarea name="cinema_desc" id="cinema_desc" rows="15" placeholder="Beschrijving Bioscoop"></textarea>
                    </div>
                </div>

                <div class="col-sm">
                    <div class="form-floating">
                        <textarea name="cinema_reachabilty" id="cinema_reachabilty" rows="15" placeholder="Bereikbaarheid Bioscoop"></textarea>
                    </div>
                </div>
            </div> -->

            <div class="row">
                <div class="col-sm-3"></div>

                <div class="col-sm-6">
                    <input class="w-100 btn btn-lg btn-success" type="submit" name="submit" value="Bevestig"></input>
                </div>

                <div class="col-sm-3"></div>
            </div>
        </div>

        <p class="mt-5 mb-3 text-muted">&copy; WebWorld</p>
        </form>
    </div>
</main>

</html>
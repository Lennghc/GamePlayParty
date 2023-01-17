<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Update About us";
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

<?php //include './Views/Pages/Admin/Layout/sidebar.php' ?> 

<body class="text-center">

<div class="col py-3">
        <div class="container">
            <form action="index.php?con=content&op=updateAbout" method="POST" enctype="multipart/form-data">
                <div class="d-flex justify-content-between">
                    <h2>About us pagina</h2>
                    <button class="btn bg-dark bg-opacity-50 text-white" type="submit" name="submit">Opslaan</button>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" name="About_title" id="About_title" class="form-control" placeholder='Title' value="<?=$result[0]['About_title']?>">
                            <label for="About_title">Paginatitel</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <h5>Wie zijn wij?</h5>
                        <div class="form-floating mb-3">
                        <label for="About_main_content">Wie zijn wij?</label>
                        <textarea type="textarea" id="About_main_content" name="About_main_content" placeholder="Wie zijn wij?" rows="20" cols="50"><?=$result[0]['About_main_content']?></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h5>Contact opnemen</h5>
                        <div class="form-floating mb-3">
                            <label for="About_contact_info">Contact</label>
                            <textarea class="form-control" name="About_contact_info" placeholder="Contact" id="About_contact_info" style="height: 100px"><?=$result[0]['About_contact_info']?></textarea>
                        </div>
                    </div>
                </div>
                </div>
            </form>

        </div>
    </div>
    </div>
    </div>

</html>




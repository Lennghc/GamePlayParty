    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="">
    <meta name="generator" content="">

    <link rel="apple-touch-icon" sizes="180x180" href="<?= PATH_DIR ?>/Assets/Img/favi/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= PATH_DIR ?>/Assets/Img/favi/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= PATH_DIR ?>/Assets/Img/favi/favicon-16x16.png">
    <link rel="manifest" href="<?= PATH_DIR ?>/Assets/Img/favi/site.webmanifest">

    <title><?php echo ucfirst(trim($title)); ?> | GamePlayParty</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= PATH_DIR ?>/Assets/Css/footer.css">
    <link rel="stylesheet" href="<?= PATH_DIR ?>/Assets/Css/navbar.css">
    <link rel="stylesheet" href="<?= PATH_DIR ?>/Assets/Css/style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="<?= PATH_DIR ?>/Assets/Js/main.js"></script>

    <script src="https://cdn.tiny.cloud/1/n6d94lsn8bitkcbq2omzywk4hjsuemueys7xbsg845i98a64/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#Page',
            plugins: 'anchor autolink charmap emoticons image link lists media searchreplace visualblocks checklist mediaembed casechange formatpainter linkchecker permanentpen powerpaste advcode editimage footnotes inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media | a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        });

        tinymce.init({
            selector: 'textarea',
        })
    </script>
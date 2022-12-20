<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "cms";
    include 'Views/Layout/header.php';
    ?>
    <link rel="stylesheet" href="Assets/Css/cmsSidebar.css">
		<link href="https://fonts.googleapis.com/css2 family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"/>
       <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
		<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>

<div class="sidebar">
    <nav class="sidebar_menu">
        <button>
            <span>
                <i class="fa-solid fa-house"></i>
                <a href="/"><span>Home</span></a>
            </span>
        </button>
    </nav>
</div>


<?php include 'Views/Layout/footer.php'; ?>

</body>

</html>
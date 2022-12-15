<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/Css/navbar.css">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <title>Nav Bar</title>
</head>
    <body>
        <nav>
            <div class="nav-bar">
                <i class="bx bx-menu sidebarOpen"><img src="Assets/Img/logo.png"></i>
                <span class="logo navLogo"><a href="#">LOGO</a></span>

                <div class="menu">
                    <div class="logo-toggle">
                        <span class="logo"><a href="#">Logo</a></span>
                        <i class="bx bx-menu sidebarClose"></i>
                    </div>
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Info</a></li>
                </ul>
                </div>
                <div class="darkLight-searchBox">
                    <div class="dark-light">
                        <i class="bx bx-moon moon"></i>
                        <i class="bx bx-sun sun"></i>
                    </div>
                    <div class="searchBox">
                        <div class="searchToggle">
                            <i class="bx bx-x cancel"></i>
                            <i class="bx bx-search search"></i>
                        </div>
                        <div class="search-field">
                            <input type="text" placeholder="Search...">
                            <i class="bx bx-search"></i>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <script src="Assets/Js/navbar.js"></script>
    </body>
</html>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-green">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="<?= PATH_DIR ?>/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Beheer Paneel</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="<?= PATH_DIR ?>/" class="nav-link align-middle px-0">
                            <i class="fa fa-house"></i> <span class="ms-1 d-none d-sm-inline text-white">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?con=cms" class="nav-link px-0 align-middle">
                            <i class="fa fa-book-bookmark"></i> <span class="ms-1 d-none d-sm-inline text-white">Reserveringen</span></a>
                    </li>
                    <?= isset($_SESSION['user']) && $_SESSION['user']->role_id == 3 ? '<li><a href="index.php?con=cms&op=lounge" class="nav-link px-0 align-middle"><i class="fa fa-video"></i> <span class="ms-1 d-none d-sm-inline text-white">Zalen</span></a></li>' : null ?>
                    <?= isset($_SESSION['user']) && $_SESSION['user']->role_id == 4 ? '<li><a href="index.php?con=cms&op=users" class="nav-link px-0 align-middle"><i class="fa fa-users"></i> <span class="ms-1 d-none d-sm-inline text-white">Gebruikers</span></a></li>' : null ?>
                    <?= isset($_SESSION['user']) && $_SESSION['user']->role_id == 4 ? '<li><a href="index.php?con=cms&op=cinema" class="nav-link px-0 align-middle"><i class="fa fa-video"></i> <span class="ms-1 d-none d-sm-inline text-white">Bioscopen</span></a></li>' : null ?>


                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i>
                        <span class="d-none d-sm-inline mx-1"><?= $_SESSION['user']->username ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <!-- <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li> -->
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="index.php?con=auth&op=logout">Uitloggen</a></li>
                    </ul>
                </div>
            </div>

        </div>

        <?php
        if (isset($_SESSION['toast'])) {
            echo $_SESSION['toast'];
            unset($_SESSION['toast']);
        }
        ?>
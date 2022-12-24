<!DOCTYPE html>
<html lang="en">

<head>
        <meta http-equiv="refresh" content="100">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="Assets/Css/cmsSidebar.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
		<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
		<link href="https://fonts.googleapis.com/css2 family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"/>
       <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
		<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>

<aside class="sidebar">
			<div class="sidebar-inner">
				<nav class="sidebar-tools">
					<button type="button">
						<a href="?con=home">
							<i class="fa-solid fa-house"></i>
						</a>
					</button>
					<button type="button">
						<a href="?con=cinema&op=readAll">
							<i class="fa-solid fa-film"></i>
						</a>
					</button>
					<button type="button">
						<a href="index.php?con=lounge&op=create"><i class="fa-solid fa-plus"></i></a>
					</button>
					<!-- <button type="button">
						<i class="fa-solid fa-folder-open"></i>
					</button> -->
				</nav>
					<footer class="sidebar-tools-footer">
					<a href="index.php?con=home&op=logout">
					<button type="button">
						<i class="fa-solid fa-lock"></i>

						<span style="animation-delay: .1s">Uitloggen</span>

					</button>
				</a>
				</footer>
				<div class="sidebar-menu-container"></div>
				<nav class="sidebar-menu">
					<button type="button">
                        <a href="?con=cinema&op=readAll">
                            <i class="fa-solid fa-film"></i>
                        </a>
					</button>
				</nav>
			</div>
		</aside>

		<div class="table">
			<?= $res ?>
		</div>

<script src="<?= PATH_DIR ?>/Assets/Js/cms.js"></script>
</body>

</html>
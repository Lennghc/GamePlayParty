<!DOCTYPE html>
<html lang="en">

<head>
        <title style="color: brown">Sidebar 5</title>
        <meta name="author" content="Zaur">
        <meta descryption content="Presentation of website">
        <meta name="keywords" content="technology, cyber security, software">
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
				<header class="sidebar-header">
					<button type="button" class="sidebar-burger" onclick="toggleSidebar()">
					  <i class="fa-solid fa-bars burger-icon"></i>
					</button>
					<img src="images/blocklord-logo.png" class="sidebar-logo">
				</header>
				<div class="sidebar-tools-container">
				<nav class="sidebar-tools">
					<button type="button">
						<i class="fa-solid fa-house"></i>
					</button>
					<button type="button">
						<i class="fa-solid fa-gear"></i>
					</button>
					<button type="button">
						<i class="fa-solid fa-folder-open"></i>
					</button>
				</nav>
					<footer class="sidebar-tools-footer">
					<button type="button">
						<i class="fa-solid fa-lock"></i>
						<span style="animation-delay: .1s">Logout</span>
					</button>
				</footer>
				</div>
				<div class="sidebar-menu-container"></div>
				<nav class="sidebar-menu">
					<button type="button">
						<i class="fa-brands fa-bitcoin"></i>
						<span style="animation-delay: .6s">Blockchain</span>
					</button>
					<button type="button">
						<i class="fa-solid fa-database"></i>
						<span style="animation-delay: .4s">Database</span>
					</button>
					<button type="button">
					<i class="fa-solid fa-layer-group"></i>
						<span style="animation-delay: .4s">Levels</span>
					</button>
					<button type="button">
						<i class="fa-solid fa-user"></i>
						<span style="animation-delay: .3s">Accounts</span>
					</button>
					<button type="button">
						<i class="fa-solid fa-folder-open"></i>
						<span style="animation-delay: .2s">Folders</span>
					</button>
				</nav>
			</div>
		</aside>

		<div class="copy">
			<p>
				Lorem Ipsum
			</p>
		</div>


<script src="<?= PATH_DIR ?>/Assets/Js/cms.js"></script>
</body>

</html>
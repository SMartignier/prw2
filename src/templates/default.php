<!DOCTYPE html>
<html>
	<head>
		<meta name="keywords" content="<?php echo $keywords;?>">
		<meta name="description" content="<?php echo $description;?>">
		<meta charset="utf-8" />
		
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
		
		<link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="assets/js/links.js"></script>
		<script type="text/javascript" src="assets/js/forms.js"></script>
		<script type="text/javascript" src="assets/js/load.js"></script>
		
		<title><?php echo $title;?></title>
	</head>
	<body>
	
	<header>
		<a href="home" id="logo"><img src="assets/images/logoInformatiqueVert.jpg" alt="logo" /></a>
		<nav id="menu">
			<a href="home">Accueil</a>
			<a href="list">Liste</a>
			<a href="basket">Panier</a>
		</nav>
	</header>
		
	<div id="page">
	
		<?php if($flashMessage != ""){?>
			<div class="flashMessage"><?php echo $flashMessage;?></div><?php
		}?>
		
		<div id="content">
			<?php echo $content;?>
		</div><!-- content -->
	
	</div><!-- page -->
	
	<footer>
		&copy; 2015 <a href="http://www.cpnv.ch">CPNV</a> - YSN - All Rights Reserved
	</footer>
	
	</body>
</html>
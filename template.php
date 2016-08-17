<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page->getTitle(); ?></title>
	<meta charset="<?php echo $page->getCharset(); ?>">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/defaultStyles.css">
	<?php
		foreach ($page->getStyles() as $key => $style) {
			echo '<link rel="stylesheet" type="text/css" href="css/'.$style.'.css">';
		}
	?>
</head>
<body>
	<!-- import header -->
	<?php require_once ("header.php"); ?>

	<!-- import Menu -->
	<?php require_once ("menu.php"); ?>
	<div class ="containerMainSection">
		<div class="container">
			<?php 
				$bodyFileName = $page->getPageBody();
				require_once ("$bodyFileName.php"); 
			?>
		</div>
	</div>
	
	<?php require_once ("footer.php"); ?>

	<script src="js/jquery-1.12.3.js"></script>
	<script src="js/jquery.la_cabana_plugin.js"></script>
	<script src="js/defaultBehavior.js"></script>
	<?php
		foreach ($page->getScripts() as $key => $script) {
			echo '<script src="js/'.$script.'.js"></script>';
		}
	?>
</body>
</html>
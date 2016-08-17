<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h2 class="bottomLine">Nuestras Cabañas</h2>
	</div>
</div>
<?php
	require_once('classes/controllers/CabinsController.php');

	$controller = new CabinsController();

	$cabins = $controller->getCabins();

	foreach ($cabins as $key => $cabin) {
		echo '
			<div class="row cabinRow">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4">
							<img src="';
							echo $cabin->getThumbnail()->getPath();
							echo '" class="img-responsive imageDisplayed" alt="';
							echo $cabin->getThumbnail()->getAlternateText();
							echo'">
						</div>
						<div class="col-xs-12 col-sm-8 col-md-8">
							<p><h3>';
							echo $cabin->getName();
							echo '</h3><br>';
							echo $cabin->getDescription();
							echo '
							</p>
							<ul>';
								foreach ($cabin->getAmenities() as $key => $amenitie) {
									echo '<li>'.$amenitie.'</li>';
								}
							echo '</ul>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-8">
							<div class="row">';
								foreach ($cabin->getImages() as $key => $image) {
									echo '<div class="col-xs-12 col-sm-2 col-md-2">
										<img src="';
										echo $image->getPath();
										echo '" class="';
										echo 'img-responsive imageThumbnail" alt="';
										echo $image->getAlternateText();
										echo '">
									</div>';
								}
								echo '
								<div class="col-xs-12 col-sm-2 col-md-2">&nbsp;</div>
								<div class="col-xs-12 col-sm-2 col-md-2">&nbsp;</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		';
	}
	
?>
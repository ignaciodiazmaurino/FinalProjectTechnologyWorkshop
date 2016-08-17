<nav class="navbar navbar-inverse menuStyle">
	<div class="container">
		<div id="menuBar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">

				<?php 
					$menuOptions = $page->getMenuOptions();
					if (is_array($menuOptions)) {
						foreach ($menuOptions as $key => $value) {
							if ($value->getUserRole()=='any') {
								echo '<li id="'.$value->getOptionId().'Option"';
								if ($page->getPageBody() === $value->getOptionId()) {
									echo ' class="active"';
								}
								echo '>';
								echo '<a href="index.php?page='.$value->getOptionId().'">'.$value->getOptionTextValue().'</a>';
								echo '</li>';
							} else if (isset($_SESSION['user'])) {
								echo '<li id="'.$value->getOptionId().'Option"';
								if ($page->getPageBody() === $value->getOptionId()) {
									echo ' class="active"';
								}
								echo '>';
								echo '<a href="index.php?page='.$value->getOptionId().'">'.$value->getOptionTextValue().'</a>';
								echo '</li>';
							}
						}
					}
				?>
				
			</ul>
			<?php
				if (isset($_SESSION['user'])) {
					echo '<ul class="nav navbar-nav navbar-right">
						<li id="myProfileOption"><a href="index.php?page=myProfile">Mi perfil</a></li>
					</ul>';
				}
			?>
		</div>
	</div>
</nav>
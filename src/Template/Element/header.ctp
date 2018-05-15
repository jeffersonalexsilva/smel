<!-- Sidebar navigation -->
<header>
	<nav class="navbar fixed-top navbar-light shadow-sm">
		<div class="container">
			<span class="navbar-brand">
				<?= $this->Html->image('icon-integra.png', ['alt' => 'Logo da instituição','width'=>'25px','height'=>'auto']); ?>
			</span>
			<?= $this->element('side_menudefault') ?>
		</div>
	</nav>
	<!--/. Sidebar navigation -->
	<div class="banner">
		<?php
		//lista de eventos
		if(isset($eventos)){
			echo $this->element('side_banner_home',['eventos' => $eventos]);
		}else if(isset($evento)){
			//evento único
			echo $this->element('side_banner_evento', ['evento' => $evento]);
		} ?>
	</div>
</header>

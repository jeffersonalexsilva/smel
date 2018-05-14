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
	<?php if(!$this->request->getSession()->check('usuario')){ ?>
	<div class="banner">
		<?= $this->element('side_banner_home') ?>
	</div>
	<?php } ?>
</header>

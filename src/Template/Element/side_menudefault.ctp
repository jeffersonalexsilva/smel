<ul class="nav menu mr-auto">
	<li class="nav-item active">
		<?= $this->Html->link('Início','/',['class'=>'nav-link']); ?>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#">Sobre</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#">Contato</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#">Sobre</a>
	</li>
</ul>
<ul class="nav justify-content-end">
	<li class="nav-item">
		<?= $this->Html->link('Cadastrar',['controller' => 'Usuarios','action' => 'cadastrar'],['class'=>'nav-link']); ?>
	</li>
	<li class="nav-item">
		<?= $this->Html->link('Login',['controller' => 'Usuarios','action' => 'login'],['class'=>'nav-link btn-primary']); ?>
	</li>
</ul>
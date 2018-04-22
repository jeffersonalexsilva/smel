<nav id="menu-side-dafault" class="menu">
	<ul class="itens">
		<li class="item"><?= $this->Html->link('Início','/'); ?></li>
		<li class="item"><a href="#">Sobre</a></li>
		<li class="item"><a href="#">Eventos</a></li>
		<li class="item login"><?= $this->Html->link('Login',['controller' => 'Usuarios','action' => 'login']); ?></li>
	</ul>
</nav>
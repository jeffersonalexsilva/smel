<?php $this -> assign('title', $this -> request -> session()-> read('evento_atual')->descticao);?>
<section id="admin-painel">
	<div class="central">
		<h1 class="title">Acesso Administrativo</h1>
		<div class="messages">
			<span class="content-msg"></span>
		</div>
		<nav class='menu-admin'>
			<ul class="admin-list-menu">
				<li><?= $this->Html->link('Eventos',['controller' => 'Admin','action' => 'eventos']); ?></li>
				<li><?= $this->Html->link('Horários',['controller' => 'Admin','action' => 'data_hora']); ?></li>
				<li><?= $this->Html->link('Tipos de Atividade',['controller' => 'Admin','action' => 'tipo_atividade']); ?></li>
				<li><?= $this->Html->link('Lista de Inscritos',['controller' => 'Admin','action' => 'listagem']); ?></li>
				<li><?= $this->Html->link('Monitores',['controller' => 'Admin','action' => 'monitores']); ?></li>
			</ul>
		</nav>
	</div>
</section>
<?php //date('Y/m/d H:i:s');?>

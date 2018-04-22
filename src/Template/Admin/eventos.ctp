<section id="admin-painel">
	<div class="central">
	<h1 class="title">Listagem de Eventos</h1>
	<div class="messages">
			<span class="content-msg"></span>
		</div>
		<div class="content-admin">
			<ul class="list-events">
			<?php foreach ($eventos as $evento):?>
				<li class="item">
					<h4 class="sub-title"><?= $evento->descricao; ?></h4>
					<div class="data-hora">de <span class="data-inicial"><?= date_format($evento ->data_hora_inicio, 'd/M/Y'); ?></span> à <span class="data-final"><?= date_format($evento ->data_hora_fim, 'd/M/Y'); ?></span></div>
					<a href="#" class="edit">Editar</a>
				</li>
			<?php endforeach;?>
			</ul>
		</div>
	</div>
	<?= $this->Html->link('Voltar',['controller' => 'Admin','action' => 'index'],['class'=>'submit']); ?>
</section>
<a href="#painel-evento" class="ico-add" title="Adicionar evento">+</a>
<section id="painel-evento" class="painel-add">
	<div class="central">
		<h2 class="title">Cadastro de Evento</h2>
			<div class="messages side">
				<span class="content-msg"></span>
			</div>
			<form id="form-envia-evento">
				<?= $this -> Form -> input('text', array('name' => 'titulo', 'placeholder' => "Título do evento", 'label' => 'Titulo do Evento')); ?>
				

				<button id="bt_submissao_atividade" class="submit active">Enviar</button>
				<a href="#right" class="submit">fechar</a>
			</form>
	</div>
</section>
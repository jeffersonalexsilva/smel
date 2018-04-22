<?php $semana = array(
			'Sun' => 'Domingo',
			'Mon' => 'Segunda-Feira',
			'Tue' => 'Terca-Feira',
			'Wed' => 'Quarta-Feira',
			'Thu' => 'Quinta-Feira',
			'Fri' => 'Sexta-Feira',
			'Sat' => 'Sábado'
	);
	$mes = array(
			'Jan' => 'Jan',
			'Feb' => 'Fev',
			'Mar' => 'Mar',
			'Apr' => 'Abr',
			'May' => 'Mai',
			'Jun' => 'Jun',
			'Jul' => 'Jul',
			'Aug' => 'Ago',
			'Nov' => 'Nov',
			'Sep' => 'Set',
			'Oct' => 'Out',
			'Dec' => 'Dez'
	);?>
<section id="admin-painel">
	<div class="central">
	<h1 class="title">Listagem de Horários</h1>
	<div class="messages">
			<span class="content-msg"></span>
		</div>
		<div class="content-admin">
			<ul class="list-horarios">
			<?php 
			$evento_list = $horarios[0]->evento->idevento;//primeiro evento da lista
				$tamanho_lista = count($horarios);
			?>
			<input id="item-<?=$horarios[0]->evento->idevento; ?>" type="checkbox" class="ck-list-horario"/>
			<li class="item <?=$horarios[0]->evento->idevento; ?>">
				<label>Evento: <?= $horarios[0]->evento->descricao ?> | <?= date_format($horarios[0] ->inicio, 'm') ?>/<?= date_format($horarios[0] ->inicio, 'Y'); ?> <a href="#" class="open-close">+</a></label>
				<div class="container-horarios">
					<table class="table-clock">
					<tr><th>Dia</th><th>Início</th><th>Fim</th><th></th></tr>
			<?php foreach ($horarios as $horario): 
			if($evento_list != $horario->evento->idevento){ //evento do horário anterior <> do horário atual
				$evento_list = $horario->evento->idevento;//pega o próximo evento ?>
						</table>
					</div>
				</li>
				<input id="item-<?=$horario->evento->idevento; ?>" type="checkbox" class="ck-list-horario"/>
				<li class="item <?=$horario->evento->idevento; ?>">
					<label>Evento: <?= $horario->evento->descricao ?> | <?= date_format($horario ->inicio, 'm') ?>/<?= date_format($horario ->inicio, 'Y'); ?> <a href="#" class="open-close">+</a></label>
					<div class="container-horarios">
						<table class="table-clock">
						<tr><th>Dia</th><th>Início</th><th>Fim</th><th></th></tr>
			<?php } ?>
					<tr>
						<td><?= $semana[date_format($horario ->inicio, 'D')] ?> (<?= date_format($horario ->inicio, 'd'); ?>)</td>
						<td><?= date_format($horario ->inicio, 'H') ?>:<?= date_format($horario ->inicio, 'i'); ?></td>
						<td><?= date_format($horario ->final, 'H') ?>:<?= date_format($horario ->final, 'i'); ?></td>
						<td><a href="#" class="edit">Editar</a></td>
					</tr>
			<?php endforeach;?>
						</table>
					</div>
				</li>
			</ul>
		</div>
	</div>
</section>
<a href="#painel-data" class="ico-add" title="Adicionar evento">+</a>
<section id="painel-data" class="painel-add">
	<div class="central">
		<h2 class="title">Cadastro de Data/Hora</h2>
			<div class="messages side">
				<span class="content-msg"></span>
			</div>
			<form id="form-cadastra-datahora">
					<?php 
						$dia_op = array_combine(range(01, 31), range(01, 31)); 
						$hora_op = array_combine(range(07, 22), range(07, 22)); 
						$minuto_op = array_combine(range(00, 59,15), range(00, 59,15)); 
					?>
				<div class="input select">
					<label>Dia</label>
					<?= $this -> Form -> select('dia-atividade', $dia_op,['empty'=>'== Escolha ==']); ?>
				</div>
				<div class="input select part">
					<label>Hora</label>
					<?= $this -> Form -> select('hora-inicio', $hora_op,['empty'=>'== Escolha ==']); ?>
				</div>
				<div class="input select part">
					<label>Minuto</label>
					<?= $this -> Form -> select('minuto-inicio', $minuto_op,['empty'=>'== Escolha ==']); ?>
				</div>
				
				<?= $this -> Form -> input('text', array('name' => 'duracao', 'placeholder' => "Duração", 'label' => 'Duração (em horas)')); ?>
				

				<button id="bt_cadastra_hora" class="submit active">Cadastrar</button>
				<a href="#right" class="submit">fechar</a>
			</form>
	</div>
</section>
<script src='<?= $this->Url->script("jquery.inputmask.min.js")?>'></script>
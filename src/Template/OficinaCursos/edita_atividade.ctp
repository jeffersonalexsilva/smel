<?php $this -> assign('title', $this -> request -> session()-> read('evento_atual')->descticao . ' | Editar Atividade');
$semana = array(
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
);
?>
<section id="painel-submissao">
	<h1 class="title">Editar Atividade</h1>
	<div class="messages">
		<span class="content-msg"></span>
	</div>
	<?php if($curso->status_oficina->idstatus_oficinas == 2) {?>
	<div class="central">
			<form id="form-envia-oficina">
				<?= $this -> Form -> input('text', array('name' => 'titulo', 'placeholder' => "Título da oficina", 'label' => 'Titulo da oficina','value'=>$curso->descricao)); ?>
				<?= $this -> Form -> input('text', array('name' => 'instrutor', 'placeholder' => "Instrutor(es) da oficina", 'label' => 'Instrutor(es) da oficina','value'=>$curso->instrutor)); ?>
				<div class="input select part">
						<?php $_tipos = array();
							foreach($tipos as $item) { 
								$_tipos[$item->idtipo_oficina] = $item->descricao;
								}?>
					<label>Tipo</label>
					<?= $this -> Form -> select('tipo_oficina', $_tipos,['default'=>$curso->tipo_oficina_idtipo_oficina]); ?>
				</div>
				<div class="input text part">
					<label>Quantidade de vagas</label>
					<?= $this -> Form -> number('text', array('name' => 'vagas','label' => 'QT Vagas','value'=>$curso->vagas_oferecidas)); ?>
				</div>
				<div class="input select part">
						<?php $_datas = array();
							foreach($datas as $item) { 
								$_datas[$item->iddata_hora] = $semana[date_format($item ->inicio, 'D')].', ' . date_format($item ->inicio, 'd').'/'. $mes[date_format($item ->inicio, 'M')].' - '. date_format($item ->inicio, 'H:i');
								}?>
					<label>Data e hora Inicial</label>
					<?= $this -> Form -> select('data_hora', $_datas,['default'=>$curso->data_hora_iddata_hora]); ?>
				</div>
				<?= $this -> Form -> input('text', array('name' => 'publico_alvo', 'placeholder' => "Público-alvo", 'label' => 'Público-alvo dessa atividade. Perfil esperado','value'=>$curso->publico_alvo)); ?>
				<div class="input text part">
					<label>Resumo</label>
					<?= $this -> Form -> textarea('text', array('name' => 'resumo','placeholder' => 'Fale mais sobre essa atividade.','rows'=>3,'value'=>$curso->resumo)); ?>
				</div>
				<div class="input text part">
					<label>Materiais</label>
					<?= $this -> Form -> textarea('text', array('name' => 'equipamento','placeholder' => 'Relacione os materiais e equipamentos que vai precisar.','rows'=>3,'value'=>$curso->materiais_equipamentos)); ?>
				</div>
				<?= $this -> Form -> input('text', array('name' => 'local', 'placeholder' => "Local do Evento", 'label' => 'Local previsto','value'=>$curso->local)); ?>
				<div class="input select part">
						<?php $_status = array();
							foreach($status as $item) { 
								$_status[$item->idstatus_oficinas] = $item->descricao;
								}?>
					<label>Status</label>
					<?= $this -> Form -> select('status_oficina', $_status,['default'=>$curso->status_oficinas_idstatus_oficinas]); ?>
				</div>
				<div class="input text">
					<label>Observações adicionais</label>
					<?= $this -> Form -> textarea('text', array('name' => 'observacao','placeholder' => 'Tem mais alguma coisa que queira dizer para o público, sobre a atividade? Descreva aqui','rows'=>3,'value'=>$curso->observacao)); ?>
				</div>
					<?= $this -> Form -> hidden('curso',['value' => $curso->idcurso]); ?>

				<button id="bt_edita_atividade" class="submit active">Editar</button>
				<?= $this->Html->link('Voltar',['controller' => 'Inscricoes','action' => 'submissao'],['class'=>'submit']); ?>
			</form>
	</div>
	<?php }else{ ?>
		<h3 class="sub-title">Não é possível editar essa oficina. Entre em contato com a Coordenação para mais detalhes.</h3>
	<?php } ?>
</section>
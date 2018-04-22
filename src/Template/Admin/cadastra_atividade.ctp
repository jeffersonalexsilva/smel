
<section id="cadastra-oficinas" class="central">
	<div>
		<form id="cad-oficinas">
			<?= $this -> Form -> input('text', array('name' => 'titulo', 'placeholder' => "Título da oficina", 'label' => 'Titulo da oficina')); ?>
			<?= $this -> Form -> input('text', array('name' => 'instrutor', 'placeholder' => "Instrutor da oficina", 'label' => 'Instrutor da oficina')); ?>
			<div class="input text">
				<label>Quantidade de vagas</label>
				<?= $this -> Form -> number('text', array('name' => 'vagas','label' => 'QT Vagas')); ?>
			</div>
			<?= $this -> Form -> input('text', array('name' => 'local', 'placeholder' => "Local do Evento", 'label' => 'Local do Evento')); ?>
			<label>Tipo</label>
			<select name="tipo_oficina">
				<?php foreach($tipos as $item) { ?>
					<option value="<?= $item ->idtipo_oficina; ?>"><?= $item ->descricao; ?></option>
				<?php } ?>
			</select>
			<div>
			<label>Contínua?</label>
				<?= $this -> Form -> checkbox('continua',['value' => 1]); ?>
			</div>
			<label>Data e hora</label>
			<select name="data_hora">
				<?php foreach($datas as $item) { ?>
					<option value="<?= $item ->iddata_hora; ?>"><?= date_format($item ->inicio, 'D, d-M H:i'); ?></option>
				<?php } ?>
			</select>
			<label>Observações</label>
			<?= $this -> Form -> textarea('text', array('name' => 'observacao','label' => 'Observações')); ?>
			<label>Eventos</label>
			<select name="evento">
				<?php foreach($eventos as $item) { ?>
					<option value="<?= $item ->idevento; ?>"><?= $item ->descricao; ?></option>
				<?php } ?>
			</select>
			<button id="bt_cad_oficina">Cadastrar Oficina</button>
		</form>
	</div>
</section>
<script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=1bfqkydbmpsbkd1syuvdodl5roueyulzunsk0ewxgwvdfj09"></script>
<script>tinymce.init({ selector:'textarea' });</script>
 <?php if(isset($lista) && !empty($lista)){  
 // debug($lista);
?>
 
 <h1>Listagem de Inscritos - Integra CAA</h1>
 <h3>Oficina: <?= $lista[0]['OficinaCursos']['descricao']; ?></h3>
 <h4>Instrutor(a): <?= $lista[0]['OficinaCursos']['instrutor']; ?></h4>
 <span><?= $lista[0]['OficinaCursos']['vagas_oferecidas']; ?> vagas</span>
 <form id="form-frequencia">
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>NOME</th>
				<th>CPF</th>
				<th>EMAIL</th>
				<th>ASSINATURA</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($lista as $i => $item) { ?>
			<tr>
				<td><?= $i+1 ?></td>
				<td>
					<input type="checkbox" name="inscritos[]" id="usr-<?php echo $item['Usuarios']['idusuario'];?>" value="<?= $item['Usuarios']['idusuario'] .','. $lista[0]['OficinaCursos']['idoficina_curso'];?>" <?= $item['presente']?"checked":""?>>
					<label for="usr-<?= $item['Usuarios']['idusuario'];?>" class="lb-ck-listanome"></label>
					<label for="usr-<?= $item['Usuarios']['idusuario'];?>"><?= strtoupper($item['Usuarios']['nome']);?></label>
				</td>
				<td><?= $item['Usuarios']['cpf'];?></td>
				<td><?= $item['Usuarios']['email'];?></td>
				<td></td>
			</tr>
			<?php } ?>			
		</tbody>
	</table>
	<button id="bt_frequencia">Salvar presença</button>
</form>

<aside class="adiciona-participante">
	<fieldset class="cadastro">
		<legend>Adicionar participante à oficina</legend>
		<form id="adiciona-participante">
			<?= $this -> Form -> input('text', array('name' => 'cpf', "placeholder" => "CPF", 'label' => 'CPF do participante')); ?>
			<?= $this -> Form -> hidden('idcurso', array("value"=>$lista[0]['OficinaCursos']['idoficina_curso'])); ?>
			<?= $this -> Form -> hidden('idhorario', array("value"=>$lista[0]['data_horas_iddata_hora'])); ?>
			<?= $this -> Form -> button('Incluir',['class'=>'cadastrar','id'=>"bt_add_participante"]); ?>
		</form>
	</fieldset>
</aside>
<script>
	$('#bt_frequencia').on('click',function(e){
		presenca_inscrito();
		e.preventDefault();
	});
	$('#bt_add_participante').on('click',function(e){
		add_inscricao();
		e.preventDefault();
	});
</script>
<?php }else die('Não há participantes para essa oficina'); ?>
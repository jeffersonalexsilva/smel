<?php $this -> assign('title', 'Integra CAA 2016.1');
$sessao = $this -> request -> session();
// echo '<pre>';
// debug($usuario);
// echo '</pre>';
	$usuario = $sessao -> read('usuario');
	$cursos = $usuario->cursos;
?>
<a href="#" class="voltar" onclick="location.reload()">« VOLTAR</a>
<h3>#Oficinas Disponíveis</h3>
	<form id="form-oficinas">
		<ul class="oficinas">
			<?php foreach ($cursos as $curso) : ?>
			<li>
			<?php if(time() <= strtotime($curso -> data_hora->inicio)){ ?>
				<input type="checkbox" value="<?= $curso -> oficina_curso->idoficina_curso; ?>" data-horario="<?= $curso->data_hora->iddata_hora;?>" name="oficina[]" id="oficina-<?= $curso -> oficina_curso->idoficina_curso; ?>"/>				
			<?php } ?>
			
				<label class="oficina" for="oficina-<?= $curso ->oficina_curso-> idoficina_curso; ?>">
					<div class="painel">
						<div class="descricao">
							<p>
								<?= $curso ->oficina_curso-> descricao; ?>
								<em class="autor">Por: <strong><?= $curso ->oficina_curso-> instrutor; ?></strong></em>
							</p>
						</div>
						<div class="data-hora">
							<span class="data">
								<?php echo(time() <= strtotime($curso -> data_hora->inicio)) ? "" : "<span class='done'>ENCERRADO</span>"; ?>
								<span><?= date_format($curso -> data_hora->inicio, 'd'); ?></span>
								-
								<span><?= date_format($curso -> data_hora->inicio, 'm'); ?></span>
							</span>
							<span class="hora"><?= date_format($curso -> data_hora->inicio, 'H:i'); ?></span>
						</div>
					</div>
				</label>
			</li>
			<?php endforeach; ?>
		</ul>
		<footer class="rodape">
			<?php if(!empty($cursos)){ ?>
				<button id="bt_inscreve">Inscrever</button>
			<?php }else{ ?>
				<em>Não há atividades disponíveis</em>
			<?php } ?>
		</footer>
	</form>
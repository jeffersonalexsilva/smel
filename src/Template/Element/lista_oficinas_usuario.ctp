<?php 
	$evento = $this -> request -> session() -> read('evento_atual');
	$usuario = $this -> request -> session() -> read('usuario');
?>
<section id="lista-oficinas-usuario">
<strong>Minhas Atividades</strong>
	<ul class="lista-oficinas-usuario lopt">
		<li><a href="#atual" class="active">Evento atual</a></li>
		<li><a href="#anterior">Anteriores</a></li>
	</ul>
	<?php //debug($cursos);?>
	<div class="painel-listas">
		<form id="form-oficinas">
		<ul class="oficinas list-items-box active" id="atual">
			<?php foreach ($cursos as $curso) : 
				if($curso -> oficina_curso->eventos_idevento == $evento->idevento){
			?>
			<li class="item">
			<?php if(time() <= strtotime($curso -> data_hora->inicio)){ ?>
				<input type="checkbox" value="<?= $curso -> oficina_curso->idoficina_curso; ?>" data-horario="<?= $curso -> data_hora->iddata_hora;?>" name="oficina[]" id="oficina-<?= $curso -> oficina_curso->idoficina_curso; ?>"/>				
			<?php } ?>
			
				<div class="oficina" for="oficina-<?= $curso -> oficina_curso->idoficina_curso; ?>">
					<div class="painel">
						<div class="data-hora">
							<span class="data">
								<span><?= date_format($curso ->data_hora->inicio, 'd'); ?></span>/<span><?= date_format($curso -> data_hora->inicio, 'm'); ?></span>
							</span>
							<span class="hora"><?= date_format($curso -> data_hora->inicio, 'H:i'); ?></span>
						</div>
						<div class="descricao">
							<div class="txt-descricao">
								<p class="titulo"><?= $curso ->oficina_curso->descricao; ?></p>
								<em class="autor">Por: <strong><?= $curso -> oficina_curso->instrutor; ?></strong></em>
								<div class="local">Local: <?= $curso -> oficina_curso->local;?></div>
								<input type="checkbox" class="ck-detalhe" id="detalhe-oficina-<?= $curso -> oficina_curso->idoficina_curso; ?>">
								<span class="detalhes">
									<label for="detalhe-oficina-<?= $curso -> oficina_curso->idoficina_curso; ?>"><?= $this->Html->image('icon-down-arrow.svg', ['alt' => 'Veja mais']); ?></label>
									<div class="resumo"><strong>Resumo:</strong> <?= $curso->oficina_curso->resumo;?></div>
									<div class="observacao"><strong>Observações:</strong> <?= $curso->oficina_curso->observacao;?></div>
								</span>
							</div>
						</div>
						<div class="lb-seleciona">
						<?php if(time() > strtotime($evento->data_hora_fim_inscricao)){ //caso já tenha passado o período de inscrições?>
							<?= $this->Html->link('BAIXAR CERTIFICADO',['controller' => 'inscricoes','action' => 'gera_certificado',$usuario->token,$usuario->cpf,$curso ->oficina_curso-> idoficina_curso],['target' => '_blank','class'=>'bt_certificado_oficina']); ?>
						<?php }else{ ?>
							<a class="bt_desiste_oficina" href="#" data-oficina="<?= $curso -> oficina_curso->idoficina_curso; ?>">
								<?php echo(time() <= strtotime($curso -> data_hora->inicio)) ? "desistir" : "<span class='done'>ENCERRADO</span>"; ?>
							</a>
						<?php } ?>
						</div>
					</div>
				</div>
			</li>
				<?php } endforeach; ?>
		</ul>
		<ul class="oficinas list-items-box" id="anterior">
			<?php foreach ($cursos as $curso) : 
				if($curso -> oficina_curso->eventos_idevento < $evento->idevento){
			?>
			<li class="item">
			<?php if(time() <= strtotime($curso ->data_hora->inicio)){ ?>
				<input type="checkbox" value="<?= $curso -> oficina_curso->idoficina_curso; ?>" data-horario="<?= $curso -> data_hora->iddata_hora;?>" name="oficina[]" id="oficina-<?= $curso -> oficina_curso->idoficina_curso; ?>"/>				
			<?php } ?>
			
				<div class="oficina" for="oficina-<?= $curso -> oficina_curso->idoficina_curso; ?>">
					<div class="painel">
						<div class="data-hora">
							<span class="data">
								<span><?= date_format($curso -> data_hora->inicio, 'd'); ?></span>/<span><?= date_format($curso -> data_hora->inicio, 'm'); ?></span>
							</span>
							<span class="hora"><?= date_format($curso -> data_hora->inicio, 'H:i'); ?></span>
						</div>
						<div class="descricao">
							<div class="txt-descricao">
								<p class="titulo"><?= $curso ->oficina_curso->descricao; ?></p>
								<em class="autor">Por: <strong><?= $curso -> oficina_curso->instrutor; ?></strong></em>
								<div class="local">Local: <?= $curso -> oficina_curso->local;?></div>
								<span class="detalhes"><?= $curso -> oficina_curso->observacao;?></span>
							</div>
						</div>
						<div class="lb-seleciona">
								<?= $this->Html->link('BAIXAR CERTIFICADO',['controller' => 'inscricoes','action' => 'gera_certificado',$usuario->token,$usuario->cpf,$curso ->oficina_curso-> idoficina_curso],['target' => '_blank','class'=>'bt_certificado_oficina']); ?>
						</div>
					</div>
				</div>
			</li>
				<?php } endforeach; ?>
		</ul>
		
			</form>
	</div>
</section>
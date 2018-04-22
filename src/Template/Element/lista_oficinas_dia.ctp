<section id="lista-dia">
	<ul class="lista-dias lopt">
		<li><a href="#qua" class="active">09/08</a></li>
		<li><a href="#qui">10/08</a></li>
		<li><a href="#sex">11/08</a></li>
	</ul>
	<div class="painel-listas">
		<form id="form-oficinas">

		<ul class="list-items-box oficinas active" id="qua">
			<?php foreach ($cursos as $curso) : 
				if(date_format($curso -> data_hora->inicio, 'w') == 3){
			?>
			<li class="item">
			<?php if(time() <= strtotime($curso -> data_hora->inicio) && ($curso->vagas_restantes > 0)){ ?>
				<input class="ck" type="checkbox" value="<?= $curso -> idoficina_curso; ?>" data-horario="<?= $curso->data_hora->iddata_hora;?>" name="oficina[]" id="oficina-<?= $curso -> idoficina_curso; ?>"/>				
			<?php } ?>
			
				<div class="oficina" for="oficina-<?= $curso ->idoficina_curso; ?>">
					<div class="painel">
						<div class="data-hora">
							<span class="data">
								<span><?= date_format($curso -> data_hora->inicio, 'd'); ?></span>/<span><?= date_format($curso -> data_hora->inicio, 'm'); ?></span>
							</span>
							<span class="hora"><?= date_format($curso -> data_hora->inicio, 'H:i'); ?></span>
							<em class="vagas <?= ($curso->vagas_restantes > 0)?'':'lotado' ?>">
								<?php if($curso->vagas_restantes > 0) {
									echo $curso->vagas_restantes .' de ' . $curso->vagas_oferecidas . ' vagas';
								}else{
									echo 'LOTOU!';
									}?>
							</em>
						</div>
						<div class="descricao">
							<div class="txt-descricao">
								<p class="titulo">|<?= $curso ->tipo_oficina->descricao;?>| <?= $curso ->descricao; ?></p>
								<em class="autor">Por: <strong><?= $curso ->instrutor; ?></strong></em>
								<div class="local">Local: <?= $curso->local;?></div>
								<input type="checkbox" class="ck-detalhe" id="detalhe-oficina-<?= $curso -> idoficina_curso; ?>">
								<span class="detalhes">
									<label for="detalhe-oficina-<?= $curso -> idoficina_curso; ?>"><?= $this->Html->image('icon-down-arrow.svg', ['alt' => 'Veja mais']); ?></label>
									<div class="resumo"><strong>Resumo:</strong> <?= $curso->resumo;?></div>
									<div class="observacao"><strong>Observações:</strong> <?= $curso->observacao;?></div>
								</span>
							</div>
						</div>
						<?php if($curso->vagas_restantes > 0) { ?>
						<div class="lb-seleciona">
							<label class="bt_seleciona_oficina" for="oficina-<?= $curso ->idoficina_curso; ?>">
								<?php echo(time() <= strtotime($curso -> data_hora->inicio)) ? "<span class='vazio'></span>" : "<span class='done'>JÁ ROLOU</span>"; ?>
							</label>
						</div>
						<?php } ?>
					</div>
				</div>
			</li>
				<?php } endforeach; ?>
		</ul>
		<ul class="list-items-box oficinas" id="qui">
			<?php foreach ($cursos as $curso) : 
				if(date_format($curso -> data_hora->inicio, 'w') == 4){
			?>
			<li class="item">
			<?php if(time() <= strtotime($curso -> data_hora->inicio) && ($curso->vagas_restantes > 0)){ ?>
				<input class="ck" type="checkbox" value="<?= $curso -> idoficina_curso; ?>" data-horario="<?= $curso->data_hora->iddata_hora;?>" name="oficina[]" id="oficina-<?= $curso -> idoficina_curso; ?>"/>				
			<?php } ?>
			
				<div class="oficina" for="oficina-<?= $curso ->idoficina_curso; ?>">
					<div class="painel">
						<div class="data-hora">
							<span class="data">
								<span><?= date_format($curso -> data_hora->inicio, 'd'); ?></span>/<span><?= date_format($curso -> data_hora->inicio, 'm'); ?></span>
							</span>
							<span class="hora"><?= date_format($curso -> data_hora->inicio, 'H:i'); ?></span>
							<em class="vagas <?= ($curso->vagas_restantes > 0)?'':'lotado' ?>">
								<?php if($curso->vagas_restantes > 0) {
									echo $curso->vagas_restantes .' de ' . $curso->vagas_oferecidas . ' vagas';
								}else{
									echo 'LOTOU!';
									}?>
							</em>
						</div>
						<div class="descricao">
							<div class="txt-descricao">
								<p class="titulo">|<?= $curso ->tipo_oficina->descricao;?>| <?= $curso ->descricao; ?></p>
								<em class="autor">Por: <strong><?= $curso ->instrutor; ?></strong></em>
								<div class="local">Local: <?= $curso->local;?></div>
								<input type="checkbox" class="ck-detalhe" id="detalhe-oficina-<?= $curso -> idoficina_curso; ?>">
								<span class="detalhes">
									<label for="detalhe-oficina-<?= $curso -> idoficina_curso; ?>"><?= $this->Html->image('icon-down-arrow.svg', ['alt' => 'Veja mais']); ?></label>
									<div class="resumo"><strong>Resumo:</strong> <?= $curso->resumo;?></div>
									<div class="observacao"><strong>Observações:</strong> <?= $curso->observacao;?></div>
								</span>
							</div>
						</div>
						<?php if($curso->vagas_restantes > 0) { ?>
						<div class="lb-seleciona">
							<label class="bt_seleciona_oficina" for="oficina-<?= $curso ->idoficina_curso; ?>">
								<?php echo(time() <= strtotime($curso -> data_hora->inicio)) ? "<span class='vazio'></span>" : "<span class='done'>JÁ ROLOU</span>"; ?>
							</label>
						</div>
						<?php } ?>
					</div>
				</div>
			</li>
				<?php } endforeach; ?>
		</ul>
		<ul class="list-items-box oficinas" id="sex">
			<?php foreach ($cursos as $curso) : 
				if(date_format($curso -> data_hora->inicio, 'w') == 5){
			?>
			<li class="item">
			<?php if(time() <= strtotime($curso -> data_hora->inicio) && ($curso->vagas_restantes > 0)){ ?>
				<input class="ck" type="checkbox" value="<?= $curso -> idoficina_curso; ?>" data-horario="<?= $curso->data_hora->iddata_hora;?>" name="oficina[]" id="oficina-<?= $curso -> idoficina_curso; ?>"/>				
			<?php } ?>
			
				<div class="oficina" for="oficina-<?= $curso ->idoficina_curso; ?>">
					<div class="painel">
						<div class="data-hora">
							<span class="data">
								<span><?= date_format($curso -> data_hora->inicio, 'd'); ?></span>/<span><?= date_format($curso -> data_hora->inicio, 'm'); ?></span>
							</span>
							<span class="hora"><?= date_format($curso -> data_hora->inicio, 'H:i'); ?></span>
							<em class="vagas <?= ($curso->vagas_restantes > 0)?'':'lotado' ?>">
								<?php if($curso->vagas_restantes > 0) {
									echo $curso->vagas_restantes .' de ' . $curso->vagas_oferecidas . ' vagas';
								}else{
									echo 'LOTOU!';
									}?>
							</em>
						</div>
						<div class="descricao">
							<div class="txt-descricao">
								<p class="titulo">|<?= $curso ->tipo_oficina->descricao;?>| <?= $curso ->descricao; ?></p>
								<em class="autor">Por: <strong><?= $curso ->instrutor; ?></strong></em>
								<div class="local">Local: <?= $curso->local;?></div>
								<input type="checkbox" class="ck-detalhe" id="detalhe-oficina-<?= $curso -> idoficina_curso; ?>">
								<span class="detalhes">
									<label for="detalhe-oficina-<?= $curso -> idoficina_curso; ?>"><?= $this->Html->image('icon-down-arrow.svg', ['alt' => 'Veja mais']); ?></label>
									<div class="resumo"><strong>Resumo:</strong> <?= $curso->resumo;?></div>
									<div class="observacao"><strong>Observações:</strong> <?= $curso->observacao;?></div>
								</span>
							</div>
						</div>
						<?php if($curso->vagas_restantes > 0) { ?>
						<div class="lb-seleciona">
							<label class="bt_seleciona_oficina" for="oficina-<?= $curso ->idoficina_curso; ?>">
								<?php echo(time() <= strtotime($curso -> data_hora->inicio)) ? "<span class='vazio'></span>" : "<span class='done'>JÁ ROLOU</span>"; ?>
							</label>
						</div>
						<?php } ?>
					</div>
				</div>
			</li>
				<?php } endforeach; ?>
		</ul>
			</form>
	</div>
</section>
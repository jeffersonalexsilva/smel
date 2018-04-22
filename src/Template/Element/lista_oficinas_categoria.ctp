<section id="lista-dia">
	<ul class="lista-dias lopt">
		<li><a href="#qua" class="active">Quarta-feira</a></li>
		<li><a href="#qui">Quinta-feira</a></li>
		<li><a href="#sex">Sexta-feira</a></li>
	</ul>
	<div class="painel-listas">
		<form id="form-oficinas">
		<ul class="oficinas active" id="qua">
			<?php foreach ($cursos as $curso) : 
				if(date_format($curso -> data_hora->inicio, 'w') == 3){
			?>
			<li>
			<?php if(time() <= strtotime($curso -> data_hora->inicio)){ ?>
				<input type="checkbox" value="<?= $curso -> oficina_curso->idoficina_curso; ?>" data-horario="<?= $curso->data_hora->iddata_hora;?>" name="oficina[]" id="oficina-<?= $curso -> oficina_curso->idoficina_curso; ?>"/>				
			<?php } ?>
			
				<div class="oficina" for="oficina-<?= $curso ->idoficina_curso; ?>">
					<div class="painel">
						<div class="data-hora">
							<span class="data">
								<span><?= date_format($curso -> data_hora->inicio, 'd'); ?></span>/<span><?= date_format($curso -> data_hora->inicio, 'm'); ?></span>
							</span>
							<span class="hora"><?= date_format($curso -> data_hora->inicio, 'H:i'); ?></span>
						</div>
						<div class="descricao">
							<p>
								<?= $curso ->descricao; ?>
								<em class="autor">Por: <strong><?= $curso ->instrutor; ?></strong></em>
								<span class="detalhes"><?= $curso->observacao;?></span>
							</p>
						</div>
						<div class="lb-seleciona">
							<label class="bt_seleciona_oficina" for="oficina-<?= $curso ->idoficina_curso; ?>">
								<?php echo(time() <= strtotime($curso -> data_hora->inicio)) ? "selecionar" : "<span class='done'>ENCERRADO</span>"; ?>
							</label>
						</div>
					</div>
				</div>
			</li>
				<?php } endforeach; ?>
		</ul>
		<ul class="oficinas" id="qui">
			<?php foreach ($cursos as $curso) : 
				if(date_format($curso -> data_hora->inicio, 'w') == 4){
			?>
			<li>
			<?php if(time() <= strtotime($curso -> data_hora->inicio)){ ?>
				<input type="checkbox" value="<?= $curso -> oficina_curso->idoficina_curso; ?>" data-horario="<?= $curso->data_hora->iddata_hora;?>" name="oficina[]" id="oficina-<?= $curso -> oficina_curso->idoficina_curso; ?>"/>				
			<?php } ?>
			
				<div class="oficina" for="oficina-<?= $curso ->idoficina_curso; ?>">
					<div class="painel">
						<div class="data-hora">
							<span class="data">
								<span><?= date_format($curso -> data_hora->inicio, 'd'); ?></span>/<span><?= date_format($curso -> data_hora->inicio, 'm'); ?></span>
							</span>
							<span class="hora"><?= date_format($curso -> data_hora->inicio, 'H:i'); ?></span>
						</div>
						<div class="descricao">
							<p>
								<?= $curso ->descricao; ?>
								<em class="autor">Por: <strong><?= $curso ->instrutor; ?></strong></em>
								<span class="detalhes"><?= $curso->observacao;?></span>
							</p>
						</div>
						<div class="lb-seleciona">
							<label class="bt_seleciona_oficina" for="oficina-<?= $curso ->idoficina_curso; ?>">
								<?php echo(time() <= strtotime($curso -> data_hora->inicio)) ? "selecionar" : "<span class='done'>ENCERRADO</span>"; ?>
							</label>
						</div>
					</div>
				</div>
			</li>
				<?php } endforeach; ?>
		</ul>
		<ul class="oficinas" id="sex">
			<?php foreach ($cursos as $curso) : 
				if(date_format($curso -> data_hora->inicio, 'w') == 5){
			?>
			<li>
			<?php if(time() <= strtotime($curso -> data_hora->inicio)){ ?>
				<input type="checkbox" value="<?= $curso -> oficina_curso->idoficina_curso; ?>" data-horario="<?= $curso->data_hora->iddata_hora;?>" name="oficina[]" id="oficina-<?= $curso -> oficina_curso->idoficina_curso; ?>"/>				
			<?php } ?>
			
				<div class="oficina" for="oficina-<?= $curso ->idoficina_curso; ?>">
					<div class="painel">
						<div class="data-hora">
							<span class="data">
								<span><?= date_format($curso -> data_hora->inicio, 'd'); ?></span>/<span><?= date_format($curso -> data_hora->inicio, 'm'); ?></span>
							</span>
							<span class="hora"><?= date_format($curso -> data_hora->inicio, 'H:i'); ?></span>
						</div>
						<div class="descricao">
							<p>
								<?= $curso ->descricao; ?>
								<em class="autor">Por: <strong><?= $curso ->instrutor; ?></strong></em>
								<span class="detalhes"><?= $curso->observacao;?></span>
							</p>
						</div>
						<div class="lb-seleciona">
							<label class="bt_seleciona_oficina" for="oficina-<?= $curso ->idoficina_curso; ?>">
								<?php echo(time() <= strtotime($curso -> data_hora->inicio)) ? "selecionar" : "<span class='done'>ENCERRADO</span>"; ?>
							</label>
						</div>
					</div>
				</div>
			</li>
				<?php } endforeach; ?>
		</ul>
			</form>
	</div>
</section>
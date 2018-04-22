<section class="minhas-inscricoes" id="minhas-inscricoes">
	<?php if(isset($usuario) && !empty($cursos)){ ?>
	<section class="painel-abas">
	<label for="rd-aba-atual" class="lb-abas">Evento atual</label><label for="rd-aba-passados" class="lb-abas">Eventos anteriores</label>
		<input type="radio" name="rd-aba" id="rd-aba-atual" checked="true">
		<div id="aba-atual" class="aba">
			<form id="form-minhas-oficinas">
				<ul class="oficinas">
				<?php foreach ($cursos as $curso) : ?>
					<li>
							<?php if(time() <= strtotime($curso ->data_hora->inicio)){ ?>
								<input type="checkbox" value="<?= $curso ->oficina_curso-> idoficina_curso; ?>" name="oficina[]" id="minha-oficina-<?= $curso ->oficina_curso-> idoficina_curso; ?>"/>
							<?php } ?>
							<label class="oficina" for="minha-oficina-<?= $curso ->oficina_curso-> idoficina_curso; ?>">
								<div class="painel">
									<div class="descricao">
										<p>
											<?= $curso ->oficina_curso-> descricao; ?>
											<em class="autor">Por: <strong><?= $curso ->oficina_curso-> instrutor; ?></strong></em>
										</p>
										<?php if(time() >= strtotime($curso ->data_hora->inicio)){ ?>
										<?= $this->Html->link('BAIXAR CERTIFICADO',['controller' => 'inscricoes','action' => 'gera_certificado',$usuario->token,$usuario->cpf,$curso ->oficina_curso-> idoficina_curso],['target' => '_blank']); ?>
										<?php } ?>
									</div>
									<div class="data-hora">
										<span class="data">
											<?php echo(time() <= strtotime($curso -> data_hora->inicio)) ? "" : "<span class='done'>ENCERRADO</span>"; ?>
											<span><?= date_format($curso -> data_hora->inicio, 'd'); ?></span>
											-
											<span><?= date_format($curso -> data_hora->inicio, 'm'); ?></span>
										</span>
										<span class="hora"><?= date_format($curso -> data_hora->inicio, 'H:i'); ?></span>
										<?php if(time() <= strtotime($curso ->data_hora->inicio)){ ?>
											<a href="#" class="bt_desiste" data-value="<?= $curso ->oficina_curso-> idoficina_curso; ?>">Desistir</a>
										<?php } ?>
									</div>
								</div>
							</label>
					</li>
				<?php endforeach; ?>
				</ul>
				<footer class="rodape">
					<button id="bt_remove">Cancelar as oficinas selecionadas</button>
				</footer>
			</form>
		</div>
		<input type="radio" name="rd-aba" id="rd-aba-passados">
		<div id="aba-passados" class="aba">
			<ul class="oficinas passadas">
				<?php foreach ($cursos as $curso) : ?>
					<li>
						<label class="oficina" for="minha-oficina-<?= $curso ->oficina_curso-> idoficina_curso; ?>">
							<div class="painel">
								<div class="descricao">
									<p>
										<?= $curso ->oficina_curso-> descricao; ?>
										<em class="autor">Por: <strong><?= $curso ->oficina_curso-> instrutor; ?></strong></em>
									</p>
									<?= $this->Html->link('BAIXAR CERTIFICADO',['controller' => 'inscricoes','action' => 'gera_certificado',$usuario->token,$usuario->cpf,$curso ->oficina_curso-> idoficina_curso],['target' => '_blank']); ?>
								</div>
								<div class="data-hora">
									<span class="data">
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
		</div>
	</section>
	<?php }else{ ?>
		<span>Você não tem oficinas em seu perfil. Escolha uma na listagem acima e inscreva-se</span>
	<?php } ?>
	
</section>
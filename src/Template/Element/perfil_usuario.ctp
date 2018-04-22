<section class="perfil" id="perfil-usuario">
	<form id="form-minhas-oficinas">
	<?php if(isset($cursos) && !empty($cursos)){ ?>
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
								</p>
								<em class="autor">Por: <strong><?= $curso ->oficina_curso-> instrutor; ?></strong></em>
								<p><?= $this->Html->link('BAIXAR CERTIFICADO',['controller' => 'inscricoes','action' => 'gera_certificado',$usuario->token,$usuario->cpf,$curso ->oficina_curso-> idoficina_curso],['target' => '_blank']); ?></p>
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
			<button id="bt_remove">Cancelar as oficinas selecionadas</button>
		</footer>
	<?php }else{ ?>
		<span>Você não tem oficinas em seu perfil. Escolha uma na listagem acima e inscreva-se</span>
	<?php } ?>
	</form>
</section>
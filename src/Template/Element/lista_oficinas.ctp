<section id="atividades" class="col-md-12">
	<ul class="nav nav-tabs" id="dias" role="tablist">
		<?php foreach($datas as $key => $d) { ?>
			<li class="nav-item">
				<a href="#dia<?=date_format($d->inicio, 'w');?>" data-toggle="tab" id="tab-dia<?=date_format($d->inicio, 'w');?>" role="tab" aria-controls="dia<?=date_format($d->inicio, 'w');?>" aria-selected="<?= $key == 0?'true':'false';?>" class="nav-link <?= $key == 0?'active':'';?>">
				<?= date_format($d ->inicio, 'd/m'); ?>
			</a>
		</li>
		<?php } ?>
	</ul>
	<div class="tab-content lista-atividades" id="lista-atividades">
		<form id="form-oficinas">
			<?php foreach($datas as $key => $d) : //loop para varrer os dias do evento ?>
			<div class="tab-pane<?= $key == 0?' show active':'' ;?>" id="dia<?=date_format($d->inicio, 'w');?>" role="tabpanel" aria-labelledby="tab-dia<?=date_format($d->inicio, 'w');?>">
				<div class="card-deck">
				<?php foreach($oficinas as $oficina) : //varre a lista de datas e horas vinculadas a esse evento
						if(date_format($oficina->data_hora->inicio, 'w') == date_format($d->inicio, 'w')) { //se a oficina for desse dia, do loop superior ?>
					<div class="card item">
						<?php $ativo = (time() <= strtotime($oficina -> data_hora->inicio) && ($oficina->vagas_restantes > 0))?true:false;
							if($ativo){ ?>
							<input class="ck" type="checkbox" value="<?= $oficina -> idoficina_curso; ?>" data-horario="<?= $oficina->data_hora->iddata_hora;?>" name="oficina[]" id="oficina-<?= $oficina -> idoficina_curso; ?>"/>				
						<?php } ?>
						<div class="card-body oficina">
							<div class="data-hora <?= (time() > strtotime($oficina -> data_hora->inicio))?'end':''?>">
								<span class="hora"><?= date_format($oficina -> data_hora->inicio, 'H:i'); ?></span>
								<small class="vagas <?= ($oficina->vagas_restantes > 0)?'':'lotado' ?>">
									<?php if($oficina->vagas_restantes > 0) {
										echo $oficina->vagas_restantes .' de ' . $oficina->vagas_oferecidas . ' vagas';
									}else{
										echo 'LOTOU!';
										}?>
								</small>
							</div>
							<div class="card-text">
								<div class="txt-descricao">
									<p class="titulo"><?= $oficina ->titulo; ?></p>
									<em class="autor">Por: <strong><?= $oficina ->instrutor; ?></strong></em>
									<div class="local">Local: <?= $oficina->local;?></div>
								</div>
							</div>
							<?php if($oficina->vagas_restantes > 0) { ?>
								<div class="lb-seleciona">
									<?php if($ativo){ ?>
										<input type="checkbox" class="ck-detalhe" id="detalhe-oficina-<?= $oficina -> idoficina_curso; ?>">
									<?php }else{?>
										<label>Fechado</label>
									<?php }?>
								</div>
							<?php } ?>
						</div>
						<div class="card-footer detalhes">
							<?= $this->Html->link($this->Html->image('icon-down-arrow.svg',['alt'=>'Detalhes']),'#detalhe-'.$oficina->idoficina_curso,['data-toggle'=>'collapse','aria-expanded'=>'false','aria-controls'=>'detalhe-'.$oficina->idoficina_curso,'escape'=>false]);?>
							<div class="collapse foot-detail" id="detalhe-<?= $oficina->idoficina_curso;?>">
								<div class="resumo"><strong>Resumo:</strong> <?= $oficina->resumo;?></div>
								<div class="observacao"><strong>Observações:</strong> <?= $oficina->observacao;?></div>
							</div>
						</div>
					</div>
				<?php }else{ //caso não seja desse dia, do loop superior, passa para o próximo item
					continue;
					}
				endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>
		</form>
	</div>
</section>
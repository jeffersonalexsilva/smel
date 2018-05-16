<?php $this -> assign('title',($this->request->getSession()->check('evento')? $sessao->read('evento')->descricao :'SMEL'));?>
<div class="banner">
	<?= $this->element('side_banner_home',['eventos' => $eventos]);?>
</div>
<section class="row" id="home">
	<div class="col-12">
		<h1 class="title">Eventos ativos</h1>
		<ul class="card-deck events">
			<?php foreach($eventos as $evento):?>
			<li class="card shadow-sm event">
				<?= $this->Html->image('banners/events/banner-'.$evento->slug.'.jpg', ['alt' => $evento->titulo,'class'=>'card-img-top']); ?>
				<div class="card-body">
					<h5 class="card-title"><?= $evento->titulo ?></h5>
					<p class="card-text">
						<section class="detail-event">
							<span class="data-inicio">De:
								<strong>
									<?= date_format($evento -> data_hora_inicio, 'd/m/Y') ?>
								</strong>
							</span>
							<span class="data-fim">Até:
								<strong>
									<?= date_format($evento -> data_hora_fim, 'd/m/Y') ?>
								</strong>
							</span>
						</section>
					</p>
				</div>
				<div class="card-footer">
					<?= $this->Html->link('Ver a programação',['controller' => 'eventos','action' => 'e', $evento->slug]);?>
				</div>
			</li>
			<?php endforeach;?>
		</ul>
	</div>
</section>
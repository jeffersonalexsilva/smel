<?php $this -> assign('title',($this->request->session()->check('evento')? $sessao->read('evento')->descricao :'SMEL'));?>
<section id="list-eventos">
	<div class="center">
	<h1 class="title">Eventos ativos</h1>
		<ul class="events">
		<?php foreach($eventos as $evento):?>
			<li class="item-list">
				<article class="event-item">
        			<header class="head-item-event">
        				<figure>
        					<?= $this->Html->image('img-default-logo.jpg', ['alt' => 'img do evento em 250x100']); ?>
        					<figcaption><h3 class="sub-title"><?= $evento->descricao ?></h3></figcaption>
        				</figure>
        			</header>
        			<section class="detail-event">
        				<span class="data-inicio">De: <strong><?= date_format($evento -> data_hora_inicio, 'd/m/Y') ?></strong></span>
        				<span class="data-fim">Até: <strong><?= date_format($evento -> data_hora_fim, 'd/m/Y') ?></strong></span>
        			</section>
        			<footer class="event-item-footer">
        				<?= $this->Html->link('Ver a programação',['controller' => 'Evento','action' => 'e', $evento->slug],['class' => 'submit sec']);?>
        			</footer>
				</article>
    		</li>
		<?php endforeach;?>
		</ul>
	</div>
</section>

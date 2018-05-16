<?php $avisos = $this -> request ->getSession() -> read('avisos'); ?>
<aside id="side-avisos" class="side widget">
	<div class="avisos">
    	<h2 class="sub-title">Avisos</h2>
		<ul class="list-aviso">
		<?php if(!empty($avisos)){ 
			foreach($avisos as $aviso): ?>
			<li class="item-aviso">
				<span class="data-hora"><?= date_format($aviso -> created, 'd/m');?></span> | <h4 class="sub-title"><?= $aviso->titulo; ?></h4>
				<div class="texto-aviso"><?= $aviso->texto;?></div>
			</li>
			<?php endforeach; }else{ ?>
			<li class="item-none">Sem avisos para esse evento.</li>
			<?php } ?>
		</ul>
	</div>	
</aside>

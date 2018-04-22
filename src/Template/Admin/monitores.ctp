<?php $this -> assign('title', 'Monitores do Integra CAA'); ?>
<section id="painel-adm-monitores">
	<div class="central">
		<h1 class="title">Listagem de Monitores</h1>
		<div class="messages">
			<span class="content-msg"></span>
		</div>
		<div class="search-box">
		<form id="form-search-activity">
			<?php //montar array de perfis
				$myTemplates = ['nestingLabel' => '{{input}}<label{{attrs}}>{{text}}</label>','formGroup' => '{{label}}{{input}}'];
				// Prior to 3.4
				$this->Form->templates($myTemplates);
				$list_eventos = array();
				$list_eventos[0] = 'Todos';
				foreach ($eventos as $e) {
					$list_eventos[$e -> idevento] = $e -> descricao;
				}
			?>
			<div class="input text search">
				<label for="input-search">Busque por nome</label>
				<input type="text" id="input-search" placeholder="Digite o termo para buscar"><button class="submit active" id="buscar-atividade">buscar</button>
			</div>
			ou, por evento
			<div class="input radio status-oficina">
				<?= $this -> Form -> select('evento', $list_eventos); ?>
			</div>
		</form>
	</div>
		
		<div id="lista-monitores">
			<ul class="sub-list list-items-box">
			<?php foreach ($monitores as $monitor): ?>
				<li class="item" id="item-monitor-<?= $monitor ->usuario->idusuario; ?>">
					<div class="descricao">
						<h4 class="sub-title"><?= $monitor ->usuario->nome; ?></h4>
						<strong class="email">E-mail: <?= $monitor -> usuario-> email;?></strong>
						<em class="fone">Telefone: <?= $monitor -> usuario-> telefone;?></em><br />
						<span>Evento: <?= $monitor->evento->descricao; ?></span>
					</div>
				</li>
			<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>
<script>
$('#buscar-atividade').on('click',function(e){
	$(".sub-list li.item").css('display','none');
	if($('input#input-search').val() != ''){
		$(".sub-list li.item:contains("+ $('input#input-search').val() +")").css("display","block");
	}else{
		$(".sub-list li.item").css('display','block');
	}
	e.preventDefault();
});
</script>
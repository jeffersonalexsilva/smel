<?php $this -> assign('title', 'Listagem - Integra CAA'); ?>
<section id="listagem-inscritos">
	<div class="central">
		<h1 class="title">Listagem de inscritos</h1>
		<div class="messages">
			<span class="content-msg"></span>
		</div>
		<form id="form-lista-inscritos">
			<div class="input select">
				<em>Selecione uma oficina e clique em exibir listagem</em>
				<select name="oficinas" class="sel-oficinas">
					<?php foreach($cursos as $item) { ?>
					<option value="<?= $item ->idoficina_curso; ?>"><?= $item ->descricao; ?></option>
					<?php } ?>
				</select>
				<button id="bt_lista">Exibir lista</button><br><br>
				<div class="search-area">
					<em>Ou digite para buscar</em><br>
					<input type="text" class="search" id="search-box" />
					<div class="rest-search">
						<?php foreach($cursos as $item) { ?>
							<a href="#" class="option" data-value="<?= $item ->idoficina_curso; ?>"><?= $item ->descricao; ?></a>
						<?php } ?>
					</div>
				</div>
			</div>
		</form>
		
		<div id="cont-lista"></div>
	</div>
</section>
<script>
	$(window).on('click',function(e){
		$("a.option").css('display','none');
	});

	$('input#search-box').on('keyup',function(e){
		$("a.option").css('display','none');
		if($(this).val() != ''){
			$("a.option:contains("+ $(this).val() +")").css("display","block");
		}
		e.preventDefault();
	});
	
	$('a.option').on('click',function(e){
		lista_inscritos({oficinas:$(this).data('value')});
	});
</script>
<?php

//verifica a sessão
$sessao = $this -> request -> session();
$nomedosistema = $sessao->check('evento')? $sessao->read('evento')->descricao :'SMEL';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this -> Html -> charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>
        <?= $nomedosistema ?> | <?= $this -> fetch('title') ?>
    </title>
    <?= $this -> Html -> meta('icon') ?>
 	<?= $this -> Html -> css(['style','vendor/custombox.min','responsive']) ?>
	<?= $this->Html->css(['print'],['media' => 'print']); ?>
 	<?= $this->Html->script(['jquery-2.1.4.min','jquery.countdown.min','custombox.min.js','script']); ?>
    <?= $this -> fetch('meta') ?>
    <?= $this -> fetch('css') ?>
	   <script>
			$(document).ready(function(){
				$('#loader').removeClass('active');
			});
	   </script>
    <?= $this -> fetch('script') ?>
</head>
<body>
	<?= $this->element('header');?>
	<div id="loader" class="loader">
		<h4>Carregando...</h4>
		<figure class="loader">
			<?= $this->Html->image('loader.gif', ['alt' => 'Carregando o conteúdo']); ?>
		</figure>
	</div>
	<div id="page">
		<div id="page-content">
	        <div id="content">
				<?= $this -> fetch('content') ?>
	        </div>
		</div>
	</div>
	<?= $this->element('footer');?>
		
</body>
</html>

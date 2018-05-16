<?php

//verifica a sessão
$sessao = $this -> request -> getSession();
$nomedosistema = $sessao->check('evento')? $sessao->read('evento')->descricao :'SMEL';
?>
<!DOCTYPE html>
<html>
	<head>
		<?= $this -> Html -> charset() ?>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>
			<?= $nomedosistema ?> | <?= $this -> fetch('title') ?>
		</title>
		<?= $this -> Html -> meta('icon') ?>
		<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<?= $this -> Html -> css(['vendor/bootstrap/bootstrap.min','custom_style.min']) ?>
		<?= $this -> fetch('meta') ?>
		<?= $this -> fetch('css') ?>
	</head>
	<body class="fixed-sn white-skin">
	<?= $this->element('header');?>
		<div class="container">
		<div class="alerts-box"><?= $this->Flash->render('msg') ?></div>
			<div class="row">
				<?= $this -> fetch('content') ?>
			</div>
		</div>
		<?= $this->Html->script(['jquery-3.2.1.min','popper.min','bootstrap/bootstrap.bundle.min','bootstrap/bootstrap.min','jquery.mask.min','custom_script']); ?>
		<?= $this -> fetch('script') ?>
		<?= $this->element('footer');?>
		<script src="https://cdn.firebase.com/libs/firebaseui/2.5.1/firebaseui.js"></script>
		<link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/2.5.1/firebaseui.css" />
	</body>
</html>

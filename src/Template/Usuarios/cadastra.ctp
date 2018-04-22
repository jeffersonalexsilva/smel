<?php if($this->request->session()->check('usuario')){ ?>
	<script>
		window.location.href = "http://<?= $this -> request -> session()->read('evento_atual')->site_evento . '/inscricoes'; ?>"
	</script>
<?php } ?>
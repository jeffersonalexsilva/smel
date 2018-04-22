<?php if($this->request->session()->check('usuario')){ ?>
	<script>
		window.location.href = "<?= $url; ?>"
	</script>
<?php } ?>
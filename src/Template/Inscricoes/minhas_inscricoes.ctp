<section id="inscricao">
	<div class="central">
			<h1 class="title">Minhas Inscrições</h1>
			<div class="messages">
				<span class="content-msg"></span>
			</div>
		<section class="conteudo">
			<aside class="orientacoes">
				<p>
					<em>Aqui estão as oficinas que você está inscrito(a)</em>
					<noscript>
					 Para completa funcionalidade deste site é necessário habilitar o JavaScript.
					 Aqui estão as <a href="http://www.enable-javascript.com/pt/" target="_blank">
					 instruções de como habilitar o JavaScript no seu navegador</a>.
					</noscript>
				</p>
			</aside>
			<section id="lista-oficinas">
				<?= $this->element('lista_oficinas_usuario'); ?>
			</section>
		</section>
	</div>
</section>
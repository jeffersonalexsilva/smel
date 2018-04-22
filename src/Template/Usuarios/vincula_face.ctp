<?php 
if(!$this -> request -> session()->check('usuario')){ ?>
	<aside class="orientacoes central">
			<p>Seu login expirou. Entre novamente <?= $this->Html->link('clicando aqui',['controller' => 'inscricoes','action' => 'logout']); ?><br>
				Vai pro abraço que a festa é sua #seJogaNoIntegraCAA<br />
				<noscript>
				 Para completa funcionalidade deste site é necessário habilitar o JavaScript.
				 Aqui estão as <a href="http://www.enable-javascript.com/pt/" target="_blank">
				 instruções de como habilitar o JavaScript no seu navegador</a>.
				</noscript>
			</p>
		</aside>
<?php } ?>
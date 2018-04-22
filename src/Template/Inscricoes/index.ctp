<?php 
$evento = $this -> request -> session()-> read('evento_atual');
$this -> assign('title', $evento->descticao . ' | Inscrições');

if(($this -> request -> session()->check('usuario'))){
	$usuario = $this -> request -> session() -> read('usuario');
?>
<div id="inscricao" class="central">
		<h1 class="title">Lista de atividades</h1>
		<div class="messages">
			<span class="content-msg"></span>
		</div>
	<section class="conteudo">
		<?php if(strtotime($evento->data_hora_inicio_inscricao) > time() && !$usuario->admin){?>
				<div class="embreve">
						<p>Faltam apenas<br>
						<div id="contador"></div>
						para você se inscrever no <?= $evento->descricao ?>
						<?= $this->Html->link('Sair',['controller' => 'inscricoes','action' => 'logout']); ?></p>
					</div>
					<script>
						$("#contador").countdown("<?= date_format($evento->data_hora_inicio_inscricao,'Y/m/d H:i:s');?>", function(event) {
					      var $this = $(this).html(event.strftime(''
							    + '<span class="dia">%D</span> dias e<br>'
							    + '<span class="hora">%H</span>h :'
							    + '<span class="minuto">%M</span>:'
							    + '<span class="segundo">%S</span>'));
					});
					</script>
					<?php }else{ ?>
		<aside class="orientacoes">
			<p>
				<em>Observação: Você pode se inscrever em até 3(três) atividades, pois todas acontecem no mesmo horário, no período da tarde (esse semestre)</em>
				<noscript>
				 Para completa funcionalidade deste site é necessário habilitar o JavaScript.
				 Aqui estão as <a href="http://www.enable-javascript.com/pt/" target="_blank">
				 instruções de como habilitar o JavaScript no seu navegador</a>.
				</noscript>
			</p>
		</aside>
		<section id="lista-oficinas">
			<?= $this->element('lista_oficinas_dia',['cursos'=> $cursos,'usuario'=>$usuario]); ?>
		</section>
		<footer class="popup-inscreve">
			<button id="bt_inscreve" class="submit active">Finalizar minha inscrição</button>
		</footer>
		<?php } ?>
	</section>
</div>
<?php }else{ ?>
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
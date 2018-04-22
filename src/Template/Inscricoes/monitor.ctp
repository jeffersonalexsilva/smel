<?php 
$evento = $this -> request -> session()->read('evento_atual');
$usuario = $this -> request -> session()->read('usuario');
if(empty($usuario->telefone) || is_null($usuario->telefone)){ ?>
		<script>
		$(document).ready(function(){
			// Instantiate new modal
			var modal_perfil = new Custombox.modal({
			  content: {
			    effect: 'blur',
			    target: '#aviso-perfil'
			  }
			});
			jQuery('#bt_closemodal').on('click',function(e){
				Custombox.modal.close();
			});
			document.addEventListener('custombox:overlay:close', function() {
				window.location.href = "<?= $this->Url->build(["controller" => "CadastroUsuarios", "action" => "atualiza_cadastro"]);?>"
				});
			// Open
			modal_perfil.open();
		// alert('Preencha seu perfil com telefone para contato (de preferência um WhatsApp)');
		});
		</script>
		<div class="modal" id="aviso-perfil">
			<p>Preencha eu perfil com telefone para contato. Assim a organização poderá entrar em contato mais rapidamente.<br/>
				<em>Dê preferência ao número do WhatsApp.</em>
			</p>
			<a class="submit active" href="#" id="bt_closemodal">Completar meu perfil</a>
		</div>
	<?php } ?>
<section id="painel-monitor">
	<div class="central">
		<h1 class="title">Painel do Monitor</h1>
		<div class="messages">
			<span class="content-msg"></span>
		</div>
		<ul class="list-items-box">
			<li class="item">
				<div class="monitoria">
					<form id="form-autoinscricao-monitor">
						<p>Para ser monitor do Integra CAA e fazer parte desse time, 
						acompanhando os oficineiros e dando apoio à organização, basta clicar no botão abaixo.<br />
						A organização entrará em contato para mais informações sobre sua participação.
						<em>Para saber mais sobre as atibuições do monitor visite o <a href="http://www.integracaa.tk/faq" target="_blank">FAQ do Evento</a></em></p>
						<?= $this -> Form -> hidden('usuario',['value' => $usuario->idusuario]); ?>
						<?= $this -> Form -> hidden('evento',['value' => $evento->idevento]); ?>
						<?= $this -> Form -> button('Quero me inscrever',['class'=>'submit active','id'=>'bt_subscrever']); ?>
					</form>
				</div>
			</li>
			<li class="item">
				<div class="monitoria">
					<h3 class="sub-title">Indicar um monitor</h3>
					<form id="form-indicar-monitor">
						<p>Conhece alguém que gostaria de indicar para ser monitor? <br />
						Informe aqui e entraremos em contato.
						</p>
						<?= $this -> Form -> input('text', array('name' => 'cpf', "placeholder" => "CPF", 'label' => 'Seu CPF')); ?>
						<?= $this -> Form -> input('email', array('name' => 'email', "placeholder" => "Email", 'label' => 'Seu melhor e-mail')); ?>
						<?= $this -> Form -> button('Indicar monitor',['class'=>'submit','id'=>'bt_indica_monitor']); ?>
					</form>
					<div class="incicacao">
						<form id="form-subscrever">
						</form>
					</div>
				</div>
			</li>
			<li class="item">
			<div class="monitoria">
				<h4 class="sub-title">Minhas declarações de monitor</h4>
				<ul class="list-items-box sublist">
				<?php foreach($monitores as $monitor):?>
					<li class="item"><?= $monitor->evento->descricao; ?></li>
				<?php endforeach;?>
				</ul>
			</div>
			</li>
		</ul>
		<em class="info">Obs.: É importante que todos os monitores tenham cadastro no sistema, pois a declaração de participação será emito mais rapidamente e é automático.</em>
	</div>
</section>
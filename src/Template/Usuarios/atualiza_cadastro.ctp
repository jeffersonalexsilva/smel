<?php

$sessao = $this -> request -> session();
if($sessao->check('usuario')){
$usuario = $sessao->read('usuario');
	?>
<section id="perfil-usuario">
	<div class="central">
		<h1 class="title">Meu Perfil</h1>
		<div class="messages">
			<span class="content-msg"></span>
		</div>
		<form id="form-dados-usuario">
			<ul class="cad-list">
				<li>
					<ul class="cad-list-fields">
						<li id="clf-base">
							<div class="input text">
								<label for="text">Digite o seu nome completo</label>
								<input type="text" name="nome" placeholder="Nome Completo" id="text-nome" value="<?= $usuario->nome; ?>">
							</div>
							<?php  $myTemplates = ['nestingLabel' => '{{input}}<label{{attrs}}>{{text}}</label>','formGroup' => '{{label}}{{input}}'];
									 // Prior to 3.4
									 $this->Form->templates($myTemplates);?>
							<div class="input radio part">
								<?php $sexo_op = ['M' => 'Masculino', 'F'=>'Feminino']; ?>
								<?= $this -> Form -> radio('sexo', $sexo_op,['default'=>$usuario->sexo]); ?>
							</div>
							<div class="input text part">
								<label for="text">Seu CPF</label>
								<input type="text" name="cpf" placeholder="CPF" id="text-cpf" value="<?= $usuario->cpf; ?>">
							</div>
							<div class="input email part">
								<label for="email">Seu melhor e-mail</label>
								<input type="email" name="email" placeholder="Email" id="email" value="<?= $usuario->email; ?>">
							</div>
							<div class="input password part">
								<label for="password-usuario">Senha (clique para alterar)</label>
								<input type="password" disabled name="senha-usuario" placeholder="Senha/Código (DEIXE EM BRANCO CASO NÃO QUEIRA MUDAR)" id="password-usuario" value="">
							</div>
						</li>
						<!-- Perfil de visitante -->
						<li id="clf-mais-info-4">
							<?= $this -> Form -> input('text', array('name' => 'endereco','value'=>$usuario->endereco, "placeholder" => "Endereço (Rua e nº)", 'label' => 'Endereço (rua,nº e AP)')); ?>
							<div class="input text part">
								<label for="text-cidade">Cidade</label>
								<input type="text" name="cidade" placeholder="Cidade" id="text-cidade" value="<?= $usuario->cidade; ?>">
							</div>
							<div class="input select part">
								<?php $estados = array("AC" => "Acre", "AL" => "Alagoas", "AM" => "Amazonas", "AP" => "Amapá", "BA" => "Bahia", "CE" => "Ceará", "DF" => "Distrito Federal", "ES" => "Espírito Santo", "GO" => "Goiás", "MA" => "Maranhão", "MT" => "Mato Grosso", "MS" => "Mato Grosso do Sul", "MG" => "Minas Gerais", "PA" => "Pará", "PB" => "Paraíba", "PR" => "Paraná", "PE" => "Pernambuco", "PI" => "Piauí", "RJ" => "Rio de Janeiro", "RN" => "Rio Grande do Norte", "RO" => "Rondônia", "RS" => "Rio Grande do Sul", "RR" => "Roraima", "SC" => "Santa Catarina", "SE" => "Sergipe", "SP" => "São Paulo", "TO" => "Tocantins"); ?>
								<em>UF</em>
								<?= $this -> Form -> select('uf', $estados,['default'=>$usuario->uf]); ?>
							</div>
							<?= $this -> Form -> input('text', array('name' => 'telefone','value'=>$usuario->telefone, "placeholder" => "Celular(DDD+número)", 'label' => 'Celular(DDD+número)','class'=>'part')); ?>
							<?= $this -> Form -> button('Atualizar cadastro',['class'=>'submit active atualizar']); ?> | <a href="#" class="loginface submit" id="bt_vinculaface"><span class="txt">Vincular Facebook</span> <?= $this->Html->image("facebook.svg", ["alt" => "Facebook Login"]);?></a>
						<div id="status"></div>
						</li>
					</ul>
				</li>
			</ul>
		</form>
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
	</div>
</section>
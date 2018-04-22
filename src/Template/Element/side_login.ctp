<div id="login" class="central login">
	<fieldset>
	<center>
		<h1 class="title">Login</h1>
		<div class="messages">
			<span class="content-msg"></span>
		</div>
		<form id="form-login">
			<ul class="login-fields">
				<li><?= $this -> Form -> input('email', array('name' => 'email', "placeholder" => "Email", 'label' => 'E-mail')); ?></li>
				<li><?= $this -> Form -> input('password', array('name' => 'senha', "placeholder" => "Sua senha", 'label' => 'Senha')); ?></li>
				<li><?= $this -> Form -> button('Entrar',['class'=>'login active','id'=>'bt_login']); ?> ou <?= $this->Html->link('Cadastre-se',['controller' => 'CadastroUsuarios','action' => 'index'],['class'=>'cadastra']); ?>
				</li>
				<li>
					<ul class="options">
						<li><a href="#lose">Esqueci a senha</a></li>
						<li><a href="#" class="loginface" id="bt_loginface"><span class="txt">Entrar com</span> <?= $this->Html->image("facebook.svg", ["alt" => "facebook Login"]);?></a></li>
					</ul>
				</li>
			</ul>
		</form>
		</center>
	</fieldset>
</div>
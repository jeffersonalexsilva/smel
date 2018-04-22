<?php $this -> assign('title', ' Área do Usuário');?>
<div id="painel-login">
    <?= $this->element('side_avisos');?>
    <section class="painel-login">
        <div id="login" class="central login">
        	<fieldset>
        		<h1 class="title">Login</h1>
        		<div class="messages">
        			<span class="content-msg"></span>
        		</div>
        		<form id="form-login">
        			<ul class="login-fields">
        				<li><?= $this -> Form -> input('email', array('name' => 'email', "placeholder" => "Email", 'label' => 'E-mail')); ?></li>
        				<li><?= $this -> Form -> input('password', array('name' => 'senha', "placeholder" => "Sua senha", 'label' => 'Senha')); ?></li>
        				<li class="options"><?= $this -> Form -> button('Entrar',['class'=>'login active','id'=>'bt_login']); ?></li>
    					<li class="loose"><a href="#lose">Esqueci a senha</a></li>
        				<li class="options login">
    						<span class="txt">ou Entre com</span>
        					<ul class="alt-sociallogin">
        						<li><a href="#" class="loginface" id="bt_loginface">Facebook</a></li>
        						<li><a href="#" class="logingoogle" id="bt_logingoogle">Google</a></li>
        					</ul>
        				</li>
        			</ul>
        		</form>
        	</fieldset>
        </div>
		<div class="new-user">Novo aqui? <?= $this->Html->link('Cadastre-se',['controller' => 'Usuarios','action' => 'index'],['class'=>'cadastra']); ?></div>
    </section>
    <section class="area-lose-login">
        <div id="lose">
        	<a href="#login" class="close">X</a>
        	<fieldset>
        		<legend><span class="title">Recupere a sua senha aqui</span></legend>
        		<div class="messages lose">
        			<span class="content-msg"></span>
        		</div>
        		<form id="form-lose">
        			<ul class="login-fields">
        				<li><?= $this -> Form -> input('email', array('name'=>'email',"placeholder" => "Email", 'label' => 'Seu e-mail cadastrado','id'=>"email_lose")); ?></li>
        				<li><?= $this -> Form -> input('text', array('name'=>'cpf',"placeholder" => "CPF", 'label' => 'Seu CPF','id'=>'cpf_lose')); ?></li>
        				<li><?= $this -> Form -> button('Recuperar Senha',['class'=>'recupera_senha submit active']); ?> <a href="#login" class="submit">Fechar</a></li>
        			</ul>
        		</form>
        	</fieldset>
        </div>
    </section>
</div>
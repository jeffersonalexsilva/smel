<ul class="nav menu mr-auto">
	<li class="nav-item active">
		<?= $this->Html->link('Início','/',['class'=>'nav-link']); ?>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#">Sobre</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#">Contato</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#">Sobre</a>
	</li>
</ul>
<ul class="nav justify-content-end">
	<li class="nav-item">
		<?= $this->Html->link('Cadastrar',['controller' => 'Usuarios','action' => 'cadastrar'],['class'=>'nav-link']); ?>
	</li>
	<li class="nav-item dropdown">
		<a href="#" class="nav-link dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fa fa-user px-2"></i>Login
		</a>
		<div class="dropdown-menu py-0 dropdown-menu-right" aria-labelledby="dropdownMenuLink">
			<div class="card" id="login">
				<div class="card-body px-2 py-2">
					<h4 class="card-title">Área do Usário</h4>
					<div class="card-text">
						<?= $this->Form->create(null, ['url'=>['controller'=>'Usuarios','action'=>'login'],'class'=>'form-group px-2 py-2 my-0','id'=>'form-login']);?>
						<?php $myTemplates = ['inputContainer' => '<div class="form-group mb-1 {{type}}{{required}}">{{content}}</div>'];
						$this->Form->setTemplates($myTemplates);?>
							<?= $this -> Form -> control('email',array('type'=>'email',"placeholder" => "Email", 'label' => ['text'=>'E-mail','class'=>'my-0'],'class'=>'form-control')); ?>
							<?= $this -> Form -> control('senha',array('type'=>'password',"placeholder" => "Sua senha", 'label' => ['text'=>'Senha','class'=>'my-0'],'class'=>'form-control')); ?>
							<button class="btn btn-primary btn-sm">Entrar</button> <a href="#lose" class="btn btn-link"><small>Esqueci a senha</small></a>
						<?= $this->Form->end();?>
					</div>
					<div class="card-footer">
						<small class="text-center">ou entre com</small>
						<a href="#" class="btn btn-primary btn-block" id="bt_loginface"><i class="fa fa-facebook"></i> Facebook</a>
						<a href="#" class="btn btn-danger btn-block" id="bt_logingoogle"><i class="fa fa-google"></i> Google</a>
					</div>
				</div>
			</div>
		</div>
	</li>
</ul>
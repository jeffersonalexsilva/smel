<?php $this -> assign('title', 'Cadastro de Usuário');?>
	<div class="row justify-content-center">
		<div class="col-sm-12 col-md-10 col-lg-8">
			<?= $this->Form->create(null, ['url'=>['controller'=>'Usuarios','action'=>'cadastrar'],'type' => 'file','class'=>'form-group','id'=>'form-cadastro']);?>
			<?php $myTemplates = ['inputContainer' => '<div class="form-group mb-1 {{type}}{{required}}">{{content}}</div>'];
						$this->Form->setTemplates($myTemplates);?>
				<div class="form-row">
					<h3 class="col-sm-12">Cadastro de usuário</h3>
					<div class="form-group col-sm-6">
						<label for="nome">Seu nome</label>
						<input type="text" name="nome" placeholder="Nome Completo" class="form-control" required>
					</div>
					<div class="form-group col-sm-6">
						<label for="cpf">Seu CPF</label>
						<input type="text" name="cpf" placeholder="CPF" class="form-control" id="cpf" required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-12">
						<label for="cpf">Sexo</label>
						<div class="btn-group btn-group-toggle" data-toggle="buttons">
							<label class="btn btn-light">
								<input type="radio" value="M" name="sexo" id="m" autocomplete="off">Masculino
							</label>
							<label class="btn btn-light">
								<input type="radio" value="F" name="sexo" id="f" autocomplete="off">Feminino
							</label>
							<label class="btn btn-light">
								<input type="radio" value="N" name="sexo" id="n" autocomplete="off" >Não informar
							</label>
						</div>
					</div>
					<div class="form-group col-sm-6">
						<label for="email">Seu e-mail</label>
						<input type="email" id="email" name="email" placeholder="Seu melhor e-mail aqui" class="form-control">
					</div>
					<div class="form-group col-sm-6">
						<label for="email2">Repita seu e-mail</label>
						<input type="email" id="email2" name="email2" placeholder="Repita o e-mail aqui" class="form-control">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-6">
						<label for="senha">Digite uma senha</label>
						<input type="password" id="senha" name="senha" placeholder="Digite uma senha aqui" class="form-control">
					</div>
					<div class="form-group col-sm-6">
						<label for="senha2">Repita a senha</label>
						<input type="password" id="senha2" name="senha2" placeholder="Repita a senha aqui" class="form-control">
					</div>
				</div>
				<div class="form-row">
					<h3 class="col-sm-12">Perfil </h3>
					<?php //montar array de perfis
						$perfil_op = array();
						foreach ($perfis as $p) {
							$perfil_op[$p -> idperfil] = $p -> descricao;
						}
					?>
					<div class="btn-group btn-group-toggle col-sm-12" data-toggle="buttons">
						<?= $this -> Form -> radio('perfil', $perfil_op,['label'=>['class'=>'btn btn-light']]); ?>
					</div>
				</div>
				<div class="form-row">
					<div class="col-sm-12 py-4">
						<button class="btn btn-primary" type="submit">Cadastrar</button>
					</div>
				</div>
			<?= $this->Form->end();?>
		</div>
	</div>
</div>
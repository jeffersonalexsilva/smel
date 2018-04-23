<?php $this -> assign('title', 'Cadastro de Usuário');?>
<div class="row">
	<div id="cadastro" class="col-12 cadastro">
		<h1 class="title">Cadastro de usuário</h1>
		<div class="messages">
			<span class="content-msg"></span>
		</div>
		<div class="col-12">
			<?= $this->Form->create(null, ['url'=>['controller'=>'Usuarios','action'=>'cadastrar'],'type' => 'file','class'=>'form-group','id'=>'form-cadastro']);?>
				<div class="row">
					<h3 class="col-12">Dados básicos</h3>
					<div class="form-group col-6">
						<label for="nome">Seu nome</label>
						<input id="nome" name="nome" placeholder="Nome Completo" class="form-control">
					</div>
					<div class="form-group col-3">
						<label for="cpf">Seu nome</label>
						<input id="cpf" name="cpf" placeholder="CPF" class="form-control">
					</div>
					<div class="form-group col-3">
						<label for="cpf">Sexo</label>
						<div class="btn-group btn-group-toggle" data-toggle="buttons">
							<label class="btn btn-light">
								<input type="radio" value="M" name="sexo" id="m" autocomplete="off">Masculino
							</label>
							<label class="btn btn-light">
								<input type="radio" value="F" name="sexo" id="f" autocomplete="off">Feminino
							</label>
							<label class="btn btn-light">
								<input type="radio" value="N" name="sexo" id="n" autocomplete="off">Não informar
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-6">
						<label for="email">Seu e-mail</label>
						<input id="email" name="email" placeholder="Seu melhor e-mail aqui" class="form-control">
					</div>
					<div class="form-group col-6">
						<label for="email2">Repita seu e-mail</label>
						<input id="email2" name="email2" placeholder="Repita o e-mail aqui" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-6">
						<label for="senha">Digite uma senha</label>
						<input id="senha" name="senha" placeholder="Digite uma senha aqui" class="form-control">
					</div>
					<div class="form-group col-6">
						<label for="senha2">Repita a senha</label>
						<input id="senha2" name="senha2" placeholder="Repita a senha aqui" class="form-control">
					</div>
				</div>
				<div class="row">
								
					<h3>Perfil </h3>
								<em>Por favor, selecione uma das opções</em>
								<?php //montar array de perfis
									$perfil_op = array();
									foreach ($perfis as $p) {
										$perfil_op[$p -> idperfil] = $p -> descricao;
									}
								?>
								<div class="input radio">
									<?= $this -> Form -> radio('perfil', $perfil_op); ?>
								</div>
								<nav class="navigate-form">
									<a href="#clf-base" class="prev submit">Voltar</a>
									<a href="" class="next submit active" id="prox-perfil">Continuar</a>
								</nav>
							</li>
							<!-- Perfil de discente -->
							<li id="clf-mais-info-1">
								<h3>Sobre seu perfil 3/3</h3>
								<em>Informações complementares</em>
								<div class="input radio">
									<?php $tipograd_op = ['Graduacao' => 'Graduação', 'Pos-Graduacao'=>'Pós-graduação']; ?>
									<?= $this -> Form -> radio('tipo-grad', $tipograd_op); ?>
								</div>
								<?= $this -> Form -> input('text', array('name' => 'instituicao', "placeholder" => "Instituição", 'label' => false)); ?>
								<?= $this -> Form -> input('text', array('name' => 'curso-discente', "placeholder" => "Curso", 'label' => false)); ?>

								<div class="input select">
									<?php $ano_entrada_op = array_combine(range(2000, 2017), range(2000, 2017)); ?>
									<em>Ano de Entrada</em>
									<?= $this -> Form -> select('ano-entrada', $ano_entrada_op); ?>
								</div>
								<label>Período de ingresso</label>
								<div class="input radio">
									<?php $numero_entrada_op = ['1' => '1ª Entrada', '2'=>'2ª Entrada']; ?>
									<?= $this -> Form -> radio('numero-entrada', $numero_entrada_op); ?>
								</div>
								<div>
									<nav class="navigate-form">
									<a href="#clf-perfil" class="prev submit">Voltar</a>
									<?= $this -> Form -> button('Concluir cadastro',['class'=>'next submit active cadastrar-participante']); ?>
								</nav>

							</li>

							<!-- Perfil de docente -->
							<li id="clf-mais-info-2">
								<h3>Sobre seu perfil 3/3</h3>
								<em>Informações complementares</em>

								<?= $this -> Form -> input('text', array('name' => 'depto_nucleo', "placeholder" => "Departamento ou Núcleo", 'label' => false)); ?>
								<?= $this -> Form -> input('text', array('name' => 'curso-docente', "placeholder" => "Curso", 'label' => false)); ?>
								<?= $this -> Form -> input('text', array('name' => 'siape', "placeholder" => "SIAPE", 'label' => false)); ?>
								<div>
									<nav class="navigate-form">
									<a href="#clf-perfil" class="prev submit">Voltar</a>
									<?= $this -> Form -> button('Concluir cadastro',['class'=>'next submit active cadastrar-participante']); ?>
								</nav>
							</li>

							<!-- Perfil de técnico -->
							<li id="clf-mais-info-3">
								<h3>Sobre seu perfil 3/3</h3>
								<em>Informações complementares</em>

								<?= $this -> Form -> input('text', array('name' => 'setor', "placeholder" => "Setor", 'label' => false)); ?>
								<?= $this -> Form -> input('text', array('name' => 'funcao', "placeholder" => "Função", 'label' => false)); ?>
								<div>
									<nav class="navigate-form">
									<a href="#clf-perfil" class="prev">Voltar</a>
									<?= $this -> Form -> button('Concluir cadastro',['class'=>'next submit active cadastrar-participante']); ?>
								</nav>
							</li>

							<!-- Perfil de visitante -->
							<li id="clf-mais-info-4">
								<h3>Sobre seu perfil 3/3</h3>
								<em>Informações complementares</em>
								<?= $this -> Form -> input('text', array('name' => 'endereco', "placeholder" => "Endereço (Rua e nº)", 'label' => false)); ?>
								<?= $this -> Form -> input('text', array('name' => 'cidade', "placeholder" => "Cidade", 'label' => false)); ?>
								<div class="input select">
									<?php $estados = array("AC" => "Acre", "AL" => "Alagoas", "AM" => "Amazonas", "AP" => "Amapá", "BA" => "Bahia", "CE" => "Ceará", "DF" => "Distrito Federal", "ES" => "Espírito Santo", "GO" => "Goiás", "MA" => "Maranhão", "MT" => "Mato Grosso", "MS" => "Mato Grosso do Sul", "MG" => "Minas Gerais", "PA" => "Pará", "PB" => "Paraíba", "PR" => "Paraná", "PE" => "Pernambuco", "PI" => "Piauí", "RJ" => "Rio de Janeiro", "RN" => "Rio Grande do Norte", "RO" => "Rondônia", "RS" => "Rio Grande do Sul", "RR" => "Roraima", "SC" => "Santa Catarina", "SE" => "Sergipe", "SP" => "São Paulo", "TO" => "Tocantins"); ?>
									<em>UF</em>
									<?= $this -> Form -> select('uf', $estados,['default'=>'PE']); ?>
								</div>
								<?= $this -> Form -> input('text', array('name' => 'telefone', "placeholder" => "Celular(DDD+número)", 'label' => false)); ?>
								<?= $this -> Form -> input('text', array('name' => 'inst_origem', "placeholder" => "Instituição de origem", 'label' => false)); ?>
								<div>
									<nav class="navigate-form">
									<a href="#clf-perfil" class="prev submit">Voltar</a>
									<?= $this -> Form -> button('Concluir cadastro',['class'=>'next submit active cadastrar-participante']); ?>
								</nav>
							</li>
						</ul>
					</li>
				</ul>
				<?= $this->Form->end();?>
		</div>
	</div>
</div>
<?php $this -> assign('title', 'Cadastro de Usuário');
?>
<script>$('#container').addClass("cadastro");</script>
<div id="cadastro" class="central cadastro">
<h1 class="title">Cadastro de usuário</h1>
<div class="messages">
			<span class="content-msg"></span>
		</div>
	<fieldset>
		<form id="form-cadastro">
			<ul class="cad-list">
				<li>
					<ul class="cad-list-fields">
						<li id="clf-base">
							<h3>Dados básicos 1/3</h3>
							
							<?= $this -> Form -> input('text', array('name' => 'nome', 'placeholder' => "Nome Completo", 'label' => 'Digite o seu nome completo')); ?>
							<?php  $myTemplates = ['nestingLabel' => '{{input}}<label{{attrs}}>{{text}}</label>','formGroup' => '{{label}}{{input}}'];
									 // Prior to 3.4
									 $this->Form->templates($myTemplates);?>
							<div class="input radio">
								<?php $sexo_op = ['M' => 'Masculino', 'F'=>'Feminino']; ?>
								<?= $this -> Form -> radio('sexo', $sexo_op); ?>
							</div>
							<?= $this -> Form -> input('text', array('name' => 'cpf', "placeholder" => "CPF", 'label' => 'Seu CPF')); ?>
							<?= $this -> Form -> input('email', array('name' => 'email', "placeholder" => "Email", 'label' => 'Seu melhor e-mail')); ?>
							<?= $this -> Form -> input('password', array('name' => 'senha', "placeholder" => "Senha/Código", 'label' => 'Uma senha para acesso')); ?>
							<nav class="navigate-form">
								<a href="#clf-perfil" class="next submit active">Continuar</a>
							</nav>
						</li>
						<li id="clf-perfil">
							<h3>Perfil 2/3</h3>
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
		</form>
	</fieldset>
</div>
<script>
	$("input[name='perfil']").on('change', function(e) {
		$("a#prox-perfil").attr("href", '#clf-mais-info-' + $(this).val());
		e.preventDefault();
	}); 
</script>
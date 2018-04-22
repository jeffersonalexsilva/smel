<?php $this -> assign('title', 'Integra CAA - Recuperação de Senha'); ?>
<em><?= isset($msg)?$msg:''; ?></em>
<?php if(isset($usuario)){ ?>
<section id="painel-nova-senha">
	<div class="central">
		<h2 class="title">Cadastrar nova senha</h2>
			<div class="messages side">
				<span class="content-msg"></span>
			</div>
		<div>
			<form id="form-gera-senha">
				<ul class="cad-list">
					<li>
						<ul class="cad-list-fields">
							<li id="clf-base">
								<?= $this -> Form -> input('password', array('name' => 'senha','value'=>'', "placeholder" => "Senha/Código (DEIXE EM BRANCO CASO NÃO QUEIRA MUDAR)", 'label' => 'Senha (deixe em branco para caso não queira mudar')); ?>
								<?= $this -> Form -> hidden('idusuario', array('value'=>$usuario->idusuario)); ?>
							</li>
								<?= $this -> Form -> button('Atualizar cadastro',['class'=>'atualizar active','id'=>'bt_atualiza_senha']); ?>
							</li>
						</ul>
					</li>
				</ul>
			</form>
		</div>
	</div>
</section>
<?php } ?>
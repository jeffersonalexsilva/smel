<div class="user-box">
<?php 
$evento = $this -> request -> session()->read('evento_atual');
$primeiro_nome = explode(" ", $usuario->nome);
?>
	<div class="avatar">
		<figure class="avatar">
			<?= $this->Html->image(((!empty($usuario->local_avatar) && !is_null($usuario->local_avatar))?str_replace('img/','',$usuario->local_avatar):'logo-integracaa.png'), ['alt' => $usuario->nome,'id'=>'img-logo']); ?>
		</figure>
		<div class="info">
			<label class="nome-usuario"><?= $primeiro_nome[0] .' '.$primeiro_nome[1]; ?></label>| 
			<em class="perfil-usuario"><?= $usuario->perfi->descricao; ?></em>
		</div>
	</div>
</div>
<aside id="side-usuario" class="side widget">
	<nav id="menu-side-usuario" class="menu">
		<ul class="itens">     
			<li class="item"><?= $this->Html->link('Início',['controller' => 'inscricoes','action' => 'index']); ?></li>  			
			<li class="item"><?= $this->Html->link('Meu Perfil',['controller' => 'CadastroUsuarios','action' => 'atualiza_cadastro']); ?></li>  			
			<li class="item">
				<?= $this->Html->link('Minhas Inscrições',['controller' => 'inscricoes','action' => 'minhas_inscricoes']); ?>
			</li>
			<li class="item">
				<?= $this->Html->link('Lista de atividades',['controller' => 'inscricoes','action' => 'index']); ?>
			</li>
		<?php if((time() >= strtotime($evento->data_hora_inicio_monitoria) && time() <= strtotime($evento->data_hora_fim_monitoria)) || $usuario->admin == 1){?>
			<li><?= $this->Html->link('Quero ser monitor',['controller' => 'inscricoes','action' => 'monitor']); ?></li>
		<?php } ?>
			
		<?php if((time() >= strtotime($evento->data_hora_inicio_submissao) && time() <= strtotime($evento->data_hora_fim_submissao)) || $usuario->admin == 1){?>
			<li class="item">
				<?= $this->Html->link('Submissões',['controller' => 'inscricoes','action' => 'submissao']); ?>
			</li>
		<?php } ?>
		<?php if($usuario->admin == 1){ ?>
			<li class="item">
				<?= $this->Html->link('Painel Admin',['controller' => 'admin','action' => 'index']); ?>
			</li>
		<?php } ?>
			<li class="item">
				<?= $this->Html->link('Sair',['controller' => 'inscricoes','action' => 'logout']); ?>
			</li>
		</ul>
	</nav>
</aside>
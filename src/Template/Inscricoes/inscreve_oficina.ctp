<?php $this -> assign('title', 'Integra CAA 2016.1 - Submissão');
$sessao = $this -> request -> session();
$usuario = $sessao -> read('usuario');
//if(isset($usuario)){
?>
<div id="submissao-oficina">
	<section class="usuario">
		<aside>Olá, <span><?= $usuario -> nome; ?></span></aside>
		<div class="msg-status">Você tem <span><?= sizeof($usuario -> cursos) ?></span> atividades cadastradas</div>
	</section>
	<section class="conteudo">
		<aside class="orientacoes">
			<p>Para submeter sua oficina, preencha cuidadosamente o formulário abaixo e envie.<br />
            Você receberá uma notificação por e-mail, caso seja aceito.
				<noscript>
				 Para completa funcionalidade deste site é necessário habilitar o JavaScript.
				 Aqui estão as <a href="http://www.enable-javascript.com/pt/" target="_blank">
				 instruções de como habilitar o JavaScript no seu navegador</a>.
				</noscript>
			</p>
		</aside>
		<section id="submissao">
			<form id="form-submissao">
				<ul class="fields">
                    <li class="field">
                        <?= $this -> Form -> input('text', array('name' => 'titulo','size'=>'50', "placeholder" => "Título do Projeto/Oficina", 'label' => 'Título')); ?>
                    </li>
                     <li class="field">
                        <?= $this -> Form -> input('text', array('name' => 'telefone', "placeholder" => "Telefone(DDD+número)", 'label' => 'Telefone para contato')); ?>
                    </li>
                    <li class="field radio">
                        <?= $this -> Form -> input('text', array('name' => 'celular', "placeholder" => "Celular (opcional)", 'label' => 'Digite seu celular')); ?>
                        <label>É WhatsApp?
                        <?= $this -> Form -> checkbox('whatsapp',['text'=>'WhatsApp?','hiddenField' => false]); ?>
                        </label>
                    </li>
                    <li class="field">
                        <?= $this -> Form -> input('email', array('name' => 'email', "placeholder" => "Seu melhor e-mail aqui", 'label' => 'E-mail de contato')); ?>
                    </li>
                </ul>
				<footer class="rodape">
					<button id="bt_submete">Enviar proposta</button>
				</footer>
			</form>
		</section>
</div>
<?php //} ?>
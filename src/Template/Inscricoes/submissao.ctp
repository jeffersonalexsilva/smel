<?php $evento = $this -> request -> session()->read('evento_atual');
	$usuario = $this -> request -> session()->read('usuario');
	if(empty($usuario->telefone) || is_null($usuario->telefone)){ ?>
		<script>
		$(document).ready(function(){
			// Instantiate new modal
			var modal_perfil = new Custombox.modal({
			  content: {
			    effect: 'blur',
			    target: '#aviso-perfil'
			  }
			});
			jQuery('#bt_closemodal').on('click',function(e){
				Custombox.modal.close();
			});
			document.addEventListener('custombox:overlay:close', function() {
				window.location.href = "<?= $this->Url->build(["controller" => "CadastroUsuarios", "action" => "atualiza_cadastro"]);?>"
				});
			// Open
			modal_perfil.open();
		// alert('Preencha seu perfil com telefone para contato (de preferência um WhatsApp)');
		});
		</script>
		<div class="modal" id="aviso-perfil">
			<p>Preencha eu perfil com telefone para contato. Assim a organização poderá entrar em contato mais rapidamente.<br/>
				<em>Dê preferência ao número do WhatsApp.</em>
			</p>
			<a class="submit active" href="#" id="bt_closemodal">Completar meu perfil</a>
		</div>
	<?php }
	$semana = array(
			'Sun' => 'Domingo',
			'Mon' => 'Segunda-Feira',
			'Tue' => 'Terca-Feira',
			'Wed' => 'Quarta-Feira',
			'Thu' => 'Quinta-Feira',
			'Fri' => 'Sexta-Feira',
			'Sat' => 'Sábado'
	);
	$mes = array(
			'Jan' => 'Jan',
			'Feb' => 'Fev',
			'Mar' => 'Mar',
			'Apr' => 'Abr',
			'May' => 'Mai',
			'Jun' => 'Jun',
			'Jul' => 'Jul',
			'Aug' => 'Ago',
			'Nov' => 'Nov',
			'Sep' => 'Set',
			'Oct' => 'Out',
			'Dec' => 'Dez'
	);?>
<section id="painel-submissao">
	<h1 class="title"><?= ($usuario->admin == 1)?'Todas as ':'Minhas ' ?>Submissões</h1>
	<?php if($usuario->admin == 1){?>
	<div class="search-box">
		<form id="form-search-activity">
			<?php //montar array de perfis
				$myTemplates = ['nestingLabel' => '{{input}}<label{{attrs}}>{{text}}</label>','formGroup' => '{{label}}{{input}}'];
				// Prior to 3.4
				$this->Form->templates($myTemplates);
				$perfil_op = array();
				$perfil_op[0] = 'Todos';
				foreach ($status as $p) {
					$perfil_op[$p -> idstatus_oficinas] = $p -> descricao;
				}
			?>
			<div class="input text search">
				<label for="input-search">Busque por título</label>
				<input type="text" id="input-search" placeholder="Digite o termo para buscar"><button class="submit active" id="buscar-atividade">buscar</button>
			</div>
			ou, por status
			<div class="input radio status-oficina">
				<?= $this -> Form -> radio('status', $perfil_op); ?>
			</div>
		</form>
	</div>
	<?php } ?>
	<div class="messages">
		<span class="content-msg"></span>
	</div>
	<div class="submissoes">
		<ul class="sub-list list-items-box">
		<?php foreach ($cursos as $curso): ?>
			<li class="item" id="item-curso-<?= $curso ->idoficina_curso; ?>">
				<div class="descricao">
					<h5 class="sub-title"><?= $curso ->descricao; ?></h5>
					
					<div class="local-data">
						<span class="data-hora">Dia <?= date_format($curso -> data_hora->inicio, 'd/m/Y'); ?>, <?= date_format($curso -> data_hora->inicio, 'H:i'); ?> à <?= date_format($curso -> data_hora->final, 'H:i'); ?></span>
						<span class="local">Local: <?= empty($curso -> local)?'à definir':$curso -> local; ?></span>
						<span class="instrutor">Por: <?= $curso -> instrutor;?></span>
						<?php if($usuario->admin == 1){?>
						<strong class="email">E-mail: <?= $curso -> usuario-> email;?></strong>
						<em class="fone">Telefone: <?= $curso -> usuario-> telefone;?></em>
						<?php } ?>
					</div>
					<span class="status _<?= $curso -> status_oficina->idstatus_oficinas;?>"><?= $curso -> status_oficina->descricao;?> e <strong><?= ($curso -> realizada)?'Realizada':'Não realizada'; ?></strong></span>
				</div>
				<?php if($usuario->admin == 1){?>
				<div class="acao">
					<?= $this->Html->link($this->Html->image('icon-edit.svg', ['alt' => 'Editar','title'=>'Editar']),['controller' => 'Admin','action' => 'edita_atividade',$curso ->idoficina_curso],['id'=>"bt_edita_submissao-{$curso ->idoficina_curso}",'class'=>'edita_submissao','escape'=>false]); ?>
					<?= $this->Html->link($this->Html->image('icon-delete.svg', ['alt' => 'Excluir','title'=>'Excluir']),['controller' => 'Admin','action' => 'exclui_atividade',$curso ->idoficina_curso],['id'=>"bt_exclui_submissao-{$curso ->idoficina_curso}",'class'=>'exclui_submissao','escape'=>false]); ?>
				</div>
				<?php } 
				    foreach($curso->instrutores as $instrutor){
				        if($usuario->idusuario == $instrutor->usuarios_idusuario){
					       echo $this->Html->link($this->Html->image('icon-download.svg', ['alt' => 'Baixar Certificado','title'=>'Baixar Certificado']),['controller' => 'Inscricoes','action' => 'gera_certificado_org',$usuario->token,$usuario->cpf,$curso ->idoficina_curso,'I'],['id'=>"bt_baixa_certificado-{$curso ->idoficina_curso}",'class'=>'baixa_certificado','escape'=>false]);
					       break;
				        }
				    }
				?>
				
				
			</li>
		<?php endforeach; ?>
		</ul>
	</div>
<?php 
 if((time() >= strtotime($evento->data_hora_inicio_submissao) && time() <= strtotime($evento->data_hora_fim_submissao)) || $usuario->admin == 1){
?>
<a href="#submissao-oficinas" class="ico-add" title="Adicionar atividade">+</a>
<script>
	$('#buscar-atividade').on('click',function(e){
		$(".sub-list li.item").css('display','none');
		if($('input#input-search').val() != ''){
			$(".sub-list li.item:contains("+ $('input#input-search').val() +")").css("display","block");
		}else{
			$(".sub-list li.item").css('display','block');
		}
		e.preventDefault();
	});
</script>
</section>
<section id="submissao-oficinas" class="painel-add">
	<div class="central">
		<h2 class="title">Cadastro de atividades</h2>
			<div class="messages side">
				<span class="content-msg"></span>
			</div>
		<div>
			<form id="form-envia-oficina">
				<?= $this -> Form -> input('text', array('name' => 'titulo', 'placeholder' => "Título da oficina", 'label' => 'Titulo da oficina')); ?>
				<?= $this -> Form -> input('text', array('name' => 'instrutor', 'placeholder' => "Instrutor principal", 'label' => 'Instrutor principal','value'=>$usuario->nome)); ?>
				<?= $this -> Form -> hidden('cpf_instrutor_principal', array('value'=>$usuario->cpf)); ?>
				<div class="mais-instrutores">
					<h4>Tem mais instrutores?</h4>
						<div class="input part">
							<?= $this -> Form -> input('text', array('name' => 'cpf_instrutor', 'placeholder' => "CPF do Instrutor", 'label' => 'CPF do Instrutor *')); ?>
						</div>
						<button class="submit active" id="bt_busca_usuario">Buscar e Adicionar</button>
					<span class="obs info">* Somente números.</span>
					<span class="obs info">Obs.: Todos os instrutores precisam realizar o cadastro básico no sistema.</span>
					<fieldset>
						<legend>Outros Instrutores</legend>
						<ul class="tab-instrutores">
							<li><strong>Nome</strong></li>
						</ul>
					</fieldset>
				</div>
				<div class="input select part">
					<label>Tipo</label>
					<select name="tipo_oficina">
						<?php foreach($tipos as $item) { ?>
							<option value="<?= $item ->idtipo_oficina; ?>"><?= $item ->descricao; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="input text part">
					<label>Quantidade de vagas</label>
					<?= $this -> Form -> number('text', array('name' => 'vagas','label' => 'QT Vagas')); ?>
				</div>
				<div class="input select part">
					<label>Data e hora pretendida</label>
					<select name="data_hora">
						<?php foreach($datas as $item) { ?>
							<option value="<?= $item ->iddata_hora; ?>"><?= $semana[date_format($item ->inicio, 'D')] ?>, <?= date_format($item ->inicio, 'd'); ?> /<?= $mes[date_format($item ->inicio, 'M')]; ?> - das <?= date_format($item ->inicio, 'H:i'); ?> às <?= date_format($item ->final, 'H:i'); ?></option>
						<?php } ?>
					</select>
				</div>
				<?= $this -> Form -> input('text', array('name' => 'publico_alvo', 'placeholder' => "Público-alvo", 'label' => 'Público-alvo dessa atividade. Perfil esperado')); ?>
				<div class="input text part">
					<label>Resumo</label>
					<?= $this -> Form -> textarea('text', array('name' => 'resumo','placeholder' => 'Fale mais sobre essa atividade.','rows'=>3)); ?>
				</div>
				<div class="input text part">
					<label>Materiais</label>
					<?= $this -> Form -> textarea('text', array('name' => 'equipamento','placeholder' => 'Relacione os materiais e equipamentos que vai precisar.','rows'=>3)); ?>
				</div>
				<div class="input text">
					<label>Observações adicionais</label>
					<?= $this -> Form -> textarea('text', array('name' => 'observacao','placeholder' => 'Tem mais alguma coisa que queira dizer para o público, sobre a atividade? Descreva aqui','rows'=>3)); ?>
				</div>
					<?= $this -> Form -> hidden('evento',['value' => $evento->idevento]); ?>

				<button id="bt_submissao_atividade" class="submit active">Enviar</button>
				<a href="#right" class="submit">fechar</a>
			</form>
		</div>
	</div>
		<div class="modal" id="aviso-sucesso">
			<p>Massa! Agora sua atividade foi submetida para avaliação.<br>
				A Coordenação Setorial de Extensão e Cultura do CAA fará uma avaliação das atividades submetidas e, caso sua atividade seja aceita,
				ficará disponível no sistema para inscrição.<br>
				<strong>Atenção: Mantenha seu perfil atualizado (email e telefone) e verifique sua caixa de SPAM, pois entraremos em contato.</strong>
				<em>Para qualquer dúvida sobre a submissão, o evento, as inscrições e mais detalhes entre em contato com a Coordenação Setorial de Extensão e Cultura<br>
					<address>
						Coordenação Setorial de Extensão e Cultura<br>
						Bloco Administrativo CAA, 3º andar.<br>
						email: extensaosetorial.caa@gmail.com
					</address>
				</em>
			</p>
			 <a href="javascrpt:resetForm()" onclick="Custombox.modal.close();" class="demo-close submit active">OK</a>
		</div>
	<script>
			
			$('ul.tab-instrutores').on('click','.remove-instrutor',function(e){
				$(this).parent('li').remove();
				e.preventDefault();
			});
			function resetForm(){
				$('form').each (function(){
	  				  this.reset();
	  				  location.reload();
	        		});
			}
	</script>
</section>
<?php }else{ ?>
</section>
<?php } ?>
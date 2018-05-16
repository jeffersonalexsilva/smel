<?php
namespace App\Controller;

use Cake\Mailer\Email;

/**
 * Inscrições Controller
 */
class InscricoesController extends AppController {

	/**
	 * Index method
	 *
	 * @return void
	 */
	public function index() {
		//pega o usuário da sessão
		$usuario = $this -> request -> getSession()-> read('usuario');
		if(!is_null($usuario)){
			//busca as informações extras, dos cursos que já se matriculou
			$this -> loadModel('OficinaCursoHasUsuario');
			$query = $this -> OficinaCursoHasUsuario -> find('all', array('conditions' => array('OficinaCursoHasUsuario.usuario_idusuario' => $usuario->idusuario)));
			$query->contain(['DataHoras','OficinaCursos']);
			$cursos_usuario = $query->toArray();//cursos do usuário
			
			//array para buscar os cursos que o usuário ainda não se inscreveu
			$_cursos = [];
			foreach($cursos_usuario as $curso){
				array_push($_cursos, $curso->oficina_curso_idoficina_curso);
			}
			
			//captura os dados dos cursos disponíveis para esse usuário logado
			$this -> loadModel('OficinaCursos');
			if(!empty($_cursos)){
				$query = $this -> OficinaCursos -> find('all', array('conditions' => array('AND'=>array(
					//array('OficinaCursos.vagas_restantes > ' => '0'),
					array('OficinaCursos.eventos_idevento' => $evento->idevento),
					array('OficinaCursos.status_oficinas_idstatus_oficinas' => 1),
					array('NOT'=>array(
						array('OficinaCursos.idoficina_curso in' => $_cursos))
						)
					)
				)))->order(['DataHoras.inicio' => 'ASC']);
			}else{
				$query = $this -> OficinaCursos -> find('all', array('conditions' => array('AND'=>array(
					array('OficinaCursos.vagas_restantes > ' => '0'),
					array('OficinaCursos.eventos_idevento' => $evento->idevento),
					array('OficinaCursos.status_oficinas_idstatus_oficinas' => 1)
				)
				)))->order(['DataHoras.inicio' => 'ASC']);
			}
			$query->contain(['DataHoras','TipoOficinas','StatusOficinas']);
			$cursos_ativos = $query -> toArray();
			$this -> set('cursos', $cursos_ativos);
		}
	}
	
	public function minhasInscricoes(){
		//pega o usuário da sessão
		$usuario = $this -> request -> getSession()-> read('usuario');
		$evento = $this -> request -> getSession() -> read('evento_atual');
		
		//busca as informações extras, dos cursos que já se matriculou
		$this -> loadModel('OficinaCursoHasUsuario');
		$query = $this -> OficinaCursoHasUsuario -> find('all', array('conditions' => array('OficinaCursoHasUsuario.usuario_idusuario' => $usuario->idusuario)));
		$query->contain(['DataHoras','OficinaCursos']);
		$cursos_usuario = $query->toArray();//cursos do usuário
		$this -> set('cursos', $cursos_usuario);
	}
    
    public function inscreveOficina(){
        
    }
	
	public function listagem(){
		$this->viewBuilder ()->setLayout ( 'ajax' );
	}

	public function logout() {
		$sessao = $this -> request -> getSession();
		$sessao -> destroy();// Destrói
		$this -> redirect('/');
		// Redireciona o usuário
	}

	public function inscreve() {
		$this->viewBuilder ()->setLayout ( 'ajax' );
		$evento = $this -> request -> getSession()-> read('evento_atual');
		
		if ($this -> request -> is('post')) {
			try{
			$data = $this -> request -> getData();
			// print_r($data['oficina']);
			//pega o usuário da sessão
			$sessao = $this -> request -> getSession();
			$usuario = $sessao -> read('usuario');
			//verifica se ele pode se inscrever, devido a quantidade
			if ((sizeof($usuario -> cursos_atuais) + sizeof($data['oficina'])) > 6 || sizeof($data['oficina']) > 6) {
				echo 'error#Eita... você ultrapassou a quantidade de oficinas permitidas.';
			} else {
				//recuperando os models
				$this -> loadModel('OficinaCursoHasUsuario');
				$this -> loadModel('OficinaCursos');
				$query = $this -> OficinaCursos -> find('all', array('conditions' => array('OficinaCursos.idoficina_curso in' => $data['oficina'])));
				$query->contain(['DataHoras']);//pega as referências de data hora p/ usar na inscrição
				$cursos = $query -> toArray();
				$curso_ok = '<ul>';

				//nova entidade
				foreach ($cursos as $curso) {
					if($curso->vagas_restantes > 0){
					//Cria uma instância de OficinaCurso para salvar uma nova entrada
					$inscricao = $this -> OficinaCursoHasUsuario -> newEntity();
					//seta os dados que serão salvos
					$inscricao -> oficina_curso_idoficina_curso = $curso->idoficina_curso;
					$inscricao -> usuario_idusuario = $usuario -> idusuario;
					$inscricao->data_horas_iddata_hora = $curso->data_hora->iddata_hora;
					//caso consiga salvar essa inscrição no banco
					if ($this -> OficinaCursoHasUsuario -> save($inscricao)) {
						//varre os cursos para atualizar a quantidade de vagas
						//decrementa o valor de curso
						--$curso -> vagas_restantes;
						//salva o novo valor do curso
						if(!$this -> OficinaCursos -> save($curso)){
							echo 'error#Opa! Deu um erro aqui... estamos trabalhando para resolver isso.';
							break;
						}
					}else{
						echo 'error#Opa! Deu um erro aqui... estamos trabalhando para resolver isso.';
						break;
					}
					unset($inscricao);
					}else{
						echo 'error#A atividade: '.$curso->descricao.' não tem mais vagas.';
						continue;
					}
					$curso_ok .= "<li>{$curso->descricao}  | Data/Hora ".date_format($curso -> data_hora->inicio, 'd/m - H:i')."</li>";
				}
				echo 'success#Tudo pronto. Agora você é uma pessoa Integrada. Óh!';
				$curso_ok .= '</ul>';
				//CONFIRMAÇÃO VIA E-MAIL E SMS PARA O USUÁRIO
				
				$assunto = 'Sua Inscrição no '.$evento->descricao;
				$mensagem = 'Olá ' . $usuario -> nome . ', seu cadastro no '.$evento->descricao.' foi realizado com sucesso. <br />';
				$mensagem .= 'Você se inscreveu nas atividades:<br />';
				$mensagem .= $curso_ok . '<br />';
				//Envia esse e-mail para o usuário
				
				$mensagem .= 'Em caso de dúvida ou se precisar de ajuda, entre em contato com '.$evento->email_evento.'<br />';
				$mensagem .= '<br /><br />Att--<br /> Equipe da Coordenação<br />'. $evento->descricao.'<br />';
				$mensagem .= $evento->site_evento;
				$email = new Email('default');
				$email->setEmailFormat('html');
				$email->setFrom(['ola@integracaa.tk' => $evento->descricao]);
				$email->setReplyTo($evento->email_evento);
				$email->setTo($usuario -> email);
				$email->setSubject($assunto);
				$email->send($mensagem);
			}
		}catch(\Exception $e){
					echo "error#Ocorreu um problema: {$e->getMessage()}";
				}
		}
	}

	public function desisteOficina() {
		$this->viewBuilder ()->setLayout ( 'ajax' );
		if ($this -> request -> is('post')) {
			$data = $this -> request -> getData();
			
			//pega o usuário da sessão
			$sessao = $this -> request -> getSession();
			$usuario = $sessao -> read('usuario');

			//pega os cursos que o usuário possui
			$cursos = $usuario->cursos;
			
			//busca o model de OficinaCursosHasUsuario
			$this -> loadModel('OficinaCursoHasUsuario');
			$this -> loadModel('OficinaCursos' );
			$query_oc = $this -> OficinaCursos -> find();
			$cursos = $query_oc -> toArray();
			$ok = false;
			foreach($data['oficina'] as $idoficina){
				$query_ofhu = $this -> OficinaCursoHasUsuario ->query();
				$query_ofhu->delete();
				$query_ofhu->where(['oficina_curso_idoficina_curso'=>$data['oficina'],'usuario_idusuario'=>$usuario->idusuario]);
				if($query_ofhu->execute()){//executa a exclusão da atividade
					//laço que aumenta o número de vagas (libera a vaga)
					foreach($cursos as $curso){
						if($curso->idoficina_curso == $data['oficina']){
							++$curso->vagas_restantes;//incrementa, liberando a vaga
							if($this -> OficinaCursos ->save($curso)){
								break;
							}
						}
					}
				}else{
					$this -> set('msg', 'Opa! Deu um erro aqui... estamos trabalhando para resolver isso.'.$query_ofhu->errorInfo());
					break;
				}
				unset($query);
			}
			$this -> set('msg', 'Opa... Beijo e XAU para essa(s) oficina(s).');
		}
	}
	
	public function geraCertificado($token = null, $cpf = null, $idcurso = null){
		$evento = $this -> request -> getSession()-> read('evento_atual');
				$this->viewBuilder ()->setLayout ( 'ajax' );
				//recupera o usuário a ser cadastrado
				
				if(!is_null($token) && !is_null($cpf) && !is_null($idcurso)){
					//limpa o argumento TOKEN
					$novo = str_replace([".","[","]","-","(",")","select","delete","from","where","*"], "", $token);
					$token = trim($novo);//salva o token, sem qualquer ruído (sql inject, por exemplo)
					//Limpa o argumento CPF
					$novo = str_replace([".","[","]","-","(",")","select","delete","from","where","*"], "", $cpf);
					$cpf = trim($novo);
					//limpa o argumento IDCURSO
					$novo = str_replace([".","[","]","-","(",")","select","delete","from","where","*"], "", $idcurso);
					$idcurso = trim($novo);
					
					//busca o usuário
					$this -> loadModel('Usuarios');
					$query = $this->Usuarios->find();
					$query->where(['token'=>$token,'cpf'=>$cpf]);
					$user = $query->first();
					// debug($user);
					if(!empty($user)){//se encontrar o usuário
						
						//recupera o objeto de Inscrição para realizar a inscrição desse usuário
						$this -> loadModel('OficinaCursoHasUsuario');
						$query = $this -> OficinaCursoHasUsuario -> find('all', array('conditions' => array('OficinaCursoHasUsuario.usuario_idusuario' => $user->idusuario,'OficinaCursoHasUsuario.oficina_curso_idoficina_curso'=>$idcurso)));
						$query->contain(['DataHoras','OficinaCursos']);
						$curso = $query->first();
						
						$this -> loadModel('Eventos');
						$query = $this -> Eventos -> find('all', array('conditions' => array('Eventos.idevento' => $curso->oficina_curso->eventos_idevento)));
						$evento = $query->first();
						/*pega as coordenadas do certificado desse evento
						* Convenção:
						*	0 = tamanho
						*	1 = X
						*	2 = Y
						*/
						$coordenadas = explode(",", $evento->coordenadas_certificado);
						$nome_evento = explode(" ", $evento->descricao);
						$nome_evento = strtolower($nome_evento[0]);
						
						// debug($curso);
						// debug($evento);
						//verifica se obteve presença confirmada e se está inscrito na oficina selecionada
						if(!empty($curso) && $curso->presente){
							try{
								//gera o certificado
								$rImg = ImageCreateFromJPEG("img/tmp-bg-certificado-{$nome_evento}.jpg");
			 
								//Definir cor
								$cor = imagecolorallocate($rImg, 0, 0, 0);
								 
								//Escrever nome
								// imagestring($rImg,5,70,700,$usuario,$cor);
								
								// imagestring($rImg,5,70,755,$curso,$cor);
								//Nome do participante
								// imagettftext($rImg, 50, 0, 680, 1400, $cor, "css/gillsans.ttf",$user->nome);
								imagettftext($rImg, $coordenadas[0], 0.0, $coordenadas[1], $coordenadas[2], $cor, "css/gillsans.ttf",$user->nome);
								
								//nome do curso
								imagettftext($rImg, $coordenadas[3], 0.0, $coordenadas[4], $coordenadas[5], $cor, "css/gillsans.ttf",$curso->oficina_curso->descricao);
								
								//autenticação virtual
								imagettftext($rImg, $coordenadas[6], 0.0, $coordenadas[7], $coordenadas[8], $cor, "css/gillsans.ttf","AUTENTICAÇÃO\n [{$token}{$cpf}{$idcurso}]");
								 
								//Header e output
								header('Content-type: image/jpeg');
								imagejpeg($rImg,NULL,90);

							}catch(\Exception $e){
								echo "error#{$e->getMessage()}";
							}
						}else{
							echo "error#Ocorreu um erro. Parece que ou você não estava inscrito nessa atividade ou sua presença não foi confirmada.<br> Procure a Coordenação Setorial de Extensão para mais informações.";
						}
					}else{
						echo "error#Ocorreu um erro. Usuário não encontrado";
					}
				}		
	}
	/**
	 * Essa função gera o certificado de participação dos palestrantes e monitores do evento
	 * @param unknown $token
	 * @param unknown $cpf
	 * @param unknown $idcurso
	 * @param unknown $tipo I=Instrutor , M=Monitor 
	 */
	public function geraCertificadoOrg($token = null, $cpf = null, $idcurso = null,$tipo = null){
		//$evento = $this -> request -> getSession()-> read('evento_atual');
				$this->viewBuilder ()->setLayout ( 'ajax' );
				//recupera o usuário a ser cadastrado
				
				if(!is_null($token) && !is_null($cpf) && !is_null($idcurso)){
					//limpa o argumento TOKEN
					$novo = str_replace([".","[","]","-","(",")","select","delete","from","where","*"], "", $token);
					$token = trim($novo);//salva o token, sem qualquer ruído (sql inject, por exemplo)
					//Limpa o argumento CPF
					$novo = str_replace([".","[","]","-","(",")","select","delete","from","where","*"], "", $cpf);
					$cpf = trim($novo);
					//limpa o argumento IDCURSO
					$novo = str_replace([".","[","]","-","(",")","select","delete","from","where","*"], "", $idcurso);
					$idcurso = trim($novo);
					
					//busca o usuário
					$this -> loadModel('Usuarios');
					$query = $this->Usuarios->find();
					$query->where(['token'=>$token,'cpf'=>$cpf]);
					$user = $query->first();
					
					$atividade = null;
					$evento = null;
					$curso = null;
					if(!empty($user)){//se encontrar o usuário
						
						if($tipo == 'I'){ // Se Instrutor
							//Recupera a oficina que o usuário foi instrutor
							$this -> loadModel('InstrutoresOficinas');
							$query = $this -> InstrutoresOficinas -> find('all', 
							    array('conditions' => 
							        array('AND'=>
							            array('InstrutoresOficinas.usuarios_idusuario' => $user->idusuario,'InstrutoresOficinas.oficina_cursos_idoficina_curso'=>$idcurso))));
							$query->contain(['OficinaCursos']);
							$atividade = $query->first();	
							if($atividade->oficina_curso->realizada){//verifica se a oficina foi marcada como realizada
							    $curso = $atividade->oficina_curso;
    							$this -> loadModel('Eventos');
    							$query = $this -> Eventos -> find('all', array('conditions' => array('Eventos.idevento' => $atividade->oficina_curso->eventos_idevento)));
    							$evento = $query->first();
    							/*pega as coordenadas do certificado desse evento
    							* Convenção:
    							*	0 = tamanho
    							*	1 = X
    							*	2 = Y
    							*/
    							$coordenadas = explode(",", $evento->coordenadas_certificado);
    							$nome_evento = explode(" ", $evento->descricao);
    							$nome_evento = strtolower($nome_evento[0]);
    							
    							// debug($curso);
    							// debug($evento);
    							//verifica se obteve presença confirmada e se está inscrito na oficina selecionada
								try{
									//gera o certificado
									$rImg = ImageCreateFromJPEG("img/tmp-bg-certificado-instrutor-{$nome_evento}.jpg");
				 
									//Definir cor
									$cor = imagecolorallocate($rImg, 0, 0, 0);
									 
									//Escrever nome
									// imagestring($rImg,5,70,700,$usuario,$cor);
									
									// imagestring($rImg,5,70,755,$curso,$cor);
									//Nome do participante
									// imagettftext($rImg, 50, 0, 680, 1400, $cor, "css/gillsans.ttf",$user->nome);
									imagettftext($rImg, $coordenadas[0], 0.0, $coordenadas[1], $coordenadas[2], $cor, "css/gillsans.ttf",$user->nome);
									
									//nome do curso
									imagettftext($rImg, $coordenadas[3], 0.0, $coordenadas[4], $coordenadas[5], $cor, "css/gillsans.ttf",$curso->descricao);
									
									//autenticação virtual
									imagettftext($rImg, $coordenadas[6], 0.0, $coordenadas[7], $coordenadas[8], $cor, "css/gillsans.ttf","AUTENTICAÇÃO\n [{$token}{$cpf}{$idcurso}]");
									 
									//Header e output
									header('Content-type: image/jpeg');
									imagejpeg($rImg,NULL,90);
								/* 	ob_start();
									imagejpeg($rImg,NULL,90);
									$rawImageBytes = ob_get_clean();
									echo "<img src='data:image/jpeg;base64," . base64_encode( $rawImageBytes ) . "' />"; */
	
								}catch(\Exception $e){
									echo "error#{$e->getMessage()}";
								}
							
							}else{
								echo "error#OOps.. Parece que essa atividade ainda não foi confirmada como REALIZADA. Verifique com a coordenação, em caso de divergência.";
							}
						}else if ($tipo = 'M'){//Se Monitor
							
						}else{
							echo "error#Alguma coisa deu errado. Verifique o link e o caminho que clicou para chegar aqui.";
						}
					}else{
						echo "error#Ocorreu um erro. Usuário não encontrado";
					}
				}		
	}
	
	public function geraAvatar(){
		$this->viewBuilder ()->setLayout ( 'ajax' );
		if ($this -> request -> is('post')) {
			$data = $this -> request -> getData();
			//pega a foto que foi enviada
			$img_foto = $data['img-foto'];
			
			//pega o usuário da sessão
			$sessao = $this -> request -> getSession();
			$usuario = $sessao -> read('usuario');
			$this -> loadModel('Usuarios');//carrega o model de Usuários
			// debug($usuario);
			//gera o arquivo no servidor para ser manipulado
			$arquivo_final = 'img/foto-usuario/'. explode(" ", strtolower($usuario->nome))[0] . $usuario->cpf . '.'.explode(".", $img_foto['name'])[1];
			$usuario->local_avatar = $arquivo_final;
			
			//tenta enviar o arquivo e salvar o caminho no cadastro do usuário
			if(move_uploaded_file($img_foto['tmp_name'],$arquivo_final)){
				if($this -> Usuarios -> save($usuario)){
					
					// system("convert ".$arquivo_final." -geometry x550 ".$arquivo_final);
					system("convert ".$arquivo_final."  -resize 500x500^ -gravity center -crop 500x500+0+0 +repage ".$arquivo_final);
					
					$tipo_avatar = $data['op_avatar'];
					
					$template = imagecreatefrompng(($tipo_avatar == "rosa")?"img/bg-avatar-rosa.png":"img/bg-avatar-azul.png");
					$src = imagecreatefromjpeg($arquivo_final);
					
					list($img_bg_w, $img_bg_h) = getimagesize("img/bg-avatar-rosa.png" );
					list($img_foto_w, $img_foto_h) = getimagesize($arquivo_final);
					$out = imagecreatetruecolor($img_bg_w, $img_bg_h);
					// imagecopymerge($out, $src, 0, 0, 0, 0, $img_bg_w, $img_bg_h, 100);
					imagecopy($out, $src, 0, 0, 0, 0, $img_bg_w, $img_bg_h);
					
					// imagecopymerge($out, $template, 0, 0, 0, 0, $img_bg_w, $img_bg_h, 100);
					imagecopy($out, $template, 0, 0, 0, 0, $img_bg_w, $img_bg_h);
					if(!imagejpeg($out,$arquivo_final,100)){
						$this -> set('msg', "Ocorreu algum erro. Entre em contato com '.$evento->email_evento.' e informe seus dados para verificarmos, ou tente novamente mais tarde.");
					}else{
						$this -> set('msg', "Beleza... agora você será redirecionado para a sua página....");
					}
				}
			}else {
				echo "Oooops.. Houve algum erro. Tente novamente depois.";
			}
		}
	}
	
	public function submissao(){
		//pega o usuário da sessão e o evento atual
		$usuario = $this -> request -> getSession()-> read('usuario');
		$evento = $this -> request -> getSession()-> read('evento_atual');
		
		$this -> loadModel('OficinaCursos');
		$this -> loadModel('InstrutoresOficinas');
		$this -> loadModel('DataHoras');
		$this -> loadModel('TipoOficinas');
		$this -> loadModel('StatusOficinas');

		//carrega as Datas
		if($usuario->admin == 1){//caso seja admin do sistema, mostra todas as submissões desse evento atual			
			$query = $this -> DataHoras -> find('all');
		}else{
			$query = $this -> DataHoras -> find('all', array('conditions' => array('DataHoras.eventos_idevento' => $evento->idevento)));
		}
		$datas = $query -> toArray();

		//carrega os status
		$query = $this -> StatusOficinas -> find('all');
		$status = $query -> toArray();
		
		//carrega os Tipos
		$query = $this -> TipoOficinas -> find('all');
		$tipos = $query -> toArray();
		
		//captura os dados dos cursos disponíveis para esse usuário logado
		if($usuario->admin == 1){//caso seja admin do sistema, mostra todas as submissões desse evento atual			
			$query = $this -> OficinaCursos -> find('all');
		}else{
			$query = $this -> OficinaCursos -> find('all', array('conditions' => array('OficinaCursos.usuarios_idusuario' => $usuario->idusuario)));
		}
		$query->contain(['DataHoras','TipoOficinas','StatusOficinas','Usuarios','Instrutores']);
		$cursos_usuario = $query -> toArray();
		
		$this -> set('datas', $datas);
		$this -> set('tipos', $tipos);
		$this -> set('status', $status);
		$this -> set('cursos', $cursos_usuario);
	}
	
	public function monitor(){
		$usuario = $this -> request -> getSession()-> read('usuario');
		
		$this -> loadModel('MonitoresEventos');
		$query = $this->MonitoresEventos->find('all',array('conditions'=>array('MonitoresEventos.usuarios_idusuario'=>$usuario->idusuario)));
		$query->contain(['Usuarios','Eventos']);
		$monitores = $query->toArray();
		$this->set('monitores',$monitores);
	}

}
?>
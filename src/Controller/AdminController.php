<?php
namespace App\Controller;


/**
 * Inscrições Controller
 */
class AdminController extends AppController {
	/* public $paginate = [
			'limit' => 25,
			'order' => [
					'Evento.idevento' => 'asc'
			]
	];
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('Paginator');
	} */
	/**
	 * Index method
	 *
	 * @return void
	 */
	public function index() {
		

	}
	
	public function listagem(){
		$this -> loadModel('OficinaCursos' );
		$query = $this -> OficinaCursos -> find();
		$query->contain(['DataHoras','Eventos']);//pega as referências de data hora p/ usar na inscrição
		$cursos = $query -> toArray();
		// debug($cursos);
		$this -> set('cursos', $cursos);
	}
	public function monitores(){
		$this -> loadModel('MonitoresEventos' );
		$this -> loadModel('Eventos');
		$this -> loadModel('Usuarios');
		$query = $this -> MonitoresEventos -> find();
		$query->contain(['Usuarios','Eventos']);//pega as referências de data hora p/ usar na inscrição
		$query -> order(array('MonitoresEventos.created'=>'asc'));
		$monitores = $query -> toArray();
		$query = $this -> Eventos -> find('all');
		$eventos = $query -> toArray();
		// debug($cursos);
		$this -> set('monitores', $monitores);
		$this -> set('eventos', $eventos);
	}

	public function listaInscritosTurma() {
		$this->viewBuilder ()->setLayout ( 'ajax' );

		if ($this -> request -> is('post')) {
			$data = $this -> request -> getData();
			// header('Content-type: application/ms-excel');
			// header('Content-Disposition: attachment; filename=lista_curso_turma_' . $data['oficinas'] . 'xls');
	
			$this -> loadModel('OficinaCursoHasUsuario');

			$query = $this -> OficinaCursoHasUsuario -> find('all',array('order'=>array('Usuarios.nome'=>'asc')))
			->select(['Usuarios.idusuario','Usuarios.nome', 'Usuarios.cpf','Usuarios.email','OficinaCursos.idoficina_curso','OficinaCursos.descricao','OficinaCursos.instrutor','OficinaCursos.vagas_oferecidas','OficinaCursoHasUsuario.presente','OficinaCursoHasUsuario.data_horas_iddata_hora'])
			->where(['oficina_curso_idoficina_curso' => $data['oficinas']]);
			$query->innerJoin(
				['Usuarios' => 'usuarios'],
				['Usuarios.idusuario = usuario_idusuario']);
			$query->leftJoin(
				['OficinaCursos' => 'oficina_cursos'],
				['OficinaCursos.idoficina_curso = oficina_curso_idoficina_curso']);
			$query->leftJoin(
				['DataHoras' => 'data_horas'],
				['DataHoras.iddata_hora = data_horas_iddata_hora']);
			$this -> set('lista',$query->toArray());	
			// debug($query->toArray());
		}else{
			die("Erro, Página não encontrada");
		}
	}
	
	public function marcaPresenca(){
		$this->viewBuilder ()->setLayout ( 'ajax' );

		if ($this -> request -> is('post')) {
			$data = $this -> request -> getData();
			// print_r($data);
			if(!empty($data)){
				$this -> loadModel('OficinaCursoHasUsuario');
				$curso = explode(",",$data['inscritos'][0]);
				$curso = $curso[1];
				$usuarios = array();
				//agrupa os usuários selecionados
				foreach($data['inscritos'] as $item){
					$i = explode(",",strval($item));
					array_push($usuarios,$i[0]);
				}
				//busca os usuários que foram marcados
				$query = $this -> OficinaCursoHasUsuario -> find('all', array('conditions' => array('OficinaCursoHasUsuario.usuario_idusuario in' => $usuarios)));
				$query->where(['oficina_curso_idoficina_curso' => $curso]);
				$res = $query -> toArray();
				//salva as presenças dos que foram selecionados
				foreach($res as $rest){
					//cria uma entidade para atualizar os dados
					$u = $this -> OficinaCursoHasUsuario ->newEntity();
					$u->usuario_idusuario = $rest->usuario_idusuario;
					$u->oficina_curso_idoficina_curso = $rest->oficina_curso_idoficina_curso;
					$u->data_horas_iddata_hora = $rest->data_horas_iddata_hora;
					$u->presente = true;
					// echo "foi para " . $u->usuario_idusuario;
					if(!$this -> OficinaCursoHasUsuario -> save($u)){
						echo 'error#Opa! Deu um erro aqui... estamos trabalhando para resolver isso.';
						break;
					}
					
				}
				$query = $this -> OficinaCursoHasUsuario -> find('all', array('conditions' => array('OficinaCursoHasUsuario.usuario_idusuario not in' => $usuarios)));
				$query->where(['oficina_curso_idoficina_curso' => $curso]);
				$res = $query -> toArray();
				// print_r($res);
				foreach($res as $rest){
					//cria uma entidade para atualizar os dados
					$u = $this -> OficinaCursoHasUsuario ->newEntity();
					$u->usuario_idusuario = $rest->usuario_idusuario;
					$u->oficina_curso_idoficina_curso = $rest->oficina_curso_idoficina_curso;
					$u->data_horas_iddata_hora = $rest->data_horas_iddata_hora;
					$u->presente = false;
					if(!$this -> OficinaCursoHasUsuario -> save($u)){
						echo 'error#Opa! Deu um erro aqui... estamos trabalhando para resolver isso.';
						break;
					}
				}
				echo 'success#Cadastros atualizados com sucesso!';
				// debug($res);	
			}else{
				echo 'error#Você precisa selecionar algum inscrito para marcar presença';
			}
		}
	}
	
	public function addParticipante(){
		$this->viewBuilder ()->setLayout ( 'ajax' );

		if ($this -> request -> is('post')) {
			$data = $this -> request -> getData();
			//recupera o usuário a ser cadastrado
			$this -> loadModel('Usuarios');
			$query = $this->Usuarios->find();
			$query->where(['cpf'=>$data['cpf']]);
			$user = $query->first();
			// debug($user);
			if(!empty($user)){//se encontrar o usuário
				//recupera o objeto de Inscrição para realizar a inscrição desse usuário
				$this -> loadModel('OficinaCursoHasUsuario');				
				$u = $this -> OficinaCursoHasUsuario ->newEntity();//cria um objeto para salvar
				$u->usuario_idusuario = $user->idusuario;
				$u->oficina_curso_idoficina_curso = $data['idcurso'];
				$u->data_horas_iddata_hora = $data['idhorario'];
				$u->presente = true;
				if(!$this -> OficinaCursoHasUsuario -> save($u)){
					$this -> set('msg', 'Opa! Deu um erro aqui... estamos trabalhando para resolver isso.');
				}else{
					$this -> set('msg', 'Cadastro efetuado com sucesso. Gere');
				}
			}else{
				$this -> set('msg', 'Usuário não encontrado');
			}
		}
	}
	
	public function enviaCertificados(){
		$this->viewBuilder ()->setLayout ( 'ajax' );

		if ($this -> request -> is('post')) {
			$data = $this -> request -> getData();
			$this -> loadModel('OficinaCursoHasUsuario');
			$query = $this -> OficinaCursoHasUsuario -> find('all',array('order'=>array('Usuarios.nome'=>'asc')))
			->select(['Usuarios.idusuario','Usuarios.nome', 'Usuarios.cpf','Usuarios.email','OficinaCursos.idoficina_curso','OficinaCursos.descricao','OficinaCursos.instrutor','OficinaCursos.vagas_oferecidas','OficinaCursoHasUsuario.presente','OficinaCursoHasUsuario.data_horas_iddata_hora'])
			->where(['oficina_curso_idoficina_curso' => $data['oficinas']]);
			$query->innerJoin(
				['Usuarios' => 'usuarios'],
				['Usuarios.idusuario = usuario_idusuario']);
			$query->leftJoin(
				['OficinaCursos' => 'oficina_cursos'],
				['OficinaCursos.idoficina_curso = oficina_curso_idoficina_curso']);
			$this -> set('lista',$query->toArray());	
			// debug($query->toArray());
			//Carregar imagem
			
			
		}else{
			die("Erro, Página não encontrada");
		}
	}
	
	public function geraCertificado($token, $idcurso){
		$this->viewBuilder ()->setLayout ( 'ajax' );
		$rImg = ImageCreateFromJPEG("img/tmp-bg-certificado.jpg");
		 
		//Definir cor
		$cor = imagecolorallocate($rImg, 0, 0, 0);
		 
		//Escrever nome
		// imagestring($rImg,5,70,700,$usuario,$cor);
		
		// imagestring($rImg,5,70,755,$curso,$cor);
		//Nome do participante
		imagettftext($rImg, 50, 0, 680, 1400, $cor, "css/gillsans.ttf",$token);
		//nome do curso
		imagettftext($rImg, 20, 0, 460, 1570, $cor, "css/gillsans.ttf",$idcurso);
		
		//autenticação virtual
		imagettftext($rImg, 20, 0, 425, 2280, $cor, "css/gillsans.ttf","AUTENTICAÇÃO: [{$token}{$idcurso}]");
		 
		//Header e output
		header('Content-type: image/jpeg');
		if(!imagejpeg($rImg,NULL,100)){
			echo "error#Ocorreu algum erro. Entre em contato com ola@integracaa.com.br e informe seus dados para verificarmos, ou tente novamente mais tarde.";
		}
	}
	
	public function cadastraAtividade(){
		//captura os dados dos cursos disponíveis para esse usuário logado
		$this -> loadModel('DataHoras');
		$this -> loadModel('TipoOficinas');
		$this -> loadModel('OficinaCursos');
		$this -> loadModel('Eventos');
		//carrega as Datas
		$query = $this -> DataHoras -> find('all');
		$datas = $query -> toArray();
		
		//carrega os Tipos
		$query = $this -> TipoOficinas -> find('all');
		$tipos = $query -> toArray();
		
		//carrega os Eventos
		$query = $this -> Eventos -> find('all');
		$eventos = $query -> toArray();
		
		$this -> set('datas', $datas);
		$this -> set('tipos', $tipos);
		$this -> set('eventos', $eventos);
	}
	
	public function cad(){
		$this->viewBuilder ()->setLayout ( 'ajax' );
		
		if ($this -> request -> is('post')) {
			$data = $this -> request -> getData();
			$this -> loadModel('OficinaCursos');
			$oficina = $this -> OficinaCursos -> newEntity();
			$oficina->descricao = $data['titulo'];
			$oficina->instrutor = $data['instrutor'];
			$oficina->vagas_oferecidas = $data['vagas'];
			$oficina->vagas_restantes = $data['vagas'];
			$oficina->observacao = $data['observacao'];
			$oficina->local = $data['local'];
			$oficina->data_hora_iddata_hora = $data['data_hora'];
			$oficina->tipo_oficina_idtipo_oficina = $data['tipo_oficina'];
			$oficina->continua = $data['continua'];
			$oficina->eventos_idevento = $data['evento'];
			$oficina->dependente = null;
			if ($this -> OficinaCursos -> save($oficina)) {
				$this -> set('msg', 'Oficina cadastrada com sucesso');
			}
		}
	}
	
	/* Páginas doas configurações do evento */
	public function eventos(){
		$this -> loadModel('Eventos');
		$query = $this -> Eventos -> find('all');
		$eventos = $query -> toArray();
		$this -> set('eventos',$eventos);
	}
	
	public function dataHora(){
		$this -> loadModel('DataHoras');
		$query = $this -> DataHoras -> find('all');
		$query->contain(['Eventos']);
		$datas = $query -> toArray();
		$this -> set('horarios',$datas);		
	}
	
	public function addDataHora(){
		$this->viewBuilder ()->setLayout ( 'ajax' );
		$this -> loadModel('DataHoras');
		$evento = $this -> request -> getSession()-> read('evento_atual');
		$mes_ano_evento = date('Y-m', strtotime($evento->data_hora_inicio_inscricao));

		if ($this -> request -> is('post')) {
			$data = $this -> request -> getData();
			try{
				$data_hora = $this -> DataHoras -> newEntity();
				$data_hora -> inicio = $mes_ano_evento . '-'. $data['dia-atividade'].' '.$data['hora-inicio'].':'.$data['minuto-inicio'].':00';
				$data_hora -> final = $mes_ano_evento . '-'. $data['dia-atividade'].' '. (intval($data['hora-inicio']) + intval($data['duracao'])).':'.$data['minuto-inicio'].':00';
				$data_hora -> eventos_idevento = $evento->idevento;
				//salva o usário
				$this -> DataHoras -> save($data_hora);
				echo 'success#Horário cadastrado com sucesso';
			}catch(\Exception $e){
				echo "error#Ocorreu um problema: {$e->getMessage()}";
			}
		}
	}
	
	
	public function tipoAtividade(){
		
	}
	public function editaAtividade($idatividade = null){
		//pega o usuário da sessão
		$usuario = $this -> request -> getSession()-> read('usuario');
		$evento = $this -> request -> getSession()-> read('evento_atual');
		$this -> loadModel('OficinaCursos');
		if ($this -> request -> is('get')) {
			$id = str_replace([".","[","]","-","(",")","select","delete","from","where","*"], "", $idatividade);
			$curso = $this->OficinaCursos->get($id,['contain'=> ['DataHoras','TipoOficinas','StatusOficinas']]);
			$this -> loadModel('DataHoras');
			$this -> loadModel('TipoOficinas');
			$this -> loadModel('StatusOficinas');
			 
			//carrega as Datas
			$query = $this -> StatusOficinas -> find('all');
			$status_oficinas = $query -> toArray();
			 
			//carrega as Datas
			$query = $this -> DataHoras -> find('all', array('conditions' => array('DataHoras.eventos_idevento' => $evento->idevento)));
			$datas = $query -> toArray();
			 
			//carrega os Tipos
			$query = $this -> TipoOficinas -> find('all');
			$tipos = $query -> toArray();
			$this -> set('status', $status_oficinas);
			$this -> set('datas', $datas);
			$this -> set('tipos', $tipos);
			$this->set('curso',$curso);
		}
	}
	
	public function editAtividade(){
		$this->viewBuilder ()->setLayout( 'ajax' );
		//pega o usuário da sessão
		$usuario = $this -> request -> getSession()-> read('usuario');
		$evento = $this -> request -> getSession()-> read('evento_atual');
		$this -> loadModel('OficinaCursos');
		if($this -> request -> is('post')){
			$data = $this -> request -> getData();
			$oficina = $this -> OficinaCursos -> get($data['curso']);
			//inicia o cadastro
			$oficina->descricao = $data['titulo'];
			$oficina->instrutor = $data['instrutor'];
			$oficina->vagas_oferecidas = $data['vagas'];
			$oficina->publico_alvo = $data['publico_alvo'];
			$oficina->resumo = $data['resumo'];
			$oficina->materiais_equipamentos = $data['equipamento'];
			$oficina->observacao = $data['observacao'];
			$oficina->data_hora_iddata_hora = $data['data_hora'];
			$oficina->tipo_oficina_idtipo_oficina = $data['tipo_oficina'];
			$oficina->status_oficinas_idstatus_oficinas = $data['status_oficina'];
			$oficina->local = $data['local'];
			$oficina->realizada = $data['realizada'];
			//$oficina->dependente = null;
			try{
				$this -> OficinaCursos -> save($oficina);
				echo 'success#Atividade editada com sucesso';
			}catch(\Exception $e){
				echo "error#Problemas ao cadastrar: {$e->getMessage()}";
			}
		}
	}
	
	public function excluiAtividade($idatividade = null){
		$this->viewBuilder ()->setLayout( 'ajax' );
		//pega o usuário da sessão
		$usuario = $this -> request -> getSession()-> read('usuario');
		$evento = $this -> request -> getSession()-> read('evento_atual');
		$this -> loadModel('OficinaCursos');
		$this -> loadModel('InstrutoresOficinas');
		if ($this -> request -> is('get')) {
			try{
				$id = str_replace([".","[","]","-","(",")","select","delete","from","where","*"], "", $idatividade);
				$curso = $this->OficinaCursos->get($id);
				//apaga o curso
				if(!empty($curso))
					$qi = $this -> InstrutoresOficinas ->query();
					$qi->delete();
					$qi->where(['oficina_cursos_idoficina_curso'=>$id]);
					if($qi->execute()){//executa a exclusão da atividade
						$this->OficinaCursos->delete($curso);
					}
				echo 'success#Atividade <strong>'. $curso->descricao .'</strong> excluída com sucesso.';
			}catch(\Exception $e){
				echo "error#Problemas ao excluir: {$e->getMessage()}";
			}
		}
	}
}
?>
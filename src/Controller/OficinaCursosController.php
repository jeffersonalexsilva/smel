<?php
namespace App\Controller;

use Cake\Mailer\Email;

/**
 * OficinaCursos Controller
 *
 * @property \App\Model\Table\OficinaCursosTable $OficinaCursos
 */
class OficinaCursosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('oficinaCursos', $this->paginate($this->OficinaCursos));
        $this->set('_serialize', ['oficinaCursos']);
    }

    /**
     * View method
     *
     * @param string|null $id Oficina Curso id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $oficinaCurso = $this->OficinaCursos->get($id, [
            'contain' => []
        ]);
        $this->set('oficinaCurso', $oficinaCurso);
        $this->set('_serialize', ['oficinaCurso']);
    }

    
    
    public function cadastra_atividade(){
    	$this->viewBuilder ()->setLayout ( 'ajax' );
    	//pega o usuário da sessão
    	$usuario = $this -> request -> session()-> read('usuario');
    	$evento = $this -> request -> session()-> read('evento_atual');
    	if(isset($usuario->nome)){
    		if ($this -> request -> is('post')) {
    			$data = $this -> request -> getData();
    			$this -> loadModel('OficinaCursos');
    			$this -> loadModel('Usuarios');
    			$this -> loadModel('InstrutoresOficinas');
    			$oficina = $this -> OficinaCursos -> newEntity();
    			//inicia o cadastro
    			$oficina->descricao = $data['titulo'];
    			$oficina->instrutor = $data['instrutor'];
    			$oficina->vagas_oferecidas = $data['vagas'];
    			$oficina->vagas_restantes = $data['vagas'];
    			$oficina->publico_alvo = $data['publico_alvo'];
    			$oficina->resumo = $data['resumo'];
    			$oficina->materiais_equipamentos = $data['equipamento'];
    			$oficina->observacao = $data['observacao'];
    			//$oficina->local = $data['local'];
    			$oficina->data_hora_iddata_hora = $data['data_hora'];
    			$oficina->tipo_oficina_idtipo_oficina = $data['tipo_oficina'];
    			//$oficina->continua = $data['continua'];
    			$oficina->eventos_idevento = $data['evento'];
    			$oficina->usuarios_idusuario = $usuario->idusuario;
    			//busca os usuários associados
    			try{
    				$this -> OficinaCursos -> save($oficina); //salva a oficina
		    		//salva o primeiro instrutor - quem cadastrou o curso
    				$io = $this -> InstrutoresOficinas -> newEntity();
    				$io->usuarios_idusuario = $usuario->idusuario;
    				$io->oficina_cursos_idoficina_curso = $oficina->idoficina_curso;
    				$this->InstrutoresOficinas->save($io);
    				//salva os demais instrutores, se houverem
	    			if(isset($data['instrutor-extra'])){
		    			$query = $this -> Usuarios -> find('all', array('conditions' => array('Usuarios.cpf in' => $data['instrutor-extra'])));
		    			$instrutores = $query -> toArray();//recupera os instrutores
	    				//inicia o registro dos instrutores
		    			foreach($instrutores as $instrutor){
	    					$io = $this -> InstrutoresOficinas -> newEntity();
	    					$io->usuarios_idusuario = $instrutor->idusuario;
	    					$io->oficina_cursos_idoficina_curso = $oficina->idoficina_curso;
		    				$this->InstrutoresOficinas->save($io);	    					
		    			}
	    			}
    				echo 'success#Atividade enviada.';
    				$assunto = "Sua submissão de atividade no {$evento->descricao}";
    				$mensagem = 'Olá ' . $usuario -> nome . ', <br />Sua atividade <strong style="text-transform:uppercase">'. $oficina->descricao .'</strong> foi enviada com sucesso.<br />';
    				$mensagem .= 'A equipe da Coordenação Setorial de Extensão do CAA fará uma análise da sua atividade e retornará o mais breve possível com informações sobre o status e procedimentos de participação.<br />';
    				$mensagem .= 'Em caso de dúvida ou se precisar de ajuda, entre em contato com '.$evento->email_evento.'<br />';
    				$mensagem .= '<br /><br />Att--<br /> Equipe da Coordenação<br />'. $evento->descricao.'<br />';
    				$mensagem .= $evento->site_evento;
    				//Envia esse e-mail para o usuário
    				
    				$email = new Email('default');
    				$email->setEmailFormat('html');
    				$email->setFrom($evento->email_evento);
    				$email->setSender($evento->email_evento, $evento->descricao);
    				$email->setTo($usuario -> email);
    				$email->setSubject($assunto);
    				$email->send($mensagem);
    				echo '<br />Você receberá um e-mail de confirmação. Verifique também na sua caixa de SPAM.';
    			}catch(\Exception $e){
    				echo "error#Problemas ao cadastrar: {$e->getMessage()}";
    			}
    		}
    	}else{
    		echo "error#Você não tem acesso à essa página ou seu login expirou.";
    	}
    }
    
}

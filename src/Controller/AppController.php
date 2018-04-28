<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
	// public $helpers = [
	// 	'Form' => [
	// 		'className' => 'Bootstrap.Form'
	// 	],
	// 	'Html' => [
	// 		'className' => 'Bootstrap.Html'
	// 	],
	// 	'Modal' => [
	// 		'className' => 'Bootstrap.Modal'
	// 	],
	// 	'Navbar' => [
	// 		'className' => 'Bootstrap.Navbar'
	// 	],
	// 	'Paginator' => [
	// 		'className' => 'Bootstrap.Paginator'
	// 	],
	// 	'Panel' => [
	// 		'className' => 'Bootstrap.Panel'
	// 	]
	// ];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
// 		$this->getEvento();
// 		$this->getAvisos();
    }
	
/* 	private function getEvento(){
		// $this->render(false);
		//Carrega os eventos cadastrados no sistema
		$this -> loadModel('Eventos');
		$query = $this -> Eventos -> find('all', array('conditions' => array('Eventos.data_hora_inicio <=' => time(), 'Eventos.data_hora_fim >' => time())));
		$eventos = $query->first();
		$this->request->getSession()->write('evento_atual',$eventos);
		
	}
	
	private function getAvisos(){
		$this -> loadModel('Avisos');
		$sessao = $this -> request -> getSession();
		$evento = $sessao -> read('evento_atual');
		$query = $this -> Avisos -> find('all', array('conditions' => array('Avisos.eventos_idevento' => $evento->idevento)));
		$query->order(array('Avisos.idaviso'=>'DESC'));
		$sessao -> write('avisos', $query->toArray());
	} */
	
	//função para enviar SMS na inscrição
	protected function enviaSMS($numero, $nome, $mensagem){ 
		$this->render(false);
		// CLIENT_ID que é fornecido pela DirectCall (Seu e-mail)
		$client_id = "ola@interagenciadigital.com.br";
		// CLIENT_SECRET que é fornecido pela DirectCall (Código recebido por SMS)
		$client_secret = "4243560";
		// Faz a requisicao do access_token
		$req = $this->requisicaoApi(array('client_id'=>$client_id, 'client_secret'=>$client_secret), "request_token");
		//Seta uma variavel com o access_token
		$access_token = $req['access_token'];
		// Monta a mensagem
		$SMS = "Olá {$nome}! {$mensagem} #Integra CAA";
		// Array com os parametros para o envio
		$data = array(
			'origem'=>"81985116028", // Seu numero de origem
			'destino'=>$numero, // E o numero de destino
			'tipo'=>"texto",
			'access_token'=>$access_token,
			'texto'=>$SMS
		);
		// realiza o envio
		$req_sms = $this->requisicaoApi($data, "sms/send");
		return $req_sms;
	}
	
	protected function requisicaoApi($params, $endpoint){
		$this->render(false);
		$url = "http://api.directcallsoft.com/{$endpoint}";
		$data = http_build_query($params);
		$ch =   curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$return = curl_exec($ch);
		curl_close($ch);
		// Converte os dados de JSON para ARRAY
		$dados = json_decode($return, true);
		return $dados;
	}
	
	//método para tratar requisições, antes de filtrar.
	public function beforeFilter(Event $event){
		/*if($this->request->getSession()->check('usuario')){
			if($this->request->getAttribute('params')['controller'] == 'Admin'){//varifica se está tentando acessar o admin
				if($this->request->getSession()->read('usuario')->admin == 1){//verifica se o usuário é ADMIN
					return true;				
				}else{
					//redireciona para o painel principal do usuário
					return $this->redirect(['controller' => 'Inscricoes', 'action' => 'index']);
				}
			}
			return true;
		} else if($this->request->getAttribute('params')['controller'] != 'Pages' && $this->request->getAttribute('params')['controller'] != 'CadastroUsuarios'){
			return $this->redirect(['controller' => 'Pages', 'action' => 'index']);
			}*/
	}
}

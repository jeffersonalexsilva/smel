<?php
namespace App\Controller;
use Cake\Mailer\Email;
use Cake\Routing\Router;


/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 */
class UsuariosController extends AppController
{

    /**
     * Index method
     *
     * @return void
    public function index()
    {
        $this->set('usuarios', $this->paginate($this->Usuarios));
        $this->set('_serialize', ['usuarios']);
    }
     */
    public function index() {
        $this -> loadModel('Perfis');
        $perfis = $this -> Perfis -> find();
        $this -> set('perfis', $perfis);
    }
    
    public function login() {
        
    }
    
    public function cadastra() {
        $this->viewBuilder ()->setLayout ( 'ajax' );
        $evento = $this -> request -> getSession()-> read('evento_atual');
        if ($this -> request -> is('post')) {
            $data = $this -> request -> getData();
            // print_r($data);
            //recuperando os models
            $this -> loadModel('Usuarios');
            $this -> loadModel('MaisInfos');
            
            ///verifica se ele já se cadastrou antes. Primeiro com esse mesmo e-mail
            $query = $this -> Usuarios -> find('all', array('conditions' => array('Usuarios.email' => $data['email'])));
            $row = $query -> first();
            if (!empty($row)) {
                echo 'error#Eita, encontrei uma inscrição feita com esse mesmo e-mail. Tenta recuperar a senha lá na tela de login';
            } else {
                //agora verifica se esse CPF já existe no sistema
                $query = $this -> Usuarios -> find('all', array('conditions' => array('Usuarios.cpf' => $data['cpf'])));
                $row = $query -> first();
                if (!empty($row)) {
                    echo 'error#Eita, encontrei uma inscrição feita com esse mesmo CPF. Tenta recuperar a senha lá na tela de login';
                } else {
                    try{
                        $usuario = $this -> Usuarios -> newEntity();
                        $mais_info = $this -> MaisInfos -> newEntity();
                        //Contrói o usuário
                        $usuario -> nome = $data['nome'];
                        //retira os pontos e o traço do CPF
                        $novo = str_replace(".", "", $data['cpf']);
                        $novo = str_replace("-", "", $novo);
                        $usuario -> cpf = trim($novo);//salva o cpf limpo
                        $usuario -> email = $data['email'];
                        $usuario -> senha = md5($data['senha']);
                        $usuario -> token = md5(time() + $data['senha']);
                        $usuario -> sexo = $data['sexo'];
                        $usuario -> cidade = $data['cidade'];
                        $usuario -> uf = $data['uf'];
                        $usuario -> endereco = $data['endereco'];
                        $usuario -> telefone = $data['telefone'];
                        $usuario -> perfil_idperfil = $data['perfil'];
                        $usuario -> admin = 0;
                        // print_r($usuario);
                        //salva o usário
                        $this -> Usuarios -> save($usuario);
                        //Monta as informações extras
                        $mais_info -> tipo_graduacao = $data['tipo-grad'];
                        $mais_info -> curso = (!empty($data['curso-discente']) ? $data['curso-discente'] : $data['curso-docente']);
                        $mais_info -> periodo_ano = $data['ano-entrada'];
                        $mais_info -> periodo_entrada = $data['numero-entrada'];
                        $mais_info -> departamento_nucleo = $data['depto_nucleo'];
                        $mais_info -> siape = $data['siape'];
                        $mais_info -> setor = $data['setor'];
                        $mais_info -> funcao = $data['funcao'];
                        $mais_info -> instituicao = (!empty($data['instituicao']) ? $data['instituicao'] : $data['inst_origem']);
                        $mais_info -> usuario_idusuario = $usuario -> idusuario;
                        //salva as informações complementares
                        $this -> MaisInfos -> save($mais_info);
                        //enviando um email
                        /* $headers = "MIME-Version: 1.1\n";
                         $headers .= "Content-type: text/html; charset=utf-8\n";*/
                        $assunto = "Seu cadastro no {$evento->descricao}";
                        $mensagem = 'Olá ' . $usuario -> nome . ', <br />Seu cadastro no '.$evento->descricao.' foi realizado com sucesso. Confira os seus dados de acesso abaixo:<br />';
                        $mensagem .= 'E-mail cadastrado: ' . $usuario -> email . '<br /><br />';
                        $mensagem .= 'USE O LINK ABAIXO PARA RECUPERAR SUA SENHA<br />';
                        $mensagem .= 'http://'. $evento->site_evento .'/cadastro_usuarios/geranovasenha/'.$usuario->token.'/'.$usuario->email.'<br />';
                        $mensagem .= '---------------------------------------------------<br />';
                        $mensagem .= 'Em caso de dúvida ou se precisar de ajuda, entre em contato com '.$evento->email_evento.'<br />';
                        $mensagem .= '<br /><br />Att--<br /> Equipe da Coordenação<br />'. $evento->descricao.'<br />';
                        $mensagem .= $evento->site_evento;
                        //Envia esse e-mail para o usuário
                        
                        $email = new Email('default');
                        $email->setEmailFormat('html');
                        $email->setFrom(['ola@integracaa.tk' => $evento->descricao]);
                        $email->setReplyTo($evento->email_evento);
                        $email->setTo($usuario -> email);
                        $email->setSubject($assunto);
                        $email->send($mensagem);
                        echo 'success#Beleza... Agora você já está cadastrado(a) no sistema...<br />Redirecionando para a inscrição';
                        $usuario_logado = $this -> Usuarios ->get($usuario->idusuario,['contain'=> ['Info','Perfis','Cursos']]);
                        $sessao = $this -> request -> getSession()->write('usuario', $usuario_logado);
                        
                    }catch(\Exception $e){
                        echo "error#Ocorreu um problema: {$e->getMessage()}";
                    }
                }
            }
            
        }
    }
    
    public function entrar() {
        
        $this->viewBuilder ()->setLayout ( 'ajax' );
        if ($this -> request -> is('post')) {
            try{
                $data = $this -> request -> getData();
                //recuperando os models
                $this -> loadModel('Usuarios'); 
                if(isset($data['idfacebook'])){
                    $query = $this -> Usuarios -> find('all', array('conditions' => array('Usuarios.idfacebook' => $data['idfacebook'])));
                }else{
                    $query = $this -> Usuarios -> find('all', array('conditions' => array('Usuarios.email' => $data['email'], 'Usuarios.senha' => md5($data['senha']))));
                }
                $query->contain(['Info']);
                $query->contain(['Perfis']);
                $query->contain(['Cursos']);
                $row = $query -> first();
                if (!empty($row)) {
                    //seta as mensagens e inicia a sessão
                    echo "success#<em>Login feito... agora vamos começar a brincadeira</em><br />Redirecionando...";
                    $sessao = $this -> request -> getSession();
                    $sessao -> write('usuario', $row);
                    $this -> set('url', Router::url(['controller' => 'inscricoes', 'action' => 'index']));
                }
            }catch(\Exception $e){
                echo "error#Login inválido. Verifique seus dados e tente novamente.{$e->getMessage()}";                
            }
        }
    }
    
    public function buscaInstrutor() {
        $this->viewBuilder ()->setLayout ( 'ajax' );
        if ($this -> request -> is('post')) {
            $data = $this -> request -> getData();
            //recuperando os models
            $this -> loadModel('Usuarios');
            $query = $this -> Usuarios -> find('all', array('conditions' => array('Usuarios.cpf' => $data['cpf_instrutor'])));
            $row = $query -> first();
            if (empty($row)) {
                echo "error#Usuário não encontrado. Verifique se esse usuário possui cadastro no sistema e tente novamente.";
            } else {
                //Informa que encontrou o usuário
                echo "success#Usuário {$row->nome} adicionado. "
                .(empty($row->telefone) || is_null($row->telefone)?'<br>Peça para o instrutor completar o perfil (telefone faltando)':'')
                ."#{$row->nome}#{$row->cpf}";
            }
        }
    }
    
    public function recuperaSenha() {
        $this->viewBuilder ()->setLayout ( 'ajax' );
        $evento = $this -> request -> getSession()-> read('evento_atual');
        if ($this -> request -> is('post')) {
            $data = $this -> request -> getData();
            $novo = str_replace(".", "", $data['cpf']);
            $novo = str_replace("-", "", $novo);
            $novo = trim($novo);//salva o cpf limpo
            //recuperando os models
            $this -> loadModel('Usuarios');
            $query = $this -> Usuarios -> find('all', array('conditions' => array('Usuarios.email' => $data['email'], 'Usuarios.cpf' => $novo)));
            $usuario = $query -> first();
            // print_r($usuario);
            if (empty($usuario)) {
                echo "error#Cadastro não encontrado. Talvez você não tenha realizado seu cadastro ainda.<br />Caso tenha feito, entre em contato conosco enviando um e-mail para '.$evento->email_evento.' com seu CPF e e-mail.";
            } else {
                try{
                    //enviando um email
                    /* $headers = "MIME-Version: 1.1\n";
                     $headers .= "Content-type: text/html; charset=utf-8\n"; */
                    $assunto = "Recuperação de SENHA no {$evento->descricao}";
                    $mensagem = "Olá {$usuario -> nome}, Clique no link abaixo para recuperar sua senha:<br />";
                    $mensagem .= "http://{$evento->site_evento}/cadastro_usuarios/geranovasenha/{$usuario->token}/{$usuario->email} <br />";
                    $mensagem .= '---------------------------------------------------<br />';
                    $mensagem .= "Em caso de dúvida ou se precisar de ajuda, entre em contato com {$evento->email_evento}<br />";
                    $mensagem .= '<br /><br />Att--<br /> Equipe da Coordenação<br />'. $evento->descricao.'<br />';
                    $mensagem .= $evento->site_evento;
                    $email = new Email('default');
                    $email->setEmailFormat('html');
                    $email->setFrom(['ola@integracaa.tk' => $evento->descricao]);
                    $email->setReplyTo($evento->email_evento);
                    $email->setTo($usuario -> email);
                    $email->setSubject($assunto);
                    $email->send($mensagem);
                    echo 'success#Beleza... Você vai receber um email com os dados em breve. <br />Caso não receba em alguns minutos, verifique na sua lixeira';
                }catch(\Exception $e){
                    echo "error#Ocorreu um problema: {$e->getMessage()}";
                }
            }
        }
    }
    
    public function geranovasenha($token = null,$email = null){
        $this -> loadModel('Usuarios');
        $token = preg_replace('/[^[:alnum:]_]/', '',$token);
        $query = $this -> Usuarios -> find('all', array('conditions' => array('Usuarios.email' => $email, 'Usuarios.token' => $token)));
        $usuario = $query -> first();
        if (empty($usuario)) {
            $this->set('msg',"Cadastro não encontrado. Talvez você não tenha realizado seu cadastro ainda. Faça agora <a href='/cadastra_usuarios'>CLICANDO AQUI</a><br /><br />Caso tenha feito, entre em contato conosco enviando um e-mail para ola@integracaa.tk com seu CPF e e-mail.");
        }else{
            $this->set('usuario', $usuario);
        }
    }
    
    public function novasenha(){
        $this->viewBuilder ()->setLayout ( 'ajax' );
        $sessao = $this -> request -> getSession();
        $evento = $sessao-> read('evento_atual');
        $this -> loadModel('Usuarios');
        if ($this -> request -> is('post')) {
            $data = $this -> request -> getData();
            $usuario = $this -> Usuarios -> get($data['idusuario']);
            $usuario -> senha = md5($data['senha']);
            $usuario -> token = md5(time() + $data['senha']);
            try{
                $this->Usuarios->save($usuario);
                //enviando um email
                $assunto = 'Seu cadastro no '.$evento->descricao;
                $mensagem = 'Olá ' . $usuario -> nome . ', seu cadastro no '.$evento->descricao.' foi atualizado com sucesso. Confira os seus dados de acesso abaixo:<br />';
                $mensagem .= 'E-mail cadastrado: ' . $usuario -> email . '<br />';
                $mensagem .= 'USE O LINK ABAIXO PARA RECUPERAR SUA SENHA<br />';
                $mensagem .= 'http://'.$evento->site_evento.'/cadastro_usuarios/geranovasenha/'.$usuario->token.'/'.$usuario->email.' <br />';
                $mensagem .= '---------------------------------------------------<br />';
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
                echo 'success#Senha alterada.<br>Você receberá um e-mail com as orientações ara recuperar sua senha. Verifique também no SPAM.';
            }catch(\Exception $e){
                echo "error#Ocorreu um problema: {$e->getMessage()}";
            }
        }
    }
    
    public function ajax(){
        $this -> loadModel('Usuarios');
        $usuarios = $this->Usuarios->find('all');
        foreach ($usuarios as $usr) {
            $novo = str_replace(".", "", $usr->cpf);
            $novo = str_replace("-", "", $novo);
            // $novo = preg_replace( ".-",'',$usr->cpf);
            $usr->cpf = trim($novo);
            echo $usr->cpf . '<br>';
            $this->Usuarios->save($usr);//salva o CPF limpo
        }
    }
    
    public function atualizaCadastro(){
        
    }
    
    public function vinculaFace(){
        $this->viewBuilder ()->setLayout ( 'ajax' );
        if ($this -> request -> is('post')) {
            $data = $this -> request -> getData();
            $this -> loadModel('Usuarios');
            $sessao = $this -> request -> getSession();
            $usuario = $sessao->read('usuario');
            $usuario->idfacebook = $data['idfacebook'];
            if ($this -> Usuarios -> save($usuario)) {
                echo 'success#Vinculado com sucesso.';
                // print_r($usuario);
            }else{
                echo 'error#Não deu, algo aconteceu e não rolou.';
            }
        }
    }
    
    public function atualizarDados(){
        if($this->request-> getSession()->check('usuario')){
            $this->viewBuilder ()->setLayout ( 'ajax' );
            $evento = $this -> request -> getSession()-> read('evento_atual');
            if ($this -> request -> is('post')) {
                $data = $this -> request -> getData();
                // print_r($data);
                //recuperando os models
                $this -> loadModel('Usuarios');
                $sessao = $this -> request -> getSession();
                $usuario = $sessao->read('usuario');
                $usuario -> nome = $data['nome'];
                //retira os pontos e o traço do CPF
                $novo = str_replace(".", "", $data['cpf']);
                $novo = str_replace("-", "", $novo);
                $usuario -> cpf = trim($novo);//salva o cpf limpo
                $usuario -> email = $data['email'];
                if(!empty($data['senha'])){//caso altere a senha
                    $usuario -> senha = md5($data['senha-usuario']);
                    $usuario -> token = md5(time() + $data['senha-usuario']);
                }
                $usuario -> sexo = $data['sexo'];
                $usuario -> cidade = $data['cidade'];
                $usuario -> uf = $data['uf'];
                $usuario -> endereco = $data['endereco'];
                $usuario -> telefone = $data['telefone'];
                //salva o usário
                try{
                    $this -> Usuarios -> save($usuario);
                    echo "success#Dados atualizados com sucesso";
                    //enviando um email
                    /* $headers = "MIME-Version: 1.1\n";
                     $headers .= "Content-type: text/html; charset=utf-8\n"; */
                    $assunto = 'Seus dados no '.$evento->descricao;
                    $mensagem = 'Olá ' . $usuario -> nome . ', seu cadastro no '.$evento->descricao.' foi atualizado com sucesso<br />';
                    $mensagem .= '<br /><br />Att--<br /> Equipe da Coordenação<br />'. $evento->descricao.'<br />';
                    $mensagem .= $evento->site_evento;
                    //Envia esse e-mail para o usuário
                    $email = new Email('default');
                    $email->setEmailFormat('html');
                    $email->setFrom(['ola@integracaa.tk' => $evento->descricao]);
                    $email->setReplyTo($evento->email_evento);
                    //$email->setSender($evento->email_evento, $evento->descricao);
                    $email->setTo($usuario -> email);
                    $email->setSubject($assunto);
                    $email->send($mensagem);
                    echo 'success#Beleza... Você vai receber um email com os dados em breve. <br />Caso não receba em alguns minutos, verifique na sua lixeira';
                    $sessao -> write('usuario', $usuario);//atualizad os novos dados na sessão
                }catch(\Exception $e){
                    echo "error#Ocorreu um problema: {$e->getMessage()}";
                }
            }
        }else{
            echo "Você precisa realizar login ou sua sessão expirou. Volte para a tela de login e tente novamente.";
        }
    }
    
    public function autoinscricao_monitor(){
        $this->viewBuilder ()->setLayout ( 'ajax' );
        if($this->request-> getSession()->check('usuario')){
            $usuario = $this -> request -> getSession()-> read('usuario');
            $evento = $this -> request -> getSession() -> read('evento_atual');
            if ($this -> request -> is('post')) {
                $data = $this -> request -> getData();
                
                $this -> loadModel('MonitoresEventos');
                $monitor = $this->MonitoresEventos-> newEntity();
                $monitor->usuarios_idusuario = $data['usuario'];
                $monitor->eventos_idevento = $data['evento'];
                
                //salva o monitor
                try{
                    $this -> MonitoresEventos -> save($monitor);
                    echo "success#Ok! Agora é só aguardar o contado da coordenação. Seja bem vindo(a)";
                    //enviando um email
                    
                    $assunto = 'Inscrição de monitoria | '.$evento->descricao;
                    $mensagem = 'Olá ' . $usuario -> nome . ', sua inscrição como monitor do '.$evento->descricao.' foi realizada com sucesso<br />';
                    $mensagem .= '<br /><br />Att--<br /> Equipe da Coordenação<br />'. $evento->descricao.'<br />';
                    $mensagem .= $evento->site_evento;
                    //Envia esse e-mail para o usuário
                    $email = new Email('default');
                    $email->setEmailFormat('html');
                    $email->setFrom(['ola@integracaa.tk' => $evento->descricao]);
                    $email->setReplyTo($evento->email_evento);
                    //$email->setSender($evento->email_evento, $evento->descricao);
                    $email->setTo($usuario -> email);
                    $email->setSubject($assunto);
                    $email->send($mensagem);
                    echo 'success#Beleza... Você vai receber um email com os dados em breve. <br />Caso não receba em alguns minutos, verifique na sua lixeira';
                }catch(\Exception $e){
                    echo "error#Ocorreu um problema: {$e->getMessage()}";
                }
            }
        }else{
            echo "Você precisa realizar login ou sua sessão expirou. Volte para a tela de login e tente novamente.";
        }
    }
    
    public function indicaMonitor(){
        $this->viewBuilder ()->setLayout ( 'ajax' );
        if($this->request-> getSession()->check('usuario')){
            $usuario = $this -> request -> getSession()-> read('usuario');
            $evento = $this -> request -> getSession() -> read('evento_atual');
            if ($this -> request -> is('post')) {
                $data = $this -> request -> getData();
                //varifca se o inscrito possui cadastro
                try{
                    $this -> loadModel('MonitoresEventos');
                    $this -> loadModel('Usuarios');
                    $query = $this->Usuarios->find('all',array('conditions'=>array('OR'=>array(
                        array('Usuarios.cpf'=>$data['cpf']),
                        array('Usuarios.email'=>$data['email'])
                    ))));
                    $email = new Email('default');
                    if(!is_null($query->first())){//se encontrar um usuário
                        
                        $monitor = $this->MonitoresEventos-> newEntity();
                        $monitor->usuarios_idusuario = $usuario->idusuario;
                        $monitor->eventos_idevento = $evento->idevento;
                        
                        //salva o monitor
                        $this -> MonitoresEventos -> save($monitor);
                        echo "success#Massa, sua indicação foi muito boa. Obrigado.";
                        //enviando um email
                        $mensagem = 'Olá ' . $usuario -> nome . ', o usuário '.explode(" ", $usuario->nome)[0].' indicou você para ser monitor(a) do '.$evento->descricao.'. A Coordenação entrará em contato em breve para mais detalhes.<br />';
                    }else{//caso não encontre o usuário
                        $mensagem = 'Olá, o usuário '.explode(" ", $usuario->nome)[0].' indicou você para ser monitor(a) do '.$evento->descricao.'.<br />';
                        $mensagem .= 'Porém, não encontramos seu cadastro no sistema. Os monitores precisam realizar o cadastro simples no sistema, assim as declarações podem ser emitidas mais rapidamente e automaticamente.<br />';
                        $mensagem .= 'Faça seu cadastro no site '.$evento->site_evento.' e depois vá em clique em "Quero ser monitor".<br />';
                        
                        $email->setCc($evento->email_evento,'Organização Integra CAA');
                        echo "success#Que massa! Valeu pela indicação. Essa pessoa ainda não possui cadastro no sistema, mas vamos informá-la por e-mail para providenciar isso.";
                    }
                    $assunto = 'Indicação para monitoria | '.$evento->descricao;
                    $mensagem .= '<em>Os monitores recebem uma declaração pela participação. Vê que massa!</em><br />';
                    $mensagem .= '<br /><br />Att--<br /> Equipe da Coordenação<br />'. $evento->descricao.'<br />';
                    $mensagem .= $evento->site_evento;
                    //Envia esse e-mail para o usuário
                    $email->setEmailFormat('html');
                    $email->setFrom(['ola@integracaa.tk' => $evento->descricao]);
                    $email->setReplyTo($evento->email_evento);
                    //$email->setSender($evento->email_evento, $evento->descricao);
                    $email->setTo($usuario -> email);
                    $email->setSubject($assunto);
                    $email->send($mensagem);
                    
                }catch(\Exception $e){
                    echo "error#Ocorreu um problema: {$e->getMessage()}";
                }
                
            }
        }else{
            echo "Você precisa realizar login ou sua sessão expirou. Volte para a tela de login e tente novamente.";
        }
    }

   
}

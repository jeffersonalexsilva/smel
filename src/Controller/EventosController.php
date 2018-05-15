<?php
namespace App\Controller;


/**
 * Eventos Controller
 *
 * @property \App\Model\Table\EventosTable $Eventos
 */
class EventosController extends AppController
{
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
    }
    
    public function e($slug = null){
        $slug = str_replace([".","[","]","(",")","select","delete","from","where","*"], "", $slug);
        $this -> loadModel('Eventos');
        $query = $this -> Eventos -> find('all', array('conditions' => array('Eventos.slug'=>$slug)));
        $evento = $query->first();
        
        $this->set('evento',$evento);     
    }

    
}

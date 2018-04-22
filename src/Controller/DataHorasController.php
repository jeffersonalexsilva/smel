<?php
namespace App\Controller;


/**
 * DataHoras Controller
 *
 * @property \App\Model\Table\DataHorasTable $DataHoras
 */
class DataHorasController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('dataHoras', $this->paginate($this->DataHoras));
        $this->set('_serialize', ['dataHoras']);
    }

    /**
     * View method
     *
     * @param string|null $id Data Hora id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dataHora = $this->DataHoras->get($id, [
            'contain' => []
        ]);
        $this->set('dataHora', $dataHora);
        $this->set('_serialize', ['dataHora']);
    }

    
}

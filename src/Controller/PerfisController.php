<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Perfis Controller
 *
 * @property \App\Model\Table\PerfisTable $Perfis
 */
class PerfisController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('perfis', $this->paginate($this->Perfis));
        $this->set('_serialize', ['perfis']);
    }

   
}

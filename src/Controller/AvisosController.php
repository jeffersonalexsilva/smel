<?php
namespace App\Controller;


/**
 * Avisos Controller
 *
 * @property \App\Model\Table\AvisosTable $Avisos
 */
class AvisosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	$this -> loadModel('Avisos');
    	$evento = $sessao -> read('evento_atual');
    	$query = $this -> Avisos -> find('all', array('conditions' => array('Avisos.eventos_idevento' => $evento->idevento)));
    	$this -> set('avisos', $query->toArray());
    }

    /**
     * View method
     *
     * @param string|null $id Aviso id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aviso = $this->Avisos->get($id, [
            'contain' => []
        ]);

        $this->set('aviso', $aviso);
        $this->set('_serialize', ['aviso']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aviso = $this->Avisos->newEntity();
        if ($this->request->is('post')) {
            $aviso = $this->Avisos->patchEntity($aviso, $this->request->data);
            if ($this->Avisos->save($aviso)) {
                $this->Flash->success(__('The aviso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The aviso could not be saved. Please, try again.'));
        }
        $this->set(compact('aviso'));
        $this->set('_serialize', ['aviso']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Aviso id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aviso = $this->Avisos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aviso = $this->Avisos->patchEntity($aviso, $this->request->data);
            if ($this->Avisos->save($aviso)) {
                $this->Flash->success(__('The aviso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The aviso could not be saved. Please, try again.'));
        }
        $this->set(compact('aviso'));
        $this->set('_serialize', ['aviso']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Aviso id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aviso = $this->Avisos->get($id);
        if ($this->Avisos->delete($aviso)) {
            $this->Flash->success(__('The aviso has been deleted.'));
        } else {
            $this->Flash->error(__('The aviso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

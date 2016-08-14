<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tchat Controller
 *
 * @property \App\Model\Table\TchatTable $Tchat
 */
class TchatController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
      $this->viewBuilder()->layout('tchat');
    }

    /**
     * View method
     *
     * @param string|null $id Tchat id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tchat = $this->Tchat->get($id, [
            'contain' => []
        ]);

        $this->set('tchat', $tchat);
        $this->set('_serialize', ['tchat']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tchat = $this->Tchat->newEntity();
        if ($this->request->is('post')) {
            $tchat = $this->Tchat->patchEntity($tchat, $this->request->data);
            if ($this->Tchat->save($tchat)) {
                $this->Flash->success(__('The tchat has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tchat could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tchat'));
        $this->set('_serialize', ['tchat']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tchat id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tchat = $this->Tchat->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tchat = $this->Tchat->patchEntity($tchat, $this->request->data);
            if ($this->Tchat->save($tchat)) {
                $this->Flash->success(__('The tchat has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tchat could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tchat'));
        $this->set('_serialize', ['tchat']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tchat id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tchat = $this->Tchat->get($id);
        if ($this->Tchat->delete($tchat)) {
            $this->Flash->success(__('The tchat has been deleted.'));
        } else {
            $this->Flash->error(__('The tchat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

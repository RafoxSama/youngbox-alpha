<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Webtv Controller
 *
 * @property \App\Model\Table\WebtvTable $Webtv
 */
class WebtvController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $webtv = $this->paginate($this->Webtv);

        $this->set(compact('webtv'));
        $this->set('_serialize', ['webtv']);
    }

    /**
     * View method
     *
     * @param string|null $id Webtv id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $webtv = $this->Webtv->get($id, [
            'contain' => []
        ]);

        $this->set('webtv', $webtv);
        $this->set('_serialize', ['webtv']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $webtv = $this->Webtv->newEntity();
        if ($this->request->is('post')) {
            $webtv = $this->Webtv->patchEntity($webtv, $this->request->data);
            if ($this->Webtv->save($webtv)) {
                $this->Flash->success(__('The webtv has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The webtv could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('webtv'));
        $this->set('_serialize', ['webtv']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Webtv id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $webtv = $this->Webtv->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $webtv = $this->Webtv->patchEntity($webtv, $this->request->data);
            if ($this->Webtv->save($webtv)) {
                $this->Flash->success(__('The webtv has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The webtv could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('webtv'));
        $this->set('_serialize', ['webtv']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Webtv id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $webtv = $this->Webtv->get($id);
        if ($this->Webtv->delete($webtv)) {
            $this->Flash->success(__('The webtv has been deleted.'));
        } else {
            $this->Flash->error(__('The webtv could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

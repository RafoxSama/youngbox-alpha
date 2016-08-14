<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * VodsCategories Controller
 *
 * @property \App\Model\Table\VodsCategoriesTable $VodsCategories
 */
class VodsCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $vodsCategories = $this->paginate($this->VodsCategories);

        $this->set(compact('vodsCategories'));
        $this->set('_serialize', ['vodsCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Vods Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vodsCategory = $this->VodsCategories->get($id, [
            'contain' => ['VodsPlaylists']
        ]);

        $this->set('vodsCategory', $vodsCategory);
        $this->set('_serialize', ['vodsCategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vodsCategory = $this->VodsCategories->newEntity();
        if ($this->request->is('post')) {
            $vodsCategory = $this->VodsCategories->patchEntity($vodsCategory, $this->request->data);
            if ($this->VodsCategories->save($vodsCategory)) {
                $this->Flash->success(__('The vods category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vods category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('vodsCategory'));
        $this->set('_serialize', ['vodsCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vods Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vodsCategory = $this->VodsCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vodsCategory = $this->VodsCategories->patchEntity($vodsCategory, $this->request->data);
            if ($this->VodsCategories->save($vodsCategory)) {
                $this->Flash->success(__('The vods category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vods category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('vodsCategory'));
        $this->set('_serialize', ['vodsCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vods Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vodsCategory = $this->VodsCategories->get($id);
        if ($this->VodsCategories->delete($vodsCategory)) {
            $this->Flash->success(__('The vods category has been deleted.'));
        } else {
            $this->Flash->error(__('The vods category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

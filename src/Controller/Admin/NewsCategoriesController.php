<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * NewsCategories Controller
 *
 * @property \App\Model\Table\NewsCategoriesTable $NewsCategories
 */
class NewsCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $newsCategories = $this->paginate($this->NewsCategories);

        $this->set(compact('newsCategories'));
        $this->set('_serialize', ['newsCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id News Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $newsCategory = $this->NewsCategories->get($id, [
            'contain' => ['NewsArticles', 'NewsTags']
        ]);

        $this->set('newsCategory', $newsCategory);
        $this->set('_serialize', ['newsCategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $newsCategory = $this->NewsCategories->newEntity();
        if ($this->request->is('post')) {
            $newsCategory = $this->NewsCategories->patchEntity($newsCategory, $this->request->data);
            if ($this->NewsCategories->save($newsCategory)) {
                $this->Flash->success(__('The news category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The news category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('newsCategory'));
        $this->set('_serialize', ['newsCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id News Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $newsCategory = $this->NewsCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newsCategory = $this->NewsCategories->patchEntity($newsCategory, $this->request->data);
            if ($this->NewsCategories->save($newsCategory)) {
                $this->Flash->success(__('The news category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The news category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('newsCategory'));
        $this->set('_serialize', ['newsCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id News Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $newsCategory = $this->NewsCategories->get($id);
        if ($this->NewsCategories->delete($newsCategory)) {
            $this->Flash->success(__('The news category has been deleted.'));
        } else {
            $this->Flash->error(__('The news category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

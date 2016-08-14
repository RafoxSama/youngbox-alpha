<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ForumCategories Controller
 *
 * @property \App\Model\Table\ForumCategoriesTable $ForumCategories
 */
class ForumCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentForumCategories', 'LastPost']
        ];
        $forumCategories = $this->paginate($this->ForumCategories);

        $this->set(compact('forumCategories'));
        $this->set('_serialize', ['forumCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Forum Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $forumCategory = $this->ForumCategories->get($id, [
            'contain' => ['ParentForumCategories', 'LastPost', 'ChildForumCategories', 'ForumThreads']
        ]);

        $this->set('forumCategory', $forumCategory);
        $this->set('_serialize', ['forumCategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $forumCategory = $this->ForumCategories->newEntity();
        if ($this->request->is('post')) {
            $forumCategory = $this->ForumCategories->patchEntity($forumCategory, $this->request->data);
            if ($this->ForumCategories->save($forumCategory)) {
                $this->Flash->success(__('The forum category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The forum category could not be saved. Please, try again.'));
            }
        }
        $parentForumCategories = $this->ForumCategories->ParentForumCategories->find('list', ['limit' => 200]);
        $lastPost = $this->ForumCategories->LastPost->find('list', ['limit' => 200]);
        $this->set(compact('forumCategory', 'parentForumCategories', 'lastPost'));
        $this->set('_serialize', ['forumCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Forum Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $forumCategory = $this->ForumCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $forumCategory = $this->ForumCategories->patchEntity($forumCategory, $this->request->data);
            if ($this->ForumCategories->save($forumCategory)) {
                $this->Flash->success(__('The forum category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The forum category could not be saved. Please, try again.'));
            }
        }
        $parentForumCategories = $this->ForumCategories->ParentForumCategories->find('list', ['limit' => 200]);
        $lastPost = $this->ForumCategories->LastPost->find('list', ['limit' => 200]);
        $this->set(compact('forumCategory', 'parentForumCategories', 'lastPost'));
        $this->set('_serialize', ['forumCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Forum Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $forumCategory = $this->ForumCategories->get($id);
        if ($this->ForumCategories->delete($forumCategory)) {
            $this->Flash->success(__('The forum category has been deleted.'));
        } else {
            $this->Flash->error(__('The forum category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

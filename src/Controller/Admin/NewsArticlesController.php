<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * NewsArticles Controller
 *
 * @property \App\Model\Table\NewsArticlesTable $NewsArticles
 */
class NewsArticlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['NewsCategories', 'Users']
        ];
        $newsArticles = $this->paginate($this->NewsArticles);

        $this->set(compact('newsArticles'));
        $this->set('_serialize', ['newsArticles']);
    }

    /**
     * View method
     *
     * @param string|null $id News Article id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $newsArticle = $this->NewsArticles->get($id, [
            'contain' => ['NewsCategories', 'Users', 'NewsTags']
        ]);

        $this->set('newsArticle', $newsArticle);
        $this->set('_serialize', ['newsArticle']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $newsArticle = $this->NewsArticles->newEntity();
        if ($this->request->is('post')) {
            $newsArticle = $this->NewsArticles->patchEntity($newsArticle, $this->request->data);
            if ($this->NewsArticles->save($newsArticle)) {
                $this->Flash->success(__('The news article has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The news article could not be saved. Please, try again.'));
            }
        }
        $newsCategories = $this->NewsArticles->NewsCategories->find('list', ['limit' => 200]);
        $users = $this->NewsArticles->Users->find('list', ['limit' => 200]);
        $newsTags = $this->NewsArticles->NewsTags->find('list', ['limit' => 200]);
        $this->set(compact('newsArticle', 'newsCategories', 'users', 'newsTags'));
        $this->set('_serialize', ['newsArticle']);
    }

    /**
     * Edit method
     *
     * @param string|null $id News Article id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $newsArticle = $this->NewsArticles->get($id, [
            'contain' => ['NewsTags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newsArticle = $this->NewsArticles->patchEntity($newsArticle, $this->request->data);
            if ($this->NewsArticles->save($newsArticle)) {
                $this->Flash->success(__('The news article has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The news article could not be saved. Please, try again.'));
            }
        }
        $newsCategories = $this->NewsArticles->NewsCategories->find('list', ['limit' => 200]);
        $users = $this->NewsArticles->Users->find('list', ['limit' => 200]);
        $newsTags = $this->NewsArticles->NewsTags->find('list', ['limit' => 200]);
        $this->set(compact('newsArticle', 'newsCategories', 'users', 'newsTags'));
        $this->set('_serialize', ['newsArticle']);
    }

    /**
     * Delete method
     *
     * @param string|null $id News Article id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $newsArticle = $this->NewsArticles->get($id);
        if ($this->NewsArticles->delete($newsArticle)) {
            $this->Flash->success(__('The news article has been deleted.'));
        } else {
            $this->Flash->error(__('The news article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

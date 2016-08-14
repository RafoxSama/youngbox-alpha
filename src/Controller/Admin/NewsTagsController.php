<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * NewsTags Controller
 *
 * @property \App\Model\Table\NewsTagsTable $NewsTags
 */
class NewsTagsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories']
        ];
        $newsTags = $this->paginate($this->NewsTags);

        $this->set(compact('newsTags'));
        $this->set('_serialize', ['newsTags']);
    }

    /**
     * View method
     *
     * @param string|null $id News Tag id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $newsTag = $this->NewsTags->get($id, [
            'contain' => ['Categories', 'NewsArticles']
        ]);

        $this->set('newsTag', $newsTag);
        $this->set('_serialize', ['newsTag']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $newsTag = $this->NewsTags->newEntity();
        if ($this->request->is('post')) {
            $newsTag = $this->NewsTags->patchEntity($newsTag, $this->request->data);
            if ($this->NewsTags->save($newsTag)) {
                $this->Flash->success(__('The news tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The news tag could not be saved. Please, try again.'));
            }
        }
        $categories = $this->NewsTags->Categories->find('list', ['limit' => 200]);
        $newsArticles = $this->NewsTags->NewsArticles->find('list', ['limit' => 200]);
        $this->set(compact('newsTag', 'categories', 'newsArticles'));
        $this->set('_serialize', ['newsTag']);
    }

    /**
     * Edit method
     *
     * @param string|null $id News Tag id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $newsTag = $this->NewsTags->get($id, [
            'contain' => ['NewsArticles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newsTag = $this->NewsTags->patchEntity($newsTag, $this->request->data);
            if ($this->NewsTags->save($newsTag)) {
                $this->Flash->success(__('The news tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The news tag could not be saved. Please, try again.'));
            }
        }
        $categories = $this->NewsTags->Categories->find('list', ['limit' => 200]);
        $newsArticles = $this->NewsTags->NewsArticles->find('list', ['limit' => 200]);
        $this->set(compact('newsTag', 'categories', 'newsArticles'));
        $this->set('_serialize', ['newsTag']);
    }

    /**
     * Delete method
     *
     * @param string|null $id News Tag id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $newsTag = $this->NewsTags->get($id);
        if ($this->NewsTags->delete($newsTag)) {
            $this->Flash->success(__('The news tag has been deleted.'));
        } else {
            $this->Flash->error(__('The news tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

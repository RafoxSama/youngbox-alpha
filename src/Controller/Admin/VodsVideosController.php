<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * VodsVideos Controller
 *
 * @property \App\Model\Table\VodsVideosTable $VodsVideos
 */
class VodsVideosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['VodsPlaylists']
        ];
        $vodsVideos = $this->paginate($this->VodsVideos);

        $this->set(compact('vodsVideos'));
        $this->set('_serialize', ['vodsVideos']);
    }

    /**
     * View method
     *
     * @param string|null $id Vods Video id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vodsVideo = $this->VodsVideos->get($id, [
            'contain' => ['VodsPlaylists']
        ]);

        $this->set('vodsVideo', $vodsVideo);
        $this->set('_serialize', ['vodsVideo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vodsVideo = $this->VodsVideos->newEntity();
        if ($this->request->is('post')) {
            $vodsVideo = $this->VodsVideos->patchEntity($vodsVideo, $this->request->data);
            if ($this->VodsVideos->save($vodsVideo)) {
                $this->Flash->success(__('The vods video has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vods video could not be saved. Please, try again.'));
            }
        }
        $vodsPlaylists = $this->VodsVideos->VodsPlaylists->find('list', ['limit' => 200]);
        $this->set(compact('vodsVideo', 'vodsPlaylists'));
        $this->set('_serialize', ['vodsVideo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vods Video id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vodsVideo = $this->VodsVideos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vodsVideo = $this->VodsVideos->patchEntity($vodsVideo, $this->request->data);
            if ($this->VodsVideos->save($vodsVideo)) {
                $this->Flash->success(__('The vods video has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vods video could not be saved. Please, try again.'));
            }
        }
        $vodsPlaylists = $this->VodsVideos->VodsPlaylists->find('list', ['limit' => 200]);
        $this->set(compact('vodsVideo', 'vodsPlaylists'));
        $this->set('_serialize', ['vodsVideo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vods Video id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vodsVideo = $this->VodsVideos->get($id);
        if ($this->VodsVideos->delete($vodsVideo)) {
            $this->Flash->success(__('The vods video has been deleted.'));
        } else {
            $this->Flash->error(__('The vods video could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

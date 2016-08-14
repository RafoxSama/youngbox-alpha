<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * VodsPlaylists Controller
 *
 * @property \App\Model\Table\VodsPlaylistsTable $VodsPlaylists
 */
class VodsPlaylistsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['VodsCategories']
        ];
        $vodsPlaylists = $this->paginate($this->VodsPlaylists);

        $this->set(compact('vodsPlaylists'));
        $this->set('_serialize', ['vodsPlaylists']);
    }

    /**
     * View method
     *
     * @param string|null $id Vods Playlist id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vodsPlaylist = $this->VodsPlaylists->get($id, [
            'contain' => ['VodsCategories', 'VodsVideos']
        ]);

        $this->set('vodsPlaylist', $vodsPlaylist);
        $this->set('_serialize', ['vodsPlaylist']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vodsPlaylist = $this->VodsPlaylists->newEntity();
        if ($this->request->is('post')) {
            $vodsPlaylist = $this->VodsPlaylists->patchEntity($vodsPlaylist, $this->request->data);
            if ($this->VodsPlaylists->save($vodsPlaylist)) {
                $this->Flash->success(__('The vods playlist has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vods playlist could not be saved. Please, try again.'));
            }
        }
        $vodsCategories = $this->VodsPlaylists->VodsCategories->find('list', ['limit' => 200]);
        $this->set(compact('vodsPlaylist', 'vodsCategories'));
        $this->set('_serialize', ['vodsPlaylist']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vods Playlist id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vodsPlaylist = $this->VodsPlaylists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vodsPlaylist = $this->VodsPlaylists->patchEntity($vodsPlaylist, $this->request->data);
            if ($this->VodsPlaylists->save($vodsPlaylist)) {
                $this->Flash->success(__('The vods playlist has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vods playlist could not be saved. Please, try again.'));
            }
        }
        $vodsCategories = $this->VodsPlaylists->VodsCategories->find('list', ['limit' => 200]);
        $this->set(compact('vodsPlaylist', 'vodsCategories'));
        $this->set('_serialize', ['vodsPlaylist']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vods Playlist id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vodsPlaylist = $this->VodsPlaylists->get($id);
        if ($this->VodsPlaylists->delete($vodsPlaylist)) {
            $this->Flash->success(__('The vods playlist has been deleted.'));
        } else {
            $this->Flash->error(__('The vods playlist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Event\Badges;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;

/**
 * Vods Controller
 *
 * @property \App\Model\Table\VodsTable $Vods
 */
class VodsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
      $this->loadModel('VodsCategories');
      $categories = $this->VodsCategories
          ->find()
          ->contain([
              'VodsPlaylists'
          ])
          ->order([
              'VodsCategories.position' => 'asc'
          ]);
          $this->set(compact('categories'));

    }

    public function category()
    {
      $this->loadModel('VodsCategories');
      $category = $this->VodsCategories
          ->find('slug', [
              'slug' => $this->request->slug,
              'slugField' => 'VodsCategories.slug'
          ])
          ->contain([
              'VodsPlaylists'
          ])
          ->first();
          $this->set(compact('category'));
          //Check if the category is found.
          if (empty($category)) {
              $this->Flash->error("Cette catégorie n'existe pas ou a été supprimée !");

              return $this->redirect(['action' => 'index']);
          }
    }
    public function playlist()
    {
      $this->loadModel('VodsPlaylists');
      $playlist = $this->VodsPlaylists
          ->find('slug', [
              'slug' => $this->request->slug,
              'slugField' => 'VodsPlaylists.slug'
          ])
          ->contain([
              'VodsCategories',
              'VodsVideos'
          ])
          ->first();
          $this->set(compact('playlist'));

    }
    public function video()
    {
      $this->loadModel('VodsVideos');
      $video = $this->VodsVideos
          ->find('slug', [
              'slug' => $this->request->slug,
              'slugField' => 'VodsVideos.slug'
          ])
          ->first();
    $this->loadModel('VodsComments');
    if ($this->request->is('post')) {
        //Check if the user is connected.
        if (!$this->Auth->user()) {
            return $this->Flash->error(__('You must be connected to post a comment.'));
        }

        $this->request->data['video_id'] = $video->id;
        $this->request->data['user_id'] = $this->Auth->user('id');

        $newComment = $this->VodsComments->newEntity($this->request->data, ['validate' => 'create']);

        //Attach Event.
        $this->VodsComments->eventManager()->attach(new Badges($this));

        $insertComment = $this->VodsComments->save($newComment);
    }




    $comments = $this->VodsComments
        ->find()
        ->where([
            'video_id' => $video->id
        ])
        ->contain([
            'Users' => function ($q) {
                return $q->find('medium');
            }
        ])
        ->order([
            'VodsComments.created' => 'desc'
        ]);

    $comments = $this->paginate($comments);
    $this->loadModel('Users');
    $currentUser = $this->Users
        ->find()
        ->where([
            'Users.id' => $this->Auth->user('id')
        ])
        ->select(['id', 'group_id', 'is_admin', 'is_staff', 'is_modo'])
        ->first();

          $this->set(compact('video', 'comments', 'currentUser'));


    }



    public function deleteComment($id = null)
        {
            $this->loadModel('VodsComments');
            $comment = $this->VodsComments
                ->find()
                ->contain([
                    'VodsVideos'
                ])
                ->where([
                    'VodsComments.id' => $id
                ])
                ->first();
            if (is_null($comment)) {
                $this->Flash->error(__("This comment doesn't exist or has been deleted !"));
                return $this->redirect($this->referer());
            }
            //Current user.
            $this->loadModel('Users');
            $currentUser = $this->Users
                ->find()
                ->where([
                    'Users.id' => $this->Auth->user('id')
                ])
                ->select(['id', 'group_id'])
                ->first();

            if ($comment->user_id != $this->Auth->user('id') || (!is_null($currentUser) && ($currentUser->is_admin || $currentUser->is_staff || $currentUser->is_modo))) {
                $this->Flash->error(__("You don't have the authorization to delete this comment !"));
                return $this->redirect($this->referer());
            }
            if ($this->VodsComments->delete($comment)) {
                $this->Flash->success(__("This comment has been deleted successfully !"));
            }
            return $this->redirect(['_name' => 'vods-video', 'slug' => $comment->vods_videos->slug, 'id' => $comment->vods_videos->id, '?' => ['page' => $comment->vods_videos->last_page]]);
        }


    /**
     * View method
     *
     * @param string|null $id Vod id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vod = $this->Vods->get($id, [
            'contain' => []
        ]);

        $this->set('vod', $vod);
        $this->set('_serialize', ['vod']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vod = $this->Vods->newEntity();
        if ($this->request->is('post')) {
            $vod = $this->Vods->patchEntity($vod, $this->request->data);
            if ($this->Vods->save($vod)) {
                $this->Flash->success(__('The vod has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vod could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('vod'));
        $this->set('_serialize', ['vod']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vod id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vod = $this->Vods->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vod = $this->Vods->patchEntity($vod, $this->request->data);
            if ($this->Vods->save($vod)) {
                $this->Flash->success(__('The vod has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vod could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('vod'));
        $this->set('_serialize', ['vod']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vod id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vod = $this->Vods->get($id);
        if ($this->Vods->delete($vod)) {
            $this->Flash->success(__('The vod has been deleted.'));
        } else {
            $this->Flash->error(__('The vod could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

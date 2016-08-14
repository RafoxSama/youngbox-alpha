<?php
namespace App\Controller\Forum;

use App\Controller\AppController;
use App\Event\Badges;
use App\Event\Forum\Followers;
use App\Event\Forum\LastPostUpdater;
use App\Event\Forum\Notifications;
use App\Event\Forum\Reader;
use App\Event\Forum\Statistics;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\utility\Inflector;

class ThreadsController extends AppController
{

    /**
     * Components.
     *
     * @var array
     */
    public $components = [
        'ForumAntiSpam' => [
            'className' => 'App\Controller\Component\Forum\AntiSpamComponent'
        ]
    ];

    /**
     * Create a new thread.
     *
     * @return \Cake\Network\Response
     */
    public function create()
    {

        $this->loadModel('ForumThreads');
        $this->loadModel('ForumCategories');
        $this->loadModel('Users');
        $currentUser = $this->Users
            ->find()
            ->where([
                'Users.id' => $this->Auth->user('id')
            ])
            ->select(['id', 'group_id', 'is_admin', 'is_staff', 'is_modo'])
            ->first();


        $thread = $this->ForumThreads->newEntity($this->request->data, ['validate' => 'create']);

        $category = $this->ForumCategories
            ->find()
            ->select(['id', 'title', 'category_open'])
            ->where([
                'ForumCategories.id' => $this->request->id
            ])
            ->first();

        //Check if the category if found is found.
        if (is_null($category)) {
            $this->Flash->error("Cette catégorie n'existe pas ou a été supprimée!");

            return $this->redirect($this->referer());
        }

        //Check if the category is not closed to threads.
        if ($category->category_open == false) {
            $this->Flash->error(__("Vous ne pouvez pas attribuer ce sujet à cette catégorie <strong>{0}</strong> car cette catégorie est fermée !", h($category->title)));

            return $this->redirect($this->referer());
        }

        if ($this->request->is('post')) {

          $this->ForumPosts->patchEntity($thread, $this->request->data());

          $this->ForumPosts->patchEntity($post, $this->request->data());
          $post->last_edit_date = new Time();
          $post->last_edit_user_id = $this->Auth->user('id');
          $post->edit_count++;

          if ($this->ForumPosts->save($post) && $this->ForumThreads->save($thread) ) {
              $this->Flash->success('Ce sujet a été modifié avec succès!');
          }
        }

        //Breadcrumbs.
        $breadcrumbs = $this->ForumCategories->find('path', ['for' => $this->request->id])->toArray();
        $this->set(compact('thread', 'breadcrumbs', 'currentUser'));
    }

    /**
     * Reply to a thread.
     *
     * @return \Cake\Network\Response
     */
    public function reply()
    {
        $this->loadModel('ForumPosts');

        if ($this->request->is('post')) {
            //Spamming Restrictions.
            if (!$this->ForumAntiSpam->check('ForumPosts', $this->request->session()->read('Auth.User'))) {
                $this->Flash->error("Vous ne pouvez pas répondre aux sujets dans les 5 prochaines minutes en raison de restrictions de spamming.");

                return $this->redirect($this->referer());
            }

            $this->loadModel('ForumThreads');

            $thread = $this->ForumThreads
                ->find()
                ->where(['ForumThreads.id' => $this->request->id])
                ->first();

            //Check if the thread is found.
            if (is_null($thread)) {
                $this->Flash->error(__("Ce sujet n'existe pas ou a été supprimé !"));

                return $this->redirect($this->referer());
            }

            //Check if the thread is open.
            if ($thread->thread_open != 1) {
                $this->Flash->error("Ce sujet est fermé ou a été supprimée!");

                return $this->redirect($this->referer());
            }

            //Build the newEntity for the post form.
            $this->request->data['forum_thread']['id'] = $this->request->id;
            $this->request->data['forum_thread']['last_post_date'] = new Time();
            $this->request->data['forum_thread']['last_post_user_id'] = $this->Auth->user('id');
            $this->request->data['user_id'] = $this->Auth->user('id');
            $this->request->data['thread_id'] = $this->request->id;

            $post = $this->ForumPosts->newEntity($this->request->data, [
                'associated' => ['ForumThreads'],
                'validate' => 'create'
            ]);

            //Handle validation errors (Due to the redirect)
            if (!empty($post->errors())) {
                $this->Flash->threadReply('Validation errors', [
                    'key' => 'ThreadReply',
                    'params' => [
                        'errors' => $post->errors()
                    ]
                ]);

                return $this->redirect($this->referer());
            }

            if ($post->forum_thread->isNew() === true) {
                $post->forum_thread->isNew(false);
            }

            if ($newPost = $this->ForumPosts->save($post)) {
                //Update the last post id for the thread.
                $this->loadModel('ForumThreads');
                $thread = $this->ForumThreads->get($this->request->id);
                $thread->last_post_id = $newPost->id;
                $this->ForumThreads->save($thread);

                //LastPostUpdater Event.
                $this->eventManager()->attach(new LastPostUpdater());
                $event = new Event('LastPostUpdater.new', $this, [
                    'thread' => $thread,
                    'post' => $newPost
                ]);
                $this->eventManager()->dispatch($event);

                //Statistics Event.
                $this->eventManager()->attach(new Statistics());
                $stats = new Event('Model.ForumPosts.new', $this);
                $this->eventManager()->dispatch($stats);

                //Followers Event.
                $this->eventManager()->attach(new Followers());
                $event = new Event('Model.ForumThreadsFollowers.new', $this, [
                    'user_id' => $this->Auth->user('id'),
                    'thread_id' => $thread->id
                ]);
                $this->eventManager()->dispatch($event);

                //Notifications Event.
                $this->eventManager()->attach(new Notifications());
                $event = new Event('Model.Notifications.dispatch', $this, [
                    'sender_id' => $this->Auth->user('id'),
                    'thread_id' => $thread->id,
                    'type' => 'thread.reply'
                ]);
                $this->eventManager()->dispatch($event);

                //Badges Event.
                $this->ForumPosts->eventManager()->attach(new Badges($this));

                $threadOpen = isset($this->request->data['forum_thread']['thread_open']) ? $this->request->data['forum_thread']['thread_open'] : true;

                if ($threadOpen == false) {
                    $this->Flash->success("Votre réponse a été posté avec succès et le sujet a été fermé!");
                } else {
                    $this->Flash->success("Votre réponse a été posté avec succès!");
                }

                //Redirect the user to the last page of the article.
                return $this->redirect([
                    'controller' => 'posts',
                    'action' => 'go',
                    'prefix' => 'forum',
                    $newPost->id
                ]);
            }
        }

        $this->redirect($this->referer());
    }

    /**
     * Lock a thread.
     *
     * @return \Cake\Network\Response
     */
    public function lock()
    {
        $this->loadModel('ForumThreads');

        $thread = $this->ForumThreads
            ->find()
            ->where([
                'ForumThreads.id' => $this->request->id
            ])
            ->select([
                'ForumThreads.id',
                'ForumThreads.thread_open',
                'ForumThreads.user_id',
                'ForumThreads.title'
            ])
            ->first();

        //Check if the thread is found.
        if (is_null($thread)) {
            $this->Flash->error("Ce sujet n'existe pas ou a été supprimée");

            return $this->redirect($this->referer());
        }

        //Check if the thread is not already open.
        if ($thread->thread_open == false) {
            $this->Flash->error("Ce sujet est déjà fermé!");

            return $this->redirect([
                '_name' => 'forum-threads',
                'slug' => Inflector::slug($thread->title, '-'),
                'id' => $thread->id
            ]);
        }

        //Check if the user has the permission to lock it.
        $this->loadModel('Users');
        $currentUser = $this->Users
            ->find()
            ->where([
                'Users.id' => $this->Auth->user('id')
            ])
            ->select(['id', 'group_id', 'is_admin', 'is_staff', 'is_modo'])
            ->first();

        if ($thread->user_id != $this->Auth->user('id') && !( $currentUser->is_admin || $currentUser->is_staff || $currentUser->is_modo)) {
            $this->Flash->error("Vous ne disposez pas de l'autorisation pour verrouiller ce post!");

            return $this->redirect([
                '_name' => 'forum-threads',
                'slug' => Inflector::slug($thread->title, '-'),
                'id' => $thread->id
            ]);
        }

        $thread->thread_open = false;

        if ($this->ForumThreads->save($thread)) {
            //Notifications Event.
            $this->eventManager()->attach(new Notifications());
            $event = new Event('Model.Notifications.new', $this, [
                'sender_id' => $this->Auth->user('id'),
                'thread_id' => $thread->id,
                'type' => 'thread.lock'
            ]);
            $this->eventManager()->dispatch($event);

            $this->Flash->success("Ce sujet a été verrouillé avec succès !");

            return $this->redirect([
                '_name' => 'forum-threads',
                'slug' => Inflector::slug($thread->title, '-'),
                'id' => $thread->id
            ]);
        }

        $this->redirect($this->referer());
    }

    /**
     * Unlock a thread.
     *
     * @return \Cake\Network\Response
     */
    public function unlock()
    {
        $this->loadModel('ForumThreads');

        $thread = $this->ForumThreads
            ->find()
            ->where([
                'ForumThreads.id' => $this->request->id
            ])
            ->select([
                'ForumThreads.id',
                'ForumThreads.thread_open',
                'ForumThreads.user_id',
                'ForumThreads.title'
            ])
            ->first();

        //Check if the thread is found.
        if (is_null($thread)) {
            $this->Flash->error("Ce sujet n'existe pas ou a été supprimée");

            return $this->redirect($this->referer());
        }

        //Check if the thread is not already open.
        if ($thread->thread_open == true) {
            $this->Flash->error("Ce sujet est déjà ouvert!");

            return $this->redirect([
                '_name' => 'forum-threads',
                'slug' => Inflector::slug($thread->title, '-'),
                'id' => $thread->id
            ]);
        }

        //Check if the user has the permission to unlock it.
        $this->loadModel('Users');
        $currentUser = $this->Users
            ->find()
            ->where([
                'Users.id' => $this->Auth->user('id')
            ])
            ->select(['id', 'group_id', 'is_admin', 'is_staff', 'is_modo'])
            ->first();

        if ($thread->user_id != $this->Auth->user('id') && !( $currentUser->is_admin || $currentUser->is_staff || $currentUser->is_modo)) {
            $this->Flash->error("Vous ne disposez pas de l'autorisation pour déverrouiller ce post!");

            return $this->redirect([
                '_name' => 'forum-threads',
                'slug' => Inflector::slug($thread->title, '-'),
                'id' => $thread->id
            ]);
        }

        $thread->thread_open = true;
        if ($this->ForumThreads->save($thread)) {
            $this->Flash->success("Ce sujet a été déverrouillé avec succès");

            return $this->redirect([
                '_name' => 'forum-threads',
                'slug' => Inflector::slug($thread->title, '-'),
                'id' => $thread->id
            ]);
        }

        $this->redirect($this->referer());
    }

    /**
     * Follow a thread.
     *
     * @return \Cake\Network\Response
     */
    public function follow()
    {
        $this->loadModel('ForumThreads');
        $thread = $this->ForumThreads
            ->find()
            ->where([
                'ForumThreads.id' => $this->request->id
            ])
            ->select([
                'ForumThreads.id'
            ])
            ->first();

        //Check if the thread is found.
        if (is_null($thread)) {
            $this->Flash->error("Ce sujet n'existe pas ou a été supprimée");

            return $this->redirect($this->referer());
        }

        $this->loadModel('ForumThreadsFollowers');
        $isFollowed = $this->ForumThreadsFollowers
            ->find()
            ->where([
                'ForumThreadsFollowers.user_id' => $this->Auth->user('id'),
                'ForumThreadsFollowers.thread_id' => $thread->id
            ])
            ->first();

        if (!is_null($isFollowed)) {
            $this->Flash->error("Vous suivez déjà ce seujet !");

            return $this->redirect($this->referer());
        }

        $data = [];
        $data['thread_id'] = $thread->id;
        $data['user_id'] = $this->Auth->user('id');
        $follower = $this->ForumThreadsFollowers->newEntity($data);

        if ($this->ForumThreadsFollowers->save($follower)) {
            $this->Flash->success("Vous suivez avec succès ce sujet maintenant !");

            return $this->redirect($this->referer());
        } else {
            $this->Flash->error("Il y a eu une erreur en suivant ce sujet.");

            return $this->redirect($this->referer());
        }
    }

    /**
     * Unfollow a thread.
     *
     * @return \Cake\Network\Response
     */
    public function unfollow()
    {
        $this->loadModel('ForumThreads');
        $thread = $this->ForumThreads
            ->find()
            ->where([
                'ForumThreads.id' => $this->request->id
            ])
            ->select([
                'ForumThreads.id'
            ])
            ->first();

        //Check if the thread is found.
        if (is_null($thread)) {
            $this->Flash->error("Ce sujet n'existe pas ou a été supprimée");

            return $this->redirect($this->referer());
        }

        $this->loadModel('ForumThreadsFollowers');
        $follower = $this->ForumThreadsFollowers
            ->find()
            ->where([
                'ForumThreadsFollowers.user_id' => $this->Auth->user('id'),
                'ForumThreadsFollowers.thread_id' => $thread->id
            ])
            ->first();

        if (is_null($follower)) {
            $this->Flash->error("Vous ne suivez pas ce sujet!");

            return $this->redirect($this->referer());
        }

        if ($this->ForumThreadsFollowers->delete($follower)) {
            $this->Flash->success("Désabonner avec succès !");

            return $this->redirect($this->referer());
        } else {
            $this->Flash->error("Il y a eu une erreur lors de ce sujet annulation de l'abonnement.");

            return $this->redirect($this->referer());
        }
    }
}

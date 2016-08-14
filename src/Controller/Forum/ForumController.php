<?php
namespace App\Controller\Forum;

use App\Controller\AppController;
use App\Event\Forum\Reader;
use App\Event\Forum\Statistics;
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Event\Event;
use \Michelf\MarkdownExtra;



class ForumController extends AppController
{

    /**
     * Helpers.
     *
     * @var array
     */
    public $helpers = [
        'Forum'
    ];

    /**
     * BeforeFilter handle.
     *
     * @param Event $event The beforeFilter event that was fired.
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Auth->allow(['index', 'categories', 'threads']);
    }

    /**
     * Index page.
     *
     * @return \Cake\Network\Response
     */
    public function index()
    {
        $this->loadModel('ForumCategories');

        $categories = $this->ForumCategories
            ->find('threaded')
            ->contain([
                'LastPost',
                'LastPost.Users' => function ($q) {
                    return $q->find('short');
                },
                'LastPost.ForumThreads' => function ($q) {
                    return $q->select(['id', 'title']);
                }
            ])
            ->order(['ForumCategories.lft' => 'ASC']);


            if ($this->Auth->User('id')) {
                     foreach ($categories as $category) {
                         $this->eventManager()->attach(new Reader());
                         $read = new Event('Reader.Category', $this, [
                             'user_id' => $this->Auth->User('id'),
                             'category' => $category,
                             'descendants' => $category->children
                         ]);
                         $this->eventManager()->dispatch($read);
                     }
                 }


        $this->set(compact('categories'));
    }

    /**
     * Display all sub-categories and all threads for this category.
     *
     * @return \Cake\Network\Response
     */
    public function categories()
    {
        $this->loadModel('ForumCategories');

        $category = $this->ForumCategories
            ->find()
            ->contain([
                'ParentForumCategories',
                'ChildForumCategories'
            ])
            ->where([
                'ForumCategories.id' => $this->request->id
            ])
            ->first();

        //Check if the category is found.
        if (empty($category)) {
            $this->Flash->error('Cette catégorie n\'existe pas ou a été supprimée.');

            return $this->redirect(['action' => 'index']);
        }

        $this->loadModel('ForumThreads');
        $this->paginate = [
            'maxLimit' => Configure::read('Forum.Categories.threads_per_page')
        ];

        //Threads.
        $threads = $this->ForumThreads
            ->find()
            ->contain([
                'Users' => function ($q) {
                    return $q->find('short');
                },
                'LastPostUsers' => function ($q) {
                    return $q->find('short');
                },
                'LastPosts'
            ])
            ->where([
                'ForumThreads.category_id' => $category->id,
                'ForumThreads.thread_open !=' => 2
            ])
            ->order([
                'ForumThreads.sticky' => 'DESC',
                'ForumThreads.last_post_date' => 'DESC'
            ]);

        $threads = $this->paginate($threads);

        //Categories.
        $categories = $this->ForumCategories
            ->find('children', ['for' => $this->request->id])
            ->find('threaded')
            ->contain([
                'LastPost',
                'LastPost.Users' => function ($q) {
                    return $q->find('short');
                },
                'LastPost.ForumThreads' => function ($q) {
                    return $q->select(['id', 'title']);
                }
            ]);

        //Check if all thread and childs thread are readed
        if ($this->Auth->User('id')) {
            $this->eventManager()->attach(new Reader());
            $event = new Event('Reader.Category', $this, [
                'user_id' => $this->Auth->User('id'),
                'category' => $category,
                'descendants' => $category->child_forum_categories
            ]);
            $this->eventManager()->dispatch($event);
        }

        //Breadcrumbs.
        $breadcrumbs = $this->ForumCategories->find('path', ['for' => $category->id])->toArray();
        array_pop($breadcrumbs);

        $this->set(compact('category', 'threads', 'breadcrumbs', 'categories'));
    }

    /**
     * Dispay a thread and all its posts.
     *
     * @return \Cake\Network\Response
     */
    public function threads()
    {
        $this->loadModel('ForumThreads');

        $thread = $this->ForumThreads
            ->find()
            ->contain([
                'FirstPosts',
                'FirstPosts.Users' => function ($q) {
                    return $q->find('full')->formatResults(function ($users) {
                        return $users->map(function ($user) {
                           // $user->online = $this->SessionsActivity->getOnlineStatus($user);
                            return $user;
                        });
                    });
                },
                'FirstPosts.LastEditUsers' => function ($q) {
                    return $q->find('short');
                },
                'FirstPosts.ForumPostsLikes' => function ($q) {
                    return $q->where([
                        'ForumPostsLikes.user_id' => $this->Auth->user('id')
                    ]);
                }
            ])
            ->where([
                'ForumThreads.id' => $this->request->id
            ])
            ->first();

        //Check if the thread is found.
        if (empty($thread)) {
            $this->Flash->error('Ce sujet n\'existe pas ou a été supprimé.');

            return $this->redirect(['action' => 'index']);
        }

        //Paginate Posts
        $this->loadModel('ForumPosts');
        $this->paginate = [
            'maxLimit' => Configure::read('Forum.Threads.posts_per_page')
        ];

        $posts = $this->ForumPosts
            ->find()
            ->contain([
                'Users' => function ($q) {
                    return $q->find('full')->formatResults(function ($users) {
                        return $users->map(function ($user) {
                            //$user->online = $this->SessionsActivity->getOnlineStatus($user);
                            return $user;
                        });
                    });
                },
                'LastEditUsers' => function ($q) {
                    return $q->find('short');
                },
                'ForumPostsLikes' => function ($q) {
                    return $q->where([
                        'ForumPostsLikes.user_id' => $this->Auth->user('id')
                    ]);
                }
            ])
            ->where([
                'ForumPosts.thread_id' => $thread->id,
                'ForumPosts.id !=' => $thread->first_post->id
            ])
            ->order([
                'ForumPosts.created' => 'ASC'
            ]);

        $posts = $this->paginate($posts);

        $this->loadModel('ForumCategories');

        //Breadcrumbs.
        $breadcrumbs = $this->ForumCategories->find('path', ['for' => $thread->category_id])->toArray();

        //Categories list.
        $categories = $this->ForumCategories
            ->find('treeList', [
                'spacer' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
            ])
            ->toArray();

        //Build the newEntity for the comment form.
        $postForm = $this->ForumPosts->newEntity();

        //Increment the Views Counter.
        $thread->view_count++;
        $this->ForumThreads->save($thread);

        //Current user.
        $this->loadModel('Users');
        $currentUser = $this->Users
            ->find()
            ->contain([
                'ForumThreadsFollowers' => function ($q) use ($thread) {
                    return $q->where(['thread_id' => $thread->id])
                        ->select(['id', 'user_id', 'thread_id']);
                }
            ])
            ->where([
                'Users.id' => $this->Auth->user('id')
            ])
            ->select(['id', 'group_id', 'is_admin', 'is_staff', 'is_modo'])
            ->first();

        // Mark as read
        if ($this->Auth->User('id')) {
            $this->eventManager()->attach(new Reader());
            $event = new Event('Reader.Thread', $this, [
                'user_id' => $this->Auth->User('id'),
                'thread_id' => $thread->id,
                'category_id' => $thread->category_id
            ]);
            $this->eventManager()->dispatch($event);

            $this->loadModel('ForumCategories');

            $category = $this->ForumCategories
                ->find()
                ->contain([
                    'ChildForumCategories'
                ])
                ->where([
                    'ForumCategories.id' => $thread->category_id
                ])
                ->first();

            $this->eventManager()->attach(new Reader());
            $event = new Event('Reader.Category', $this, [
                'user_id' => $this->Auth->User('id'),
                'category' => $category,
                'descendants' => $category->child_forum_categories
            ]);
            $this->eventManager()->dispatch($event);
        }
        $parser = new MarkdownExtra;

        $this->set(compact('thread', 'breadcrumbs', 'posts', 'postForm', 'categories', 'currentUser', 'parser'));
    }
}

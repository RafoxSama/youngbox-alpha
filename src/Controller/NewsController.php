<?php
namespace App\Controller;

use App\Event\Badges;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Cache\Cache;
use \Michelf\MarkdownExtra;


/**
 * News Controller
 *
 * @property \App\Model\Table\NewsTable $News
 */
class NewsController extends AppController
{

  public function index()
  {
    
      $this->loadModel('NewsArticles');

      $this->paginate = [
          'maxLimit' => Configure::read('News.article_per_page')
      ];

      $articles = $this->NewsArticles
          ->find()
          ->contain([
              'NewsTags',
              'NewsCategories',
              'Users' => function ($q) {
                  return $q->find('short');
              }
          ])
          ->order([
              'NewsArticles.created' => 'desc'
          ])
          ->where([
              'NewsArticles.is_display' => 1
          ]);

      $articles = $this->paginate($articles);

      $this->set(compact('articles'));
  }

  public function article()
  {
    $this->loadModel('NewsArticles');

    $article = $this->NewsArticles
        ->find('slug', [
            'slug' => $this->request->slug,
            'slugField' => 'NewsArticles.slug'
        ])
        ->contain([
            'NewsCategories',
            'NewsTags',
            'Users' => function ($q) {
                    return $q->find('full');
            }
        ])
        ->where([
            'NewsArticles.is_display' => 1
        ])
        ->first();

    //Check if the article is found.
    if (empty($article)) {
        $this->Flash->error(__('This article doesn\'t exist or has been deleted.'));

        return $this->redirect(['action' => 'index']);
    }

    $this->loadModel('NewsComments');

    //A comment has been posted.
    if ($this->request->is('post')) {
        //Check if the user is connected.
        if (!$this->Auth->user()) {
            return $this->Flash->error(__('You must be connected to post a comment.'));
        }

        $this->request->data['article_id'] = $article->id;
        $this->request->data['user_id'] = $this->Auth->user('id');

        $newComment = $this->NewsComments->newEntity($this->request->data, ['validate' => 'create']);

        //Attach Event.
        $this->NewsComments->eventManager()->attach(new Badges($this));

        if ($insertComment = $this->NewsComments->save($newComment)) {
            $this->Flash->success(__('Your comment has been posted successfully !'));
            //Redirect the user to the last page of the article.
            $this->redirect([
                'action' => 'article',
                'slug' => $article->slug,
                'id' => $article->id
            ]);
        }
    }

    //Paginate all comments related to the article.
    $this->paginate = [
        'maxLimit' => Configure::read('News.comment_per_page')
    ];

    $comments = $this->NewsComments
        ->find()
        ->where([
            'article_id' => $article->id
        ])
        ->contain([
            'Users' => function ($q) {
                return $q->find('medium');
            }
        ])
        ->order([
            'NewsComments.created' => 'desc'
        ]);

    $comments = $this->paginate($comments);

    //Build the newEntity for the comment form.
    $formComments = $this->NewsComments->newEntity();

    //Current user.
    $this->loadModel('Users');
    $currentUser = $this->Users
        ->find()
        ->where([
            'Users.id' => $this->Auth->user('id')
        ])
        ->select(['id', 'group_id', 'is_admin', 'is_staff', 'is_modo'])
        ->first();
        $parser = new MarkdownExtra;

    $this->set(compact('article', 'formComments', 'comments', 'currentUser', 'parser'));
  }
  public function category()
  {
    $this->loadModel('NewsCategories');
    $category = $this->NewsCategories
        ->find('slug', [
            'slug' => $this->request->slug,
            'slugField' => 'NewsCategories.slug'
        ])
        ->contain([
            'NewsArticles'
        ])
        ->first();

    //Check if the category is found.
    if (empty($category)) {
        $this->Flash->error("Cette catégorie n'existe pas ou a été supprimée !");

        return $this->redirect(['action' => 'index']);
    }


    $this->loadModel('NewsTags');
    $tags = $this->NewsTags
        ->find()
        ->where([
            'NewsTags.category_id' => $category->id
        ]);

    //Paginate all Articles.
    $this->loadModel('NewsArticles');
    $this->paginate = [
        'maxLimit' => Configure::read('News.article_per_page')
    ];

    $articles = $this->NewsArticles
        ->find()
        ->contain([
            'NewsTags',
            'Users' => function ($q) {
                return $q->find('short');
            }
        ])
        ->where([
            'NewsArticles.category_id' => $category->id,
            'NewsArticles.is_display' => 1
        ])
        ->order([
            'NewsArticles.created' => 'desc'
        ]);

    $articles = $this->paginate($articles);

    $this->set(compact('category', 'articles', 'tags'));
  }
  public function tag()
  {
    $this->loadModel('NewsTags');

    $tag = $this->NewsTags
        ->find()
        ->where([
            'NewsTags.id' => $this->request->id
        ])
        ->first();
        //debug($tag);
    //Check if the category is found.
    if (empty($tag)) {
        $this->Flash->error(__('This Tag doesn\'t exist or has been deleted.'));

        return $this->redirect(['action' => 'index']);
    }

    $this->loadModel('NewsCategories');
    $category = $this->NewsCategories
                ->find()
                ->where([
                    'NewsCategories.id' => $tag->category_id
                ])
                ->first();
        //debug($category);


        //Paginate all Articles.
      //  $this->loadModel('BlogArticlesTags');
        $this->loadModel('NewsArticles');
        $this->paginate = [
            'maxLimit' => Configure::read('News.article_per_page')
        ];

        $articles = $this->NewsArticles
            ->find()
            ->contain([
                'NewsTags',
                'Users' => function ($q) {
                    return $q->find('short');
                },
            ])
            ->matching('NewsTags')
            ->where([
                'NewsTags.id' => $tag->id,
                'NewsArticles.is_display' => 1
            ])
            ->order([
                'NewsArticles.created' => 'desc'
            ]);

        $articles = $this->paginate($articles);
      //  debug($articles);
        $this->set(compact('tag', 'category', 'articles'));
  }



  public function deleteComment($id = null)
      {
          $this->loadModel('NewsComments');
          $comment = $this->NewsComments
              ->find()
              ->contain([
                  'NewsArticles'
              ])
              ->where([
                  'NewsComments.id' => $id
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
          if ($this->NewsComments->delete($comment)) {
              $this->Flash->success(__("This comment has been deleted successfully !"));
          }
          return $this->redirect(['_name' => 'news-article', 'slug' => $comment->news_article->slug, 'id' => $comment->news_article->id, '?' => ['page' => $comment->news_article->last_page]]);
      }


}

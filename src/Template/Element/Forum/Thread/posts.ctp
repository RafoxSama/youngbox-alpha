

<?php if ($firstPost === true): ?>

<?php endif; ?>
<div class="ui grid">


<div class="column forum-avatar-container hidden-sm hidden-xs">
  <a href="<?= $this->Url->build(['_name' => 'users-profile', 'slug' => $post->user->slug, 'id' => $post->user->id, 'prefix' => false]); ?>" class="forum-avatar">
    <img src="<?= $post->user->avatar ?>" alt="<?= $post->user->id ?>">
  </a>
</div>
<div class="column forum-content-post">
  <div class="ui segment">
    <a class="forum-post_author"><?= $post->user->username ?></a>
    <span class="post-date" data-datetime="<?= date("c", strtotime($post->created)); ?>">
      ,
    </span>


    <?php if (($this->request->session()->read('Auth.User.id') == $post->user->id) || (!is_null($currentUser) && ($currentUser->is_admin || $currentUser->is_staff || $currentUser->is_modo))): ?>
        -
        <?= $this->Html->link('Editer', ['_name' => 'posts-edit', 'id' => $post->id], ['class' => 'btn-editPost', 'escape' => false]) ?>

    <?php endif; ?>
    <?php if (($firstPost === false) && (($this->request->session()->read('Auth.User.id') == $post->user->id) ||( (!is_null($currentUser)) && ($currentUser->is_admin || $currentUser->is_staff || $currentUser->is_modo))) ): ?>

           -
            <?= $this->Html->link('Supprimer', ['_name' => 'posts-delete', 'id' => $post->id], ['class' => 'delete-danger', 'escape' => false]) ?>

    <?php endif; ?>



<?php if ((!is_null($currentUser)) ): ?>
  <div class="actions-like right hidden-xs">
          <?php if (!empty($post->forum_posts_likes)): ?>

              <a data-id="<?= $post->id ?>" data-like-count="<?= $post->like_count ?>" data-toggle="tooltip" data-type="unlike" data-url="<?= $this->Url->build(['controller' => 'posts', 'action' => 'unlike']); ?>" class="ui active button compact labeled icon LikePost-btn likeCounter-<?= $post->id ?>">
                <i class="heart red icon"></i>
                <span class="likeCounter-<?= $post->id ?>-text">
                <?= $post->like_count ?>
              </span>
              </a>
          <?php else: ?>

            <a data-id="<?= $post->id ?>" data-like-count="<?= $post->like_count ?>" data-toggle="tooltip" data-type="like" data-url="<?= $this->Url->build(['controller' => 'posts', 'action' => 'like']); ?>" class="ui compact labeled icon button LikePost-btn likeCounter-<?= $post->id ?>">
              <i class="red heart icon"></i>
              <span class="likeCounter-<?= $post->id ?>-text">
              <?= $post->like_count ?>
              </span>
            </a>
          <?php endif; ?>
  </div>
<?php endif; ?>



    <div class="ui divider"></div>
      <?= $parser->transform($post->message); ?>
  </div>
</div>
</div>






<?php if ($firstPost === true): ?>
  <div class="ui grid stackable">


  <div class="eight wide column">
  <h4 class="reply-forum-count">
      <?= h($thread->reply_count) ?> Réponses
  </h4>
  </div>
  <div class="eight wide column">



  <div class="right">
      <ul class="blue ui buttons">
          <?php if ($this->Paginator->hasPrev()): ?>
              <?= $this->Paginator->prev('«'); ?>
          <?php endif; ?>
          <?= $this->Paginator->numbers(['modulus' => 5]); ?>
          <?php if ($this->Paginator->hasNext()): ?>
              <?= $this->Paginator->next('»'); ?>
          <?php endif; ?>
      </ul>
  </div>
</div>
  </div>
    <article style="display:none;" role="ads">
        <div class="panel threadAds">
            <div class="panel-heading">
                <h4>
                    <?= __('Advertising') ?>
                </h4>
            </div>
        </div>
    </article>
<?php endif; ?>

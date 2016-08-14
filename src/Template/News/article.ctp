<div class="header header-mirror post-header" style="background-image:url(<?= $article->postheader ?>);">
<div class="ui container">
<a class="post-author" href="#"><img src="<?= $article->user->avatar ?>" alt="1">
  <span><?= $article->user->username ?></span>
</a>
</div>
</div>
<div class="article">
<div class="ui container">
  <h1 class="title">
          <?= $article->title ?>
        </h1>
        <div class="meta news-meta">
          <span class="news-date" data-date="<?= date("c", strtotime($article->created)); ?>">
                  Posté le
                </span> -
                <span class="">
                  <a href="/blog/category/high-tech"><?= $article->news_category->title ?></a>
                </span>
        </div>
  <div class="ui divider"></div>
  <div class="formatted">
    <?= $parser->transform($article->content); ?>
  </div>
  <div class="ui divider"></div>
  <h4 class="title title-small">
      <?= $article->comment_count ?> Commentaires
    </h4>

    <?php if ($this->request->session()->read('Auth.User')): ?>
    <section class="ui form post-comment-form" id="comment-form">

    <?= $this->Form->create($formComments) ?>
    <div class="field">
        <?=
        $this->Form->input(
            'content', [
                'label' => false,
                'class' => 'form-control commentBox',
                'id' => 'commentBox',
                'placeholder' => 'Votre commentaire...'
            ]
        ) ?>
    </div>
    <div class="ui grid stackable">
      <div class="sixteen wide column">

        <?= $this->Form->submit('Envoyer', ['class' => 'ui primary button right']); ?>
      </div>

    </div>
    <?= $this->Form->end(); ?>
    </section>
  <?php endif; ?>
  <?php foreach ($comments as $comment): ?>

  <div class="ui segment">
    <div class="ui grid">
      <div class="one wide column hidden-sm hidden-xs">
        <a href="/users/profile/rafox.1" class="comment-avatar">
            <img src="<?= $comment->user->avatar ?>" alt="1">
          </a>
      </div>
      <div class="fifteen wide column">
        <div class="comment-body">
  <a class="comment-author" href="/profil/101109"><?= $comment->user->username ?></a>, <span class="lastMessagetime" data-datetime="<?= date("c", strtotime($comment->created)); ?>"></span>
  <?php if (($this->request->session()->read('Auth.User.id') == $comment->user->id) || (!is_null($currentUser) && ($currentUser->is_admin || $currentUser->is_staff || $currentUser->is_modo))): ?>
  - <a class="comment-edit" href="#">Editer</a> - <a class="comment-delete" href="<?= $this->Url->build([
      'action' => 'deleteComment',
      $comment->id
  ]); ?>">Supprimer</a>
  <?php endif; ?>

        <div class="comment-message">
          <div class="restform">
            <?= $comment->content ?>
          </div>
        </div>


                    </div>
      </div>

    </div>
  </div>
<?php endforeach; ?>
<div class="blue ui buttons">
  <?php if ($this->Paginator->hasPrev()): ?>
      <?= $this->Paginator->prev('«'); ?>
  <?php endif; ?>
  <?= $this->Paginator->numbers(['modulus' => 5]); ?>
  <?php if ($this->Paginator->hasNext()): ?>
      <?= $this->Paginator->next('»'); ?>
  <?php endif; ?>
</div>
</div>
</div>

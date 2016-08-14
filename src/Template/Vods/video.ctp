<div class="player">
  <div class="ui container ui-player">
    <div class="player-container">
      <iframe class="player-compact" src="https://www.youtube.com/embed/<?= $video->videolink ?>" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>
</div>
<div class="header-top">
  <div class="ui container">


  </div>

</div>
<div class="video-comments">
  <div class="ui container">
  <h4 class="title title-small">
      <?= $video->comment_count ?> Commentaires
    </h4>






    <?php if ($this->request->session()->read('Auth.User')): ?>
    <section class="ui form" id="comment-form">

    <?= $this->Form->create() ?>
    <div class="field">
        <?=
        $this->Form->textarea(
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

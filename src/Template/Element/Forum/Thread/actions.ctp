<div class="right action-topic">
    <?php if ($thread->thread_open == true): ?>


        <a href="<?= $this->Url->build(['controller' => 'threads', 'action' => 'reply', 'id' => $thread->id, 'slug' => $thread->title]); ?>" class="ui labeled icon button"><i class="comments icon"></i>Répondre</a>

        <?php if (($this->request->session()->read('Auth.User.id') == $thread->user_id) || (!is_null($currentUser) && ($currentUser->is_admin || $currentUser->is_staff || $currentUser->is_modo))): ?>
          <a href="<?= $this->Url->build(['_name' => 'threads-lock', 'id' => $thread->id, 'slug' => $thread->title]); ?>" class="ui labeled red icon button"><i class="unlock alternate icon"></i> Verrouiller</a>
        <?php endif; ?>
    <?php else: ?>
        <button class="ui labeled red active icon button"><i class="lock icon"></i>Verrouillé</button>

        <?php if (($this->request->session()->read('Auth.User.id') == $thread->user_id) || (!is_null($currentUser) && ($currentUser->is_admin || $currentUser->is_staff || $currentUser->is_modo))): ?>
          <a href="<?= $this->Url->build(['_name' => 'threads-unlock', 'id' => $thread->id, 'slug' => $thread->title]); ?>" class="ui labeled olive icon button"><i class="unlock icon"></i> Déverouiller</a>
        <?php endif; ?>
    <?php endif; ?>
  <?php if ((!is_null($currentUser) && ($currentUser->is_admin || $currentUser->is_staff || $currentUser->is_modo))): ?>
    <a href="<?= $this->Url->build(['_name' => 'posts-edit', 'id' => $thread->first_post_id]); ?>" class="ui labeled blue icon button"><i class="write icon"></i>Editer</a>
  <?php endif; ?>

    <?php if (empty($currentUser->forum_threads_followers)): ?>
      <a href="<?= $this->Url->build(['_name' => 'threads-follow', 'id' => $thread->id, 'slug' => $thread->title]); ?>" class="ui labeled orange icon button"><i class="rss icon"></i>Suivre</a>
    <?php else: ?>
      <a href="<?= $this->Url->build(['_name' => 'threads-unfollow', 'id' => $thread->id, 'slug' => $thread->title]); ?>" class="ui labeled orange active icon button"><i class="rss icon"></i>Se désabonner</a>
    <?php endif; ?>


</div>

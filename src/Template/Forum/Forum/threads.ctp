<div class="header-top">
  <div class="ui container">
    <div class="ui grid stackable">
      <div class="eight wide column">
        <h2 class="page-title"><?= $thread->title ?></h2>
      </div>
    </div>
  </div>
</div>
<div class="forum-breadcrumb">


<div class="ui container">
  <div class="ui breadcrumb">
     <a class="section"><i class="home icon"></i></a>
    <div class="divider"> / </div>
    <?php foreach ($breadcrumbs as $breadcrumb): ?>
      <?php if (!empty($breadcrumb->parent_id)): ?>
     <a href="<?= $this->Url->build(['_name' => 'forum-categories', 'id' => $breadcrumb->id, 'slug' => $breadcrumb->title]); ?>" class="section"><?= $breadcrumb->title ?></a>
    <div class="divider"> / </div>
    <?php endif; ?>
    <?php endforeach; ?>

    <div class="active section"><?= h($thread->title) ?></div>
  </div>
</div>
</div>

<div class="ui container pt">

              <!-- Actions -->
              <div class="ui grid stackable">
                <div class="sixteen wide column">
                  <?= $this->element('Forum/Thread/actions', [
                      'thread' => $thread
                  ]) ?>
                </div>

              </div>


                <!-- Polls -->
                <!-- Disabled until the polls system is done -->
                <?php //echo $this->element('Forum\Thread\polls') ?>

                <!-- First Post -->
                <?= $this->element('Forum/Thread/posts', [
                    'thread' => $thread,
                    'post' => $thread->first_post,
                    'firstPost' => true
                ]); ?>

                <!-- All Posts -->
                <?php if (!empty($posts)): ?>
                    <?php foreach ($posts as $post): ?>
                        <?= $this->element('Forum/Thread/posts', [
                            'post' => $post,
                            'thread' => $thread,
                            'firstPost' => false
                        ]); ?>
                    <?php endforeach; ?>
                <?php endif; ?>



                <!-- Reply -->
                <?= $this->element('Forum/Thread/reply', [
                    'thread' => $thread

                  ]) ?>


    </div>



<div class="header-top">
  <div class="ui container">
    <div class="ui grid stackable">
      <div class="eight wide column">
        <h2 class="page-title"><?= $category->title ?></h2>
        <p class="text-title"><?= $category->description ?></p>
      </div>
      <div class="eight wide column search-forum">
        <?php if (
            $category->category_open == true ): ?>
            <div class="right m-hidden">
            <a class="ui positive labeled icon button" href="<?= $this->Url->build(['_name' => 'threads-create', 'id' => $category->id, 'slug' => $category->title]); ?>"><i class="write icon"></i>Nouveau sujet</a>
          </div>
    	<?php endif; ?>
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
     <a href="<?= $this->Url->build(['_name' => 'forum-categories', 'id' => $breadcrumb->id, 'slug' => $breadcrumb->title]); ?>" class="section">$breadcrumb->title</a>
    <div class="divider"> / </div>
    <?php endif; ?>
    <?php endforeach; ?>

    <div class="active section"><?= h($category->title) ?></div>
  </div>
</div>
</div>
<div class="ui container pt">


                <?= $this->element('Forum/Category/actions', [
                    'category' => $category
                ]) ?>

                <?php if (!empty($category->child_forum_categories)): ?>
                    <?= $this->element('Forum/categories', [
                        'category' => $category,
                        'forums' => $categories
                    ]) ?>
                <?php endif; ?>

                <?= $this->element('Forum/Category/threads', [
                    'threads' => $threads
                ]) ?>


    </div>

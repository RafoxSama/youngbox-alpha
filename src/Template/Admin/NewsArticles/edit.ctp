<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $newsArticle->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $newsArticle->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List News Articles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List News Categories'), ['controller' => 'NewsCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New News Category'), ['controller' => 'NewsCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List News Tags'), ['controller' => 'NewsTags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New News Tag'), ['controller' => 'NewsTags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="newsArticles form large-9 medium-8 columns content">
    <?= $this->Form->create($newsArticle) ?>
    <fieldset>
        <legend><?= __('Edit News Article') ?></legend>
        <?php
            echo $this->Form->input('category_id', ['options' => $newsCategories]);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('title');
            echo $this->Form->input('content');
            echo $this->Form->input('slug');
            echo $this->Form->input('comment_count');
            echo $this->Form->input('like_count');
            echo $this->Form->input('is_display');
            echo $this->Form->input('thumb');
            echo $this->Form->input('postheader');
            echo $this->Form->input('news_tags._ids', ['options' => $newsTags]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

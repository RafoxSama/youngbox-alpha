<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List News Tags'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List News Articles'), ['controller' => 'NewsArticles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New News Article'), ['controller' => 'NewsArticles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="newsTags form large-9 medium-8 columns content">
    <?= $this->Form->create($newsTag) ?>
    <fieldset>
        <legend><?= __('Add News Tag') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('category_id');
            echo $this->Form->input('slug');
            echo $this->Form->input('class');
            echo $this->Form->input('article_count');
            echo $this->Form->input('news_articles._ids', ['options' => $newsArticles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

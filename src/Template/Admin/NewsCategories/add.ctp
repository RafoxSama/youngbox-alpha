<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List News Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List News Articles'), ['controller' => 'NewsArticles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New News Article'), ['controller' => 'NewsArticles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List News Tags'), ['controller' => 'NewsTags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New News Tag'), ['controller' => 'NewsTags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="newsCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($newsCategory) ?>
    <fieldset>
        <legend><?= __('Add News Category') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('slug');
            echo $this->Form->input('class');
            echo $this->Form->input('icon');
            echo $this->Form->input('article_count');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

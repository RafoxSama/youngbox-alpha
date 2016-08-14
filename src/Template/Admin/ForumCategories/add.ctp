<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Forum Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Forum Categories'), ['controller' => 'ForumCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Forum Category'), ['controller' => 'ForumCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Last Post'), ['controller' => 'ForumPosts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Last Post'), ['controller' => 'ForumPosts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Forum Threads'), ['controller' => 'ForumThreads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Forum Thread'), ['controller' => 'ForumThreads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="forumCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($forumCategory) ?>
    <fieldset>
        <legend><?= __('Add Forum Category') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('category_open');
            echo $this->Form->input('thread_count');
            echo $this->Form->input('last_post_id', ['options' => $lastPost]);
            echo $this->Form->input('parent_id', ['options' => $parentForumCategories, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

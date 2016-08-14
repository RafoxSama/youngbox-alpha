<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $draft->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $draft->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Drafts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="drafts form large-9 medium-8 columns content">
    <?= $this->Form->create($draft) ?>
    <fieldset>
        <legend><?= __('Edit Draft') ?></legend>
        <?php
            echo $this->Form->input('category_id');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('title');
            echo $this->Form->input('content');
            echo $this->Form->input('slug');
            echo $this->Form->input('comment_count');
            echo $this->Form->input('like_count');
            echo $this->Form->input('is_display');
            echo $this->Form->input('thumb');
            echo $this->Form->input('postheader');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

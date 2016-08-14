<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Draft'), ['action' => 'edit', $draft->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Draft'), ['action' => 'delete', $draft->id], ['confirm' => __('Are you sure you want to delete # {0}?', $draft->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Drafts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Draft'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="drafts view large-9 medium-8 columns content">
    <h3><?= h($draft->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $draft->has('user') ? $this->Html->link($draft->user->id, ['controller' => 'Users', 'action' => 'view', $draft->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($draft->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Slug') ?></th>
            <td><?= h($draft->slug) ?></td>
        </tr>
        <tr>
            <th><?= __('Thumb') ?></th>
            <td><?= h($draft->thumb) ?></td>
        </tr>
        <tr>
            <th><?= __('Postheader') ?></th>
            <td><?= h($draft->postheader) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($draft->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Category Id') ?></th>
            <td><?= $this->Number->format($draft->category_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Comment Count') ?></th>
            <td><?= $this->Number->format($draft->comment_count) ?></td>
        </tr>
        <tr>
            <th><?= __('Like Count') ?></th>
            <td><?= $this->Number->format($draft->like_count) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Display') ?></th>
            <td><?= $this->Number->format($draft->is_display) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($draft->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($draft->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($draft->content)); ?>
    </div>
</div>

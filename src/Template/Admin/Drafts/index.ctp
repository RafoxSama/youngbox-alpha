<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Draft'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="drafts index large-9 medium-8 columns content">
    <h3><?= __('Drafts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('slug') ?></th>
                <th><?= $this->Paginator->sort('comment_count') ?></th>
                <th><?= $this->Paginator->sort('like_count') ?></th>
                <th><?= $this->Paginator->sort('is_display') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('thumb') ?></th>
                <th><?= $this->Paginator->sort('postheader') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($drafts as $draft): ?>
            <tr>
                <td><?= $this->Number->format($draft->id) ?></td>
                <td><?= $this->Number->format($draft->category_id) ?></td>
                <td><?= $draft->has('user') ? $this->Html->link($draft->user->id, ['controller' => 'Users', 'action' => 'view', $draft->user->id]) : '' ?></td>
                <td><?= h($draft->title) ?></td>
                <td><?= h($draft->slug) ?></td>
                <td><?= $this->Number->format($draft->comment_count) ?></td>
                <td><?= $this->Number->format($draft->like_count) ?></td>
                <td><?= $this->Number->format($draft->is_display) ?></td>
                <td><?= h($draft->created) ?></td>
                <td><?= h($draft->modified) ?></td>
                <td><?= h($draft->thumb) ?></td>
                <td><?= h($draft->postheader) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $draft->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $draft->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $draft->id], ['confirm' => __('Are you sure you want to delete # {0}?', $draft->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

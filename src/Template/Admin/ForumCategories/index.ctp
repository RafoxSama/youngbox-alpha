<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Forum Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Last Post'), ['controller' => 'ForumPosts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Last Post'), ['controller' => 'ForumPosts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Forum Threads'), ['controller' => 'ForumThreads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Forum Thread'), ['controller' => 'ForumThreads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="forumCategories index large-9 medium-8 columns content">
    <h3><?= __('Forum Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('category_open') ?></th>
                <th><?= $this->Paginator->sort('thread_count') ?></th>
                <th><?= $this->Paginator->sort('last_post_id') ?></th>
                <th><?= $this->Paginator->sort('parent_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($forumCategories as $forumCategory): ?>
            <tr>
                <td><?= $this->Number->format($forumCategory->id) ?></td>
                <td><?= h($forumCategory->title) ?></td>
                <td><?= $this->Number->format($forumCategory->category_open) ?></td>
                <td><?= $this->Number->format($forumCategory->thread_count) ?></td>
                <td><?= $forumCategory->has('last_post') ? $this->Html->link($forumCategory->last_post->id, ['controller' => 'ForumPosts', 'action' => 'view', $forumCategory->last_post->id]) : '' ?></td>
                <td><?= $forumCategory->has('parent_forum_category') ? $this->Html->link($forumCategory->parent_forum_category->title, ['controller' => 'ForumCategories', 'action' => 'view', $forumCategory->parent_forum_category->id]) : '' ?></td>
                <td><?= h($forumCategory->created) ?></td>
                <td><?= h($forumCategory->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $forumCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $forumCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $forumCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forumCategory->id)]) ?>
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

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Forum Category'), ['action' => 'edit', $forumCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Forum Category'), ['action' => 'delete', $forumCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forumCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Forum Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Forum Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Forum Categories'), ['controller' => 'ForumCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Forum Category'), ['controller' => 'ForumCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Last Post'), ['controller' => 'ForumPosts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Last Post'), ['controller' => 'ForumPosts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Forum Threads'), ['controller' => 'ForumThreads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Forum Thread'), ['controller' => 'ForumThreads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="forumCategories view large-9 medium-8 columns content">
    <h3><?= h($forumCategory->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($forumCategory->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Post') ?></th>
            <td><?= $forumCategory->has('last_post') ? $this->Html->link($forumCategory->last_post->id, ['controller' => 'ForumPosts', 'action' => 'view', $forumCategory->last_post->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Parent Forum Category') ?></th>
            <td><?= $forumCategory->has('parent_forum_category') ? $this->Html->link($forumCategory->parent_forum_category->title, ['controller' => 'ForumCategories', 'action' => 'view', $forumCategory->parent_forum_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($forumCategory->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Category Open') ?></th>
            <td><?= $this->Number->format($forumCategory->category_open) ?></td>
        </tr>
        <tr>
            <th><?= __('Thread Count') ?></th>
            <td><?= $this->Number->format($forumCategory->thread_count) ?></td>
        </tr>
        <tr>
            <th><?= __('Lft') ?></th>
            <td><?= $this->Number->format($forumCategory->lft) ?></td>
        </tr>
        <tr>
            <th><?= __('Rght') ?></th>
            <td><?= $this->Number->format($forumCategory->rght) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($forumCategory->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($forumCategory->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($forumCategory->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Forum Categories') ?></h4>
        <?php if (!empty($forumCategory->child_forum_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Category Open') ?></th>
                <th><?= __('Thread Count') ?></th>
                <th><?= __('Last Post Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Lft') ?></th>
                <th><?= __('Rght') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($forumCategory->child_forum_categories as $childForumCategories): ?>
            <tr>
                <td><?= h($childForumCategories->id) ?></td>
                <td><?= h($childForumCategories->title) ?></td>
                <td><?= h($childForumCategories->description) ?></td>
                <td><?= h($childForumCategories->category_open) ?></td>
                <td><?= h($childForumCategories->thread_count) ?></td>
                <td><?= h($childForumCategories->last_post_id) ?></td>
                <td><?= h($childForumCategories->parent_id) ?></td>
                <td><?= h($childForumCategories->lft) ?></td>
                <td><?= h($childForumCategories->rght) ?></td>
                <td><?= h($childForumCategories->created) ?></td>
                <td><?= h($childForumCategories->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ForumCategories', 'action' => 'view', $childForumCategories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ForumCategories', 'action' => 'edit', $childForumCategories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ForumCategories', 'action' => 'delete', $childForumCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childForumCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Forum Threads') ?></h4>
        <?php if (!empty($forumCategory->forum_threads)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Reply Count') ?></th>
                <th><?= __('View Count') ?></th>
                <th><?= __('Thread Open') ?></th>
                <th><?= __('Sticky') ?></th>
                <th><?= __('First Post Id') ?></th>
                <th><?= __('Last Post Date') ?></th>
                <th><?= __('Last Post Id') ?></th>
                <th><?= __('Last Post User Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($forumCategory->forum_threads as $forumThreads): ?>
            <tr>
                <td><?= h($forumThreads->id) ?></td>
                <td><?= h($forumThreads->category_id) ?></td>
                <td><?= h($forumThreads->user_id) ?></td>
                <td><?= h($forumThreads->title) ?></td>
                <td><?= h($forumThreads->reply_count) ?></td>
                <td><?= h($forumThreads->view_count) ?></td>
                <td><?= h($forumThreads->thread_open) ?></td>
                <td><?= h($forumThreads->sticky) ?></td>
                <td><?= h($forumThreads->first_post_id) ?></td>
                <td><?= h($forumThreads->last_post_date) ?></td>
                <td><?= h($forumThreads->last_post_id) ?></td>
                <td><?= h($forumThreads->last_post_user_id) ?></td>
                <td><?= h($forumThreads->created) ?></td>
                <td><?= h($forumThreads->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ForumThreads', 'action' => 'view', $forumThreads->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ForumThreads', 'action' => 'edit', $forumThreads->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ForumThreads', 'action' => 'delete', $forumThreads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forumThreads->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

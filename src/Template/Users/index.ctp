<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Notifications'), ['controller' => 'Notifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Notification'), ['controller' => 'Notifications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Badges'), ['controller' => 'Badges', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Badge'), ['controller' => 'Badges', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('username') ?></th>
                <th><?= $this->Paginator->sort('password') ?></th>
                <th><?= $this->Paginator->sort('active') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('mail_token') ?></th>
                <th><?= $this->Paginator->sort('avatar') ?></th>
                <th><?= $this->Paginator->sort('facebook') ?></th>
                <th><?= $this->Paginator->sort('twitter') ?></th>
                <th><?= $this->Paginator->sort('google') ?></th>
                <th><?= $this->Paginator->sort('twitch') ?></th>
                <th><?= $this->Paginator->sort('group_id') ?></th>
                <th><?= $this->Paginator->sort('slug') ?></th>
                <th><?= $this->Paginator->sort('blog_articles_comment_count') ?></th>
                <th><?= $this->Paginator->sort('blog_article_count') ?></th>
                <th><?= $this->Paginator->sort('forum_thread_count') ?></th>
                <th><?= $this->Paginator->sort('forum_post_count') ?></th>
                <th><?= $this->Paginator->sort('forum_like_received') ?></th>
                <th><?= $this->Paginator->sort('end_subscription') ?></th>
                <th><?= $this->Paginator->sort('password_code') ?></th>
                <th><?= $this->Paginator->sort('password_code_expire') ?></th>
                <th><?= $this->Paginator->sort('password_reset_count') ?></th>
                <th><?= $this->Paginator->sort('register_ip') ?></th>
                <th><?= $this->Paginator->sort('is_deleted') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->password) ?></td>
                <td><?= $this->Number->format($user->active) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->mail_token) ?></td>
                <td><?= h($user->avatar) ?></td>
                <td><?= h($user->facebook) ?></td>
                <td><?= h($user->twitter) ?></td>
                <td><?= h($user->google) ?></td>
                <td><?= h($user->twitch) ?></td>
                <td><?= $this->Number->format($user->group_id) ?></td>
                <td><?= h($user->slug) ?></td>
                <td><?= $this->Number->format($user->blog_articles_comment_count) ?></td>
                <td><?= $this->Number->format($user->blog_article_count) ?></td>
                <td><?= $this->Number->format($user->forum_thread_count) ?></td>
                <td><?= $this->Number->format($user->forum_post_count) ?></td>
                <td><?= $this->Number->format($user->forum_like_received) ?></td>
                <td><?= h($user->end_subscription) ?></td>
                <td><?= h($user->password_code) ?></td>
                <td><?= h($user->password_code_expire) ?></td>
                <td><?= $this->Number->format($user->password_reset_count) ?></td>
                <td><?= h($user->register_ip) ?></td>
                <td><?= h($user->is_deleted) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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

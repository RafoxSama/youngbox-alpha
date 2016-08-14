<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New News Article'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List News Categories'), ['controller' => 'NewsCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New News Category'), ['controller' => 'NewsCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List News Tags'), ['controller' => 'NewsTags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New News Tag'), ['controller' => 'NewsTags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="newsArticles index large-9 medium-8 columns content">
    <h3><?= __('News Articles') ?></h3>
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
            <?php foreach ($newsArticles as $newsArticle): ?>
            <tr>
                <td><?= $this->Number->format($newsArticle->id) ?></td>
                <td><?= $newsArticle->has('news_category') ? $this->Html->link($newsArticle->news_category->title, ['controller' => 'NewsCategories', 'action' => 'view', $newsArticle->news_category->id]) : '' ?></td>
                <td><?= $newsArticle->has('user') ? $this->Html->link($newsArticle->user->id, ['controller' => 'Users', 'action' => 'view', $newsArticle->user->id]) : '' ?></td>
                <td><?= h($newsArticle->title) ?></td>
                <td><?= h($newsArticle->slug) ?></td>
                <td><?= $this->Number->format($newsArticle->comment_count) ?></td>
                <td><?= $this->Number->format($newsArticle->like_count) ?></td>
                <td><?= $this->Number->format($newsArticle->is_display) ?></td>
                <td><?= h($newsArticle->created) ?></td>
                <td><?= h($newsArticle->modified) ?></td>
                <td><?= h($newsArticle->thumb) ?></td>
                <td><?= h($newsArticle->postheader) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $newsArticle->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $newsArticle->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $newsArticle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsArticle->id)]) ?>
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

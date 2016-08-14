<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New News Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List News Articles'), ['controller' => 'NewsArticles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New News Article'), ['controller' => 'NewsArticles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List News Tags'), ['controller' => 'NewsTags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New News Tag'), ['controller' => 'NewsTags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="newsCategories index large-9 medium-8 columns content">
    <h3><?= __('News Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('slug') ?></th>
                <th><?= $this->Paginator->sort('class') ?></th>
                <th><?= $this->Paginator->sort('icon') ?></th>
                <th><?= $this->Paginator->sort('article_count') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($newsCategories as $newsCategory): ?>
            <tr>
                <td><?= $this->Number->format($newsCategory->id) ?></td>
                <td><?= h($newsCategory->title) ?></td>
                <td><?= h($newsCategory->slug) ?></td>
                <td><?= h($newsCategory->class) ?></td>
                <td><?= h($newsCategory->icon) ?></td>
                <td><?= $this->Number->format($newsCategory->article_count) ?></td>
                <td><?= h($newsCategory->created) ?></td>
                <td><?= h($newsCategory->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $newsCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $newsCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $newsCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsCategory->id)]) ?>
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

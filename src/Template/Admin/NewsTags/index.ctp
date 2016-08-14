<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New News Tag'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List News Articles'), ['controller' => 'NewsArticles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New News Article'), ['controller' => 'NewsArticles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="newsTags index large-9 medium-8 columns content">
    <h3><?= __('News Tags') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('slug') ?></th>
                <th><?= $this->Paginator->sort('class') ?></th>
                <th><?= $this->Paginator->sort('article_count') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($newsTags as $newsTag): ?>
            <tr>
                <td><?= $this->Number->format($newsTag->id) ?></td>
                <td><?= h($newsTag->title) ?></td>
                <td><?= $this->Number->format($newsTag->category_id) ?></td>
                <td><?= h($newsTag->slug) ?></td>
                <td><?= h($newsTag->class) ?></td>
                <td><?= $this->Number->format($newsTag->article_count) ?></td>
                <td><?= h($newsTag->created) ?></td>
                <td><?= h($newsTag->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $newsTag->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $newsTag->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $newsTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsTag->id)]) ?>
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

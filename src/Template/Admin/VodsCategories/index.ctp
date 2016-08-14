<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vods Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vods Playlists'), ['controller' => 'VodsPlaylists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vods Playlist'), ['controller' => 'VodsPlaylists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vodsCategories index large-9 medium-8 columns content">
    <h3><?= __('Vods Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('slug') ?></th>
                <th><?= $this->Paginator->sort('thumb') ?></th>
                <th><?= $this->Paginator->sort('playlists_count') ?></th>
                <th><?= $this->Paginator->sort('position') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vodsCategories as $vodsCategory): ?>
            <tr>
                <td><?= $this->Number->format($vodsCategory->id) ?></td>
                <td><?= h($vodsCategory->title) ?></td>
                <td><?= h($vodsCategory->slug) ?></td>
                <td><?= h($vodsCategory->thumb) ?></td>
                <td><?= $this->Number->format($vodsCategory->playlists_count) ?></td>
                <td><?= $this->Number->format($vodsCategory->position) ?></td>
                <td><?= h($vodsCategory->created) ?></td>
                <td><?= h($vodsCategory->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vodsCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vodsCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vodsCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vodsCategory->id)]) ?>
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

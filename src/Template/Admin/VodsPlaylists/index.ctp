<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vods Playlist'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vods Categories'), ['controller' => 'VodsCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vods Category'), ['controller' => 'VodsCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vods Videos'), ['controller' => 'VodsVideos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vods Video'), ['controller' => 'VodsVideos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vodsPlaylists index large-9 medium-8 columns content">
    <h3><?= __('Vods Playlists') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('slug') ?></th>
                <th><?= $this->Paginator->sort('thumb') ?></th>
                <th><?= $this->Paginator->sort('videos_count') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vodsPlaylists as $vodsPlaylist): ?>
            <tr>
                <td><?= $this->Number->format($vodsPlaylist->id) ?></td>
                <td><?= $vodsPlaylist->has('vods_category') ? $this->Html->link($vodsPlaylist->vods_category->title, ['controller' => 'VodsCategories', 'action' => 'view', $vodsPlaylist->vods_category->id]) : '' ?></td>
                <td><?= h($vodsPlaylist->title) ?></td>
                <td><?= h($vodsPlaylist->slug) ?></td>
                <td><?= h($vodsPlaylist->thumb) ?></td>
                <td><?= $this->Number->format($vodsPlaylist->videos_count) ?></td>
                <td><?= h($vodsPlaylist->created) ?></td>
                <td><?= h($vodsPlaylist->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vodsPlaylist->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vodsPlaylist->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vodsPlaylist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vodsPlaylist->id)]) ?>
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

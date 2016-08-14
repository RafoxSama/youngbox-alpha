<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vods Video'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vods Playlists'), ['controller' => 'VodsPlaylists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vods Playlist'), ['controller' => 'VodsPlaylists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vodsVideos index large-9 medium-8 columns content">
    <h3><?= __('Vods Videos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('playlist_id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('videolink') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th><?= $this->Paginator->sort('thumb') ?></th>
                <th><?= $this->Paginator->sort('slug') ?></th>
                <th><?= $this->Paginator->sort('comment_count') ?></th>
                <th><?= $this->Paginator->sort('like_count') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vodsVideos as $vodsVideo): ?>
            <tr>
                <td><?= $this->Number->format($vodsVideo->id) ?></td>
                <td><?= $vodsVideo->has('vods_playlist') ? $this->Html->link($vodsVideo->vods_playlist->title, ['controller' => 'VodsPlaylists', 'action' => 'view', $vodsVideo->vods_playlist->id]) : '' ?></td>
                <td><?= h($vodsVideo->title) ?></td>
                <td><?= h($vodsVideo->videolink) ?></td>
                <td><?= h($vodsVideo->type) ?></td>
                <td><?= h($vodsVideo->thumb) ?></td>
                <td><?= h($vodsVideo->slug) ?></td>
                <td><?= $this->Number->format($vodsVideo->comment_count) ?></td>
                <td><?= $this->Number->format($vodsVideo->like_count) ?></td>
                <td><?= h($vodsVideo->created) ?></td>
                <td><?= h($vodsVideo->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vodsVideo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vodsVideo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vodsVideo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vodsVideo->id)]) ?>
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

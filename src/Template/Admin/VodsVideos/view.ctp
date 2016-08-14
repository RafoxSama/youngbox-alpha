<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vods Video'), ['action' => 'edit', $vodsVideo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vods Video'), ['action' => 'delete', $vodsVideo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vodsVideo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vods Videos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vods Video'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vods Playlists'), ['controller' => 'VodsPlaylists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vods Playlist'), ['controller' => 'VodsPlaylists', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vodsVideos view large-9 medium-8 columns content">
    <h3><?= h($vodsVideo->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Vods Playlist') ?></th>
            <td><?= $vodsVideo->has('vods_playlist') ? $this->Html->link($vodsVideo->vods_playlist->title, ['controller' => 'VodsPlaylists', 'action' => 'view', $vodsVideo->vods_playlist->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($vodsVideo->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Videolink') ?></th>
            <td><?= h($vodsVideo->videolink) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($vodsVideo->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Thumb') ?></th>
            <td><?= h($vodsVideo->thumb) ?></td>
        </tr>
        <tr>
            <th><?= __('Slug') ?></th>
            <td><?= h($vodsVideo->slug) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($vodsVideo->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Comment Count') ?></th>
            <td><?= $this->Number->format($vodsVideo->comment_count) ?></td>
        </tr>
        <tr>
            <th><?= __('Like Count') ?></th>
            <td><?= $this->Number->format($vodsVideo->like_count) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($vodsVideo->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($vodsVideo->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($vodsVideo->description)); ?>
    </div>
</div>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vods Playlist'), ['action' => 'edit', $vodsPlaylist->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vods Playlist'), ['action' => 'delete', $vodsPlaylist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vodsPlaylist->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vods Playlists'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vods Playlist'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vods Categories'), ['controller' => 'VodsCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vods Category'), ['controller' => 'VodsCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vods Videos'), ['controller' => 'VodsVideos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vods Video'), ['controller' => 'VodsVideos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vodsPlaylists view large-9 medium-8 columns content">
    <h3><?= h($vodsPlaylist->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Vods Category') ?></th>
            <td><?= $vodsPlaylist->has('vods_category') ? $this->Html->link($vodsPlaylist->vods_category->title, ['controller' => 'VodsCategories', 'action' => 'view', $vodsPlaylist->vods_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($vodsPlaylist->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Slug') ?></th>
            <td><?= h($vodsPlaylist->slug) ?></td>
        </tr>
        <tr>
            <th><?= __('Thumb') ?></th>
            <td><?= h($vodsPlaylist->thumb) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($vodsPlaylist->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Videos Count') ?></th>
            <td><?= $this->Number->format($vodsPlaylist->videos_count) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($vodsPlaylist->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($vodsPlaylist->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($vodsPlaylist->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Vods Videos') ?></h4>
        <?php if (!empty($vodsPlaylist->vods_videos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Playlist Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Videolink') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Thumb') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('Comment Count') ?></th>
                <th><?= __('Like Count') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($vodsPlaylist->vods_videos as $vodsVideos): ?>
            <tr>
                <td><?= h($vodsVideos->id) ?></td>
                <td><?= h($vodsVideos->playlist_id) ?></td>
                <td><?= h($vodsVideos->title) ?></td>
                <td><?= h($vodsVideos->description) ?></td>
                <td><?= h($vodsVideos->videolink) ?></td>
                <td><?= h($vodsVideos->type) ?></td>
                <td><?= h($vodsVideos->thumb) ?></td>
                <td><?= h($vodsVideos->slug) ?></td>
                <td><?= h($vodsVideos->comment_count) ?></td>
                <td><?= h($vodsVideos->like_count) ?></td>
                <td><?= h($vodsVideos->created) ?></td>
                <td><?= h($vodsVideos->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VodsVideos', 'action' => 'view', $vodsVideos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VodsVideos', 'action' => 'edit', $vodsVideos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VodsVideos', 'action' => 'delete', $vodsVideos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vodsVideos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

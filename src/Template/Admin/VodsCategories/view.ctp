<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vods Category'), ['action' => 'edit', $vodsCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vods Category'), ['action' => 'delete', $vodsCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vodsCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vods Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vods Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vods Playlists'), ['controller' => 'VodsPlaylists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vods Playlist'), ['controller' => 'VodsPlaylists', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vodsCategories view large-9 medium-8 columns content">
    <h3><?= h($vodsCategory->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($vodsCategory->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Slug') ?></th>
            <td><?= h($vodsCategory->slug) ?></td>
        </tr>
        <tr>
            <th><?= __('Thumb') ?></th>
            <td><?= h($vodsCategory->thumb) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($vodsCategory->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Playlists Count') ?></th>
            <td><?= $this->Number->format($vodsCategory->playlists_count) ?></td>
        </tr>
        <tr>
            <th><?= __('Position') ?></th>
            <td><?= $this->Number->format($vodsCategory->position) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($vodsCategory->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($vodsCategory->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($vodsCategory->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Vods Playlists') ?></h4>
        <?php if (!empty($vodsCategory->vods_playlists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('Thumb') ?></th>
                <th><?= __('Videos Count') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($vodsCategory->vods_playlists as $vodsPlaylists): ?>
            <tr>
                <td><?= h($vodsPlaylists->id) ?></td>
                <td><?= h($vodsPlaylists->category_id) ?></td>
                <td><?= h($vodsPlaylists->title) ?></td>
                <td><?= h($vodsPlaylists->description) ?></td>
                <td><?= h($vodsPlaylists->slug) ?></td>
                <td><?= h($vodsPlaylists->thumb) ?></td>
                <td><?= h($vodsPlaylists->videos_count) ?></td>
                <td><?= h($vodsPlaylists->created) ?></td>
                <td><?= h($vodsPlaylists->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VodsPlaylists', 'action' => 'view', $vodsPlaylists->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VodsPlaylists', 'action' => 'edit', $vodsPlaylists->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VodsPlaylists', 'action' => 'delete', $vodsPlaylists->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vodsPlaylists->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

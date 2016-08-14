<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Vods Playlists'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vods Categories'), ['controller' => 'VodsCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vods Category'), ['controller' => 'VodsCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vods Videos'), ['controller' => 'VodsVideos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vods Video'), ['controller' => 'VodsVideos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vodsPlaylists form large-9 medium-8 columns content">
    <?= $this->Form->create($vodsPlaylist) ?>
    <fieldset>
        <legend><?= __('Add Vods Playlist') ?></legend>
        <?php
            echo $this->Form->input('category_id', ['options' => $vodsCategories]);
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('slug');
            echo $this->Form->input('thumb');
            echo $this->Form->input('videos_count');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

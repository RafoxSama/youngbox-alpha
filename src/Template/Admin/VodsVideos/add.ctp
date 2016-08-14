<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Vods Videos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vods Playlists'), ['controller' => 'VodsPlaylists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vods Playlist'), ['controller' => 'VodsPlaylists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vodsVideos form large-9 medium-8 columns content">
    <?= $this->Form->create($vodsVideo) ?>
    <fieldset>
        <legend><?= __('Add Vods Video') ?></legend>
        <?php
            echo $this->Form->input('playlist_id', ['options' => $vodsPlaylists]);
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('videolink');
            echo $this->Form->input('type');
            echo $this->Form->input('thumb');
            echo $this->Form->input('slug');
            echo $this->Form->input('comment_count');
            echo $this->Form->input('like_count');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

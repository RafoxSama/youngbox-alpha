<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vodsCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vodsCategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Vods Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vods Playlists'), ['controller' => 'VodsPlaylists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vods Playlist'), ['controller' => 'VodsPlaylists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vodsCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($vodsCategory) ?>
    <fieldset>
        <legend><?= __('Edit Vods Category') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('slug');
            echo $this->Form->input('thumb');
            echo $this->Form->input('playlists_count');
            echo $this->Form->input('position');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit News Tag'), ['action' => 'edit', $newsTag->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete News Tag'), ['action' => 'delete', $newsTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsTag->id)]) ?> </li>
        <li><?= $this->Html->link(__('List News Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New News Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List News Articles'), ['controller' => 'NewsArticles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New News Article'), ['controller' => 'NewsArticles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="newsTags view large-9 medium-8 columns content">
    <h3><?= h($newsTag->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($newsTag->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Slug') ?></th>
            <td><?= h($newsTag->slug) ?></td>
        </tr>
        <tr>
            <th><?= __('Class') ?></th>
            <td><?= h($newsTag->class) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($newsTag->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Category Id') ?></th>
            <td><?= $this->Number->format($newsTag->category_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Article Count') ?></th>
            <td><?= $this->Number->format($newsTag->article_count) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($newsTag->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($newsTag->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($newsTag->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related News Articles') ?></h4>
        <?php if (!empty($newsTag->news_articles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Content') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('Comment Count') ?></th>
                <th><?= __('Like Count') ?></th>
                <th><?= __('Is Display') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Thumb') ?></th>
                <th><?= __('Postheader') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($newsTag->news_articles as $newsArticles): ?>
            <tr>
                <td><?= h($newsArticles->id) ?></td>
                <td><?= h($newsArticles->category_id) ?></td>
                <td><?= h($newsArticles->user_id) ?></td>
                <td><?= h($newsArticles->title) ?></td>
                <td><?= h($newsArticles->content) ?></td>
                <td><?= h($newsArticles->slug) ?></td>
                <td><?= h($newsArticles->comment_count) ?></td>
                <td><?= h($newsArticles->like_count) ?></td>
                <td><?= h($newsArticles->is_display) ?></td>
                <td><?= h($newsArticles->created) ?></td>
                <td><?= h($newsArticles->modified) ?></td>
                <td><?= h($newsArticles->thumb) ?></td>
                <td><?= h($newsArticles->postheader) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'NewsArticles', 'action' => 'view', $newsArticles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'NewsArticles', 'action' => 'edit', $newsArticles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'NewsArticles', 'action' => 'delete', $newsArticles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsArticles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

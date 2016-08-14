<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit News Article'), ['action' => 'edit', $newsArticle->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete News Article'), ['action' => 'delete', $newsArticle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsArticle->id)]) ?> </li>
        <li><?= $this->Html->link(__('List News Articles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New News Article'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List News Categories'), ['controller' => 'NewsCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New News Category'), ['controller' => 'NewsCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List News Tags'), ['controller' => 'NewsTags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New News Tag'), ['controller' => 'NewsTags', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="newsArticles view large-9 medium-8 columns content">
    <h3><?= h($newsArticle->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('News Category') ?></th>
            <td><?= $newsArticle->has('news_category') ? $this->Html->link($newsArticle->news_category->title, ['controller' => 'NewsCategories', 'action' => 'view', $newsArticle->news_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $newsArticle->has('user') ? $this->Html->link($newsArticle->user->id, ['controller' => 'Users', 'action' => 'view', $newsArticle->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($newsArticle->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Slug') ?></th>
            <td><?= h($newsArticle->slug) ?></td>
        </tr>
        <tr>
            <th><?= __('Thumb') ?></th>
            <td><?= h($newsArticle->thumb) ?></td>
        </tr>
        <tr>
            <th><?= __('Postheader') ?></th>
            <td><?= h($newsArticle->postheader) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($newsArticle->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Comment Count') ?></th>
            <td><?= $this->Number->format($newsArticle->comment_count) ?></td>
        </tr>
        <tr>
            <th><?= __('Like Count') ?></th>
            <td><?= $this->Number->format($newsArticle->like_count) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Display') ?></th>
            <td><?= $this->Number->format($newsArticle->is_display) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($newsArticle->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($newsArticle->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($newsArticle->content)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related News Tags') ?></h4>
        <?php if (!empty($newsArticle->news_tags)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('Class') ?></th>
                <th><?= __('Article Count') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($newsArticle->news_tags as $newsTags): ?>
            <tr>
                <td><?= h($newsTags->id) ?></td>
                <td><?= h($newsTags->title) ?></td>
                <td><?= h($newsTags->description) ?></td>
                <td><?= h($newsTags->category_id) ?></td>
                <td><?= h($newsTags->slug) ?></td>
                <td><?= h($newsTags->class) ?></td>
                <td><?= h($newsTags->article_count) ?></td>
                <td><?= h($newsTags->created) ?></td>
                <td><?= h($newsTags->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'NewsTags', 'action' => 'view', $newsTags->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'NewsTags', 'action' => 'edit', $newsTags->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'NewsTags', 'action' => 'delete', $newsTags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsTags->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

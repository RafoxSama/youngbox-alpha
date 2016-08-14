<table class="ui celled striped table">
  <thead>
    <tr><th colspan="4">

          <?php if (empty($breadcrumbs->parent_id)): ?>
            <?= $category->title ?>
          <?php else: ?>
            <?= $this->Html->link($category->title, ['_name' => 'forum-categories', 'id' => $category->id, 'slug' => $category->title]) ?>

          <?php endif; ?>

        </th>
      </tr></thead>


            <tbody>
                <?php foreach ($forums as $forum): ?>
                    <?php
                    $threadCount = $forum->thread_count;
                    ?>
                    <tr>
                      <td width="60" class="tcenter">
                            <?php if (!$this->Forum->checkCategoryReaded($forum)) :?>
                              <div class="forum_icon">
                                <i class="radio icon is-unread" data-toggle="tooltip" data-placement="top" title="Non-lu"></i>
                              </div>
                            <?php else: ?>
                              <div class="forum_icon">
                                <i class="radio icon readed" data-toggle="tooltip" data-placement="top" title="Lu"></i>
                              </div>
                            <?php endif; ?>
                      </td>
                        <td class="forumInfo">
                            <div class="forumText">
                                <div class="forumTitle">
                                    <?= $this->Html->link($forum->title, ['_name' => 'forum-categories', 'id' => $forum->id, 'slug' => $forum->title]) ?>
                                </div>
                                <span class="forumDescription hidden-sm hidden-xs">
                                    <?= h($forum->description) ?>
                                </span>
                            </div>
                        </td>
                        <td width="50" class="threadCount hidden-sm hidden-xs">
                            <span class="stats-wrapper">
                                <?= $threadCount ?><br>
                            </span>
                        </td>

                        <td width="300" class="forumLastPost  hidden-sm hidden-xs">
                            <?php if ($forum->last_post === null): ?>
                                <span class="noMessages muted">
                                    (Contient aucun sujets)
                                </span>
                            <?php else: ?>
                                <span class="lastMessage">
                                    <?= $this->Html->link(
                                        $this->Text->truncate(
                                            $forum->last_post->forum_thread->title,
                                            40,
                                            [
                                                'ellipsis' => '...',
                                                'exact' => false
                                            ]
                                        ),
                                        [
                                            'controller' => 'posts',
                                            'action' => 'go',
                                            $forum->last_post->id
                                        ],
                                        [
                                            'class' => 'text-primary'
                                        ]
                                    ) ?>
                                    <br>
                                    <span class="lastMessagetime" data-datetime="<?= date("c", strtotime($forum->last_post->created)); ?>">
                                    </span>
                                </span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

</table>

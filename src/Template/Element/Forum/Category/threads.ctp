<?php if (isset($threads) && !empty($threads->toArray())): ?>

  <table class="ui celled striped table">
    <thead>
                    <tr>
                      <th class="categoryTitle">
                      </th>
                        <th class="categoryTitle">
                            Sujets
                        </th>
                        <th class="statisticsTitle hidden-sm hidden-xs">
                            Réponses
                        </th>
                        <th class="lastPostTitle hidden-sm hidden-xs">
                            Dernier message
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($threads as $thread): ?>
                        <tr>
                          <td class="tcenter" width="59">
                          <span class="threadIcon">
                            <?php if ($thread->thread_open == false): ?>
                              <div class="forum_icon">
                                <i class="lock icon forumClosed"></i>
                              </div>
                            <?php else: ?>
                              <?php if ($thread->sticky == true): ?>
                                  <?php if (!$this->Forum->checkThreadReaded($thread)) :?>
                                    <div class="forum_icon">
                                      <i class="remove bookmark icon is-unread" data-toggle="tooltip" data-placement="top" title="Non-lu"></i>
                                      </div>
                                  <?php else: ?>
                                    <div class="forum_icon">
                                      <i class="remove bookmark icon readed" data-toggle="tooltip" data-placement="top" title="Lu"></i>
                                      </div>
                                  <?php endif; ?>
                              <?php else: ?>
                                  <?php if (!$this->Forum->checkThreadReaded($thread)) :?>
                                    <div class="forum_icon">
                                      <i class="radio icon is-unread" data-toggle="tooltip" data-placement="top" title="Non-lu"></i>
                                    </div>
                                  <?php else: ?>
                                    <div class="forum_icon">
                                      <i class="radio icon readed" data-toggle="tooltip" data-placement="top" title="Lu"></i>
                                    </div>
                                  <?php endif; ?>
                              <?php endif; ?>
                            <?php endif; ?>


                          </span>
                          </td>
                            <td class="threadInfo">
                                <div class="threadText">
                                    <div class="threadTitle">
                                        <?= $this->Html->link($thread->title, ['_name' => 'forum-threads', 'id' => $thread->id, 'slug' => $thread->title]) ?>
                                    </div>
                                    <span class="topic-meta">
                                        Par
                                        <?= $this->Html->link($thread->user->username, ['_name' => 'users-profile', 'slug' => $thread->user->slug, 'id' => $thread->user->id, 'prefix' => false], ['class' => 'text-primary']) ?>
                                        <small>
                                            -
                                          <span class="last-topictime" data-datetime="<?= date("c", strtotime($thread->created)); ?>"></span>
                                        </small>
                                    </span>
                                </div>
                            </td>
                            <td class="threadCount hidden-sm hidden-xs" width="127">
                                <span class="stats-wrapper">
                                    <?= $thread->reply_count ?>
                                </span>
                            </td>
                            <td class="threadLastPost hidden-sm hidden-xs" width="224">
                                <span class="lastMessage">
                                    <?= $this->Html->link('Par '.
                                        $thread->last_post_user->username,
                                        [
                                            'controller' => 'posts',
                                            'action' => 'go',
                                            $thread->last_post_id
                                        ],
                                        [
                                            'escape' => false,
                                            'class' => 'text-primary'
                                        ]
                                    )?>
                                    <br>
                                    <span class="lastMessagetime" data-datetime="<?= date("c", strtotime($thread->last_post->created)); ?>">
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


<?php elseif ((!isset($thread) || empty($threads->toArray())) && $category->category_open == true): ?>
    <div class="panel panel-forum well">
        <h4>Aucun sujet trouvés</h4>
        <p>
            <a class="ui large positive labeled icon button" href="<?= $this->Url->build(['_name' => 'threads-create', 'id' => $category->id, 'slug' => $category->title]); ?>"><i class="write icon"></i>Nouveau sujet</a>
        </p>
    </div>
<?php endif; ?>

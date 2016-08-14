<?php if ($thread->thread_open == true): ?>
                <h4 class="replyTitle">
                  Répondre
                </h4>
            <div class="ui form">
                <?= $this->Form->create($postForm, [
                    'url' => ['_name' => 'threads-reply', 'id' => $thread->id, 'slug' => $thread->title]
                ]) ?>
                    <div class="field">
                        <?=
                        $this->Form->input(
                            'message', [
                                'label' => false,
                                'id' => 'postBox',
                                'data-editor' => '1'
                            ]
                        ) ?>
                    </div>
                    <?php if ( (!is_null($currentUser)) && (($currentUser->is_admin + $currentUser->is_staff+ $currentUser->is_modo) > 0) ): ?>

                        <div class="inline fields">
                            <?= $this->Form->label('forum_thread.thread_open', 'Verrouiller la discussion avec cette réponse?', ['class' => 'control-label']) ?>
                            <div class="radio-box">
                                <?= $this->Form->radio('forum_thread.thread_open', [
                                        '0' => __('Yes'),
                                        '1' => __('No')
                                    ],
                                    [
                                        'value' => '1',
                                        'legend' => false,
                                        'div' => false,
                                        'class' => 'magic-radio',
                                    ]
                                ) ?>

                            </div>
                        </div>
                    <?php endif; ?>
<div class="ui grid stackable">
            <div class="sixteen wide column">
                        <?= $this->Form->submit('Répondre', ['class' => 'ui primary button right']); ?>
                    </div>

                  </div>

                <?= $this->Form->end(); ?>
            </div>


<?php endif; ?>

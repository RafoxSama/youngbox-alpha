

<div class="header-top">
  <div class="ui container">
    <div class="ui grid stackable">
      <div class="eight wide column">
        <h2 class="page-title">Créer un nouveau sujet</h2>
      </div>
    </div>
  </div>
</div>

<div class="forum-breadcrumb">


<div class="ui container">
  <div class="ui breadcrumb">
     <a class="section"><i class="home icon"></i></a>
    <div class="divider"> / </div>
    <?php foreach ($breadcrumbs as $breadcrumb): ?>
      <?php if (!empty($breadcrumb->parent_id)): ?>
     <a href="<?= $this->Url->build(['_name' => 'forum-categories', 'id' => $breadcrumb->id, 'slug' => $breadcrumb->title]); ?>" class="section"><?= $breadcrumb->title ?></a>
    <div class="divider"> / </div>
    <?php endif; ?>
    <?php endforeach; ?>

    <div class="active section">Nouveau Sujet</div>
  </div>
</div>
</div>





<div class="ui container pt">



                <div class="ui form">


                    <?= $this->Form->create($thread, [
                        'class' => 'form-horizontal',
                        'role' => 'form'
                    ]) ?>
                        <div class="field">
                            <?= $this->Form->label('title', 'Titre du sujet', ['class' => 'col-sm-2 control-label']) ?>
                            <div class="col-sm-6">
                                <?php
                                $title = isset($this->request->cookies['DraftTitle']) ? $this->request->cookies['DraftTitle'] : '';
                                ?>
                                <?= $this->Form->input('title', ['class' => 'form-control TitleDraft', 'value' => $title, 'label' => false, 'placeholder' => 'Titre du sujet']) ?>
                            </div>
                        </div>
                        <?php if ( (!is_null($currentUser)) && (($currentUser->is_admin + $currentUser->is_staff+ $currentUser->is_modo) > 0) ): ?>


                        <div class="ui tertiary inverted segment sujet-admin-create">
                            <div class="inline fields">
                                <?= $this->Form->label('sticky', 'Topic Epinglé', ['class' => 'col-sm-2 control-label']) ?>
                                    <?= $this->Form->radio('sticky', [
                                            '1' => 'Oui',
                                            '0' => 'Non'
                                        ],
                                        [
                                            'value' => '0',
                                            'legend' => false,
                                            'class' => 'form-control'
                                        ]
                                    ) ?>
                            </div>


                            <div class="inline fields">
                                <?= $this->Form->label('thread_open', 'Verrouiller', ['class' => 'col-sm-2 control-label']) ?>
                                    <?= $this->Form->radio('thread_open', [
                                            '0' => 'Oui',
                                            '1' => 'Non'
                                        ],
                                        [
                                            'value' => '1',
                                            'legend' => false,
                                            'class' => 'form-control'
                                        ]
                                    ) ?>
                            </div>
                          </div>
                        <?php endif; ?>
                        <div class="field">
                            <?= $this->Form->label('message', __('Message'), ['class' => 'col-sm-2 control-label']) ?>
                            <div class="col-sm-9">
                                <?php
                                $message = isset($this->request->cookies['DraftMessage']) ? $this->request->cookies['DraftMessage'] : '';
                                ?>
                                <?= $this->Form->textarea(
                                    'message', [
                                        'label' => false,
                                        'class' => 'form-control postBox',
                                        'id' => 'postBox',
                                        'value' => $message,
                                        'data-editor' => '1'
                                    ]
                                ) ?>
                                <?= $this->Form->error('message') ?>
                            </div>
                        </div>
                        <div class="ui grid stackable">


                        <div class="sixteen wide column">
                            <?= $this->Form->button('Créer le sujet', ['class' => 'ui primary button right', 'escape' => false]); ?>
                           </div>
                        </div>
                    <?= $this->Form->end(); ?>

                </div>

</div>

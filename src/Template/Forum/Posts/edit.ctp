

<div class="header-top">
  <div class="ui container">
    <div class="ui grid stackable">
      <div class="eight wide column">
        <h2 class="page-title">Modifiez votre réponse</h2>
      </div>
    </div>
  </div>
</div>

<div class="forum-breadcrumb">


<div class="ui container">
  <div class="ui breadcrumb">
     <a class="section"><i class="home icon"></i></a>
    <div class="divider"> / </div>


    <div class="active section">Modification Réponse</div>
  </div>
</div>
</div>





<div class="ui container pt">



                <div class="ui form">


                    <?= $this->Form->create($post, [
                        'class' => 'form-horizontal',
                        'role' => 'form'
                    ]) ?>


                        <div class="field">
                            <?= $this->Form->label('message', __('Message'), ['class' => 'col-sm-2 control-label']) ?>
                            <div class="col-sm-9">
                                <?php
                                ?>
                                <?= $this->Form->textarea(
                                    'message', [
                                        'label' => false,
                                        'class' => 'form-control postBox',
                                        'id' => 'postBox',
                                        'value' => $post->message,
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

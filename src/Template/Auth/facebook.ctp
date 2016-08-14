<?= $this->assign('title', 'Inscription Facebook'); ?>
<div class="header-top">
<div class="ui container">
<h1>Choisir nom d'utilisateur</h1>
</div>
</div>
<div class="ui container pt">
  <div class="ui tertiary segment">
    <?= $this->Form->create($username, ['class'=>'ui large form']) ?>
    <?= $this->Form->input(
        'username',
        [
            'label' => false,
            'class' => 'form-control',
            'placeholder' => 'Nom d\'utilisateur',
            'required' => 'required',
                            'error' => false
        ]
    ) ?>
 <?= $this->Form->error('username') ?>
 <div class="ui inverted divider"></div>

 <div class="field-group">
     <?= $this->Form->button(
         'S\'inscrire',
         ['class' => 'inscription ui right floated button']
     ); ?>
 </div>

 <?= $this->Form->end(); ?>

  </div>

</div>

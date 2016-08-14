<?=$this->assign('title', 'Se connecter');?>
<div class="header-top">
  <div class="ui container">
    <h1 class="left-title">Se connecter</h1>
</div>
</div>




<div class="ui container pt">


<div class="ui two column doubling stackable grid ">
<div class="column">
<div class="ui tertiary segment">
<?= $this->Form->create('signup', ['class'=>'ui large form']) ?>

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



                 <?= $this->Form->input(
                     'password',
                     [
                         'label' => false,
                         'class' => 'form-control',
                         'placeholder' => 'Mot de passe',
                         'required' => 'required',
                                         'error' => false
                     ]
                 ) ?>
             <?= $this->Form->error('password') ?>
<div class="ui inverted divider"></div>

<p class="small">
                            <a href="/users/password/new">Mot de passe oublié ?</a>
                          </p>
<div class="ui inverted divider"></div>

         <div class="field-group">
             <?= $this->Form->button(
                 'Se connecter',
                 ['class' => 'login ui right floated button']
             ); ?>
         </div>
         <?= $this->Form->end(); ?>
     </section>
     </div>
      </div>
     <div class="column">
       <div class="left-title title-small">Je préfère utiliser les réseaux sociaux</div>
       <p> <button class="ui facebook labeled icon button btn-full-width"><i class="facebook f icon"></i>  Se connecter avec facebook </button> </p>
       <p> <button class="ui google plus labeled icon button btn-full-width"><i class="google icon"></i>   Se connecter avec google </button> </p>
       <p> <button class="ui twitter labeled icon button btn-full-width"><i class="twitter icon"></i>  Se connecter avec twitter </button> </p>
       <p> <button class="ui violet labeled icon button btn-full-width"><i class="twitch icon"></i>  Se connecter avec twitch </button> </p>

</div>
   </div>
   </div>

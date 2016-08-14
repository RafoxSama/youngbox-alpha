<?= $this->assign('title', 'Inscription'); ?>

<div class="header-top">
<div class="ui container">
  <div class="ui two column doubling stackable grid ">
<div class="column">
<div class="ui tertiary segment">
<?= $this->Form->create($userRegister, ['class'=>'ui large form']) ?>

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
                       'email',
                       [
                           'label' => false,
                           'class' => 'form-control',
                           'placeholder' => 'Adresse Email',
                           'required' => 'required',
                                           'error' => false
                       ]
                   ) ?>

               <?= $this->Form->error('email') ?>
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


                   <?= $this->Form->input(
                       'password_confirm',
                       [
                           'type' => 'password',
                           'label' => false,
                           'class' => 'form-control',
                           'placeholder' => 'Confirmer le mot de passe',
                           'required' => 'required',
                           'error' => false
                       ]
                   ) ?>
               <?= $this->Form->error('password_confirm') ?>
<div class="ui inverted divider"></div>


               <?= $this->Recaptcha->display() ?>

<div class="ui inverted divider"></div>

           <div class="field-group">
               <?= $this->Form->button(
                   'S\'inscrire',
                   ['class' => 'inscription ui right floated button']
               ); ?>
           </div>
           <?= $this->Form->end(); ?>
       </section>
       </div>
        </div>
       <div class="column">
         <h1 class="left-title">Pourquoi s'inscrire ?</h1>
         <p> Devenir membre sur Grafikart, c'est accéder à
             du contenu exclusif pour apprendre et s'améliorer
             dans le domaine du développement web et du graphisme.<br>La création d'un compte est totalement <strong>gratuite</strong>. Vous pourrez ensuite choisir de devenir <strong>premium</strong> pour télécharger les sources ou les vidéos.
         </p>
         <p> <button class="ui facebook labeled icon button btn-full-width"><i class="facebook f icon"></i>  S'inscrire avec facebook </button> </p>
         <p> <button class="ui google plus labeled icon button btn-full-width"><i class="google icon"></i>   S'inscrire avec google </button> </p>
         <p> <button class="ui twitter labeled icon button btn-full-width"><i class="twitter icon"></i>  S'inscrire avec twitter </button> </p>
         <p> <button class="ui violet labeled icon button btn-full-width"><i class="twitch icon"></i>  S'inscrire avec twitch </button> </p>

</div>
     </div>
   </div>
   </div>

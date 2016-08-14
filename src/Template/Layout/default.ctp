<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->fetch('title') . ' | ' . \Cake\Core\Configure::read('Site.name') ?></title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('dist/default.dist.css') ?>
    <?= $this->Html->css('default/app/tmp.css') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body>
    <div class="site-container">
      <?= $this->element('Default/header') ?>
      <div class="flashholder">
        <?= $this->Flash->render() ?>
      </div>
        <?= $this->fetch('content') ?>
        <?php if ($this->request->session()->read('Auth.User')): ?>
          <?= $this->element('Default/sidebar') ?>
        <?php endif;?>
        <?= $this->element('Default/footer') ?>
    </div>
    <?= $this->Html->script('dist/default.dist.js') ?>
    <?= $this->Html->script('default/app/tmp.js') ?>
    <?= $this->fetch('script') ?>

</body>
</html>

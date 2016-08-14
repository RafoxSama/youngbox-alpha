<?php use Cake\Core\Configure; ?>
<header class="topbar" id="topbar">
        <div class="topbar-logo"><svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/logo.svg#logo"></use></svg></div>
        <div class="topbar-menu">
          <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'home']); ?>">Accueil</a>
          <a href="<?= $this->Url->build(['controller' => 'News', 'action' => 'index', '_name' => 'news-index']); ?>">News</a>
          <a href="<?= $this->Url->build(['controller' => 'Forum', 'action' => 'index']); ?>">Forum</a>
          <a href="/forum">Webtv</a>
          <?php if (Configure::read('Radio.active')): ?>
            <a href="/live">@Radio</a>
          <?php endif; ?>
          <?php if (Configure::read('Boutique.active')): ?>
            <a class="topbar-menu-premium" href="/premium">Boutique</a>
          <?php endif; ?>
          <?php if (Configure::read('Giveaway.active')): ?>
            <a class="topbar-menu-giveway" href="/premium">Giveaway</a>
          <?php endif; ?>

        </div>
        <div class="topbar-right">
          <form class="topbar-search" id="topbar-search" method="get" action="/search">
            <span><a class="icon-search" href="/search"><i class="search icon topbar_search_icon"></i></a><input id="q" name="q" placeholder="Rechercher"></span>
          </form>
          <?php if ($this->request->session()->read('Auth.User')): ?>
            <button class="topbar_icon" data-toggle=".notifications" data-y="-10" title="Notifications"><i class="world icon"></i></button>

            <?= $this->element('Default/notifications') ?>
            <div class="toggle-sidebar topbar-avatar">
              <img src="<?= h($this->request->session()->read('Auth.User.avatar')) ?>" alt="<?= h($this->request->session()->read('Auth.User.id')) ?>">
            </div>
          <?php else:?>
            <a class="ui inscription button" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'signup']); ?>">S'inscrire</a>
            <a class="ui login button" id="btn-login" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'login']); ?>">Se connecter</a>
          <?php endif;?>

        </div>
      </header>

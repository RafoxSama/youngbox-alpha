<div class="sidebar" style="display: block;">
  <div class="sidebar-username">
    Rafox
  </div>
        <div class="sidebar-avatar">
          <img src="<?= h($this->request->session()->read('Auth.User.avatar')) ?>" alt="<?= h($this->request->session()->read('Auth.User.id')) ?>">
        </div>
        <div class="sidebar-menu">
          <?php if ($this->request->session()->read('Auth.User.is_admin') > 0 || $this->request->session()->read('Auth.User.is_staff') > 0): ?>
            <a href="/profil"><span class="icon icon-user"></span><span class="sidebar-icon"><i class="simplybuilt icon"></i></span> Administration</a>
          <?php endif; ?>
          <a href="/profil"><span class="icon icon-user"></span><span class="sidebar-icon"><i class="user icon"></i></span> Mon compte</a>
          <a href="/forum/topics/watched"><span class="icon icon-group"></span><span class="sidebar-icon"><i class="bomb icon"></i></span> Gaming zone</a>
          <a href="/forum/topics/watched"><span class="icon icon-group"></span><span class="sidebar-icon"><i class="list layout icon"></i></span> Mes sujets suivis</a>
          <a class="sidebar-menu-last" href="/playlists"><span class="icon icon-list"></span><span class="sidebar-icon"><i class="play icon"></i></span> Ma playlist</a>
          <a class="sidebar_logout" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'logout']); ?>"><span class="icon icon-times"></span><span class="sidebar-icon"><i class="red sign out icon"></i></span> Se déconnecter</a>
        </div>
        <div class="sidebar-wave">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 200 900" preserveAspectRatio="none"><path id="wave-path" d="M211.666,0h-10.5C201.166,0,9,113,9,207S78.94,364.83,110.333,391.56C201.828,469.465,194,563.508,194,721c0,38,7.166,179,7.166,179h7.5L211.666,0z" data-to="M214.666,0H0c0,0,0,113,0,207s0,173.768,0,215c0,90,0,162.508,0,320c0,38,0,158,0,158h212.666L214.666,0z"></path><desc>Created with Snap</desc><defs></defs></svg>
        </div>
      </div>

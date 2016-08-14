<footer>
  <div class="footer">
    <div class="ui container">
    <div class="ui grid stackable">
      <div class="five wide column">
        <div class="footer_title">
                Sur les réseaux sociaux
              </div>
        <p>
          <button class="ui orange icon button">
            <i class="rss icon"></i>
          </button>
          <button class="ui youtube icon button">
            <i class="play icon"></i>
          </button>
          <button class="ui facebook icon button">
            <i class="facebook f icon"></i>
          </button>
          <button class="ui twitter icon button">
            <i class="twitter icon"></i>
          </button>
        </p>
        <div class="footer_title">
                YoungBox.fr c'est quoi ?
              </div>
        <p>
          Après avoir appris sur Internet quoi de plus normal que de partager à son tour ? Passionné par le web depuis un peu plus de 5 ans maintenant j'aime partager mes compétences et mes découvertes avec les personnes qui ont cette même passion pour le web


        </p>
        <div class="footer_title">
              Les extensions chrome & firefox
              </div>
              <p>
                      <button class="ui blue labeled icon button btn-full-width"><i class="orange firefox icon"></i> Ajouter à firefox </button>
                    </p>
                    <p>
                      <button class="ui yellow labeled icon button btn-full-width"><i class="chrome icon"></i> Ajouter à google chrome </button>
                    </p>
      </div>
      <div class="six wide column">
              <?php //  $this->cell('Lasttweet::display', [], ['cache' => ['config' => 'cache_tweets']]) ?>
        <?= $this->cell('Lasttweet::display') ?>
      </div>
      <div class="five wide column">
          <a class="footer_title" href="/contact">Nous contacter</a>
          <p>
              <button class="ui labeled icon button btn-full-width"><i class="icon envelope o"></i> Par email </button>
          </p>
          <p>
              <button class="ui labeled icon button btn-full-width"><i class="icon comment"></i> Tchat </button>
          </p>
          <p>
              <button class="ui labeled icon button btn-full-width"><i class="icon youtube play"></i> Chaine youtube </button>
          </p>
          <p>
              <button class="ui labeled icon button btn-full-width"><i class="icon twitter"></i> Sur twitter </button>
          </p>

      </div>

    </div>
      </div>
  </div>
<div class="footer-bottom">
  <div class="ui container">
<div class="ui grid stackable">
  <div class="column eight wide">
    <div class="footer-bottom-btn"><a class="first" href="#">Partenaires</a> - <a href="#">Cookies</a> - <a href="#">Confidentialité</a> - <a href="#">Conditions d'utilisation</a></div>

  </div>
  <div class="column eight wide right aligned">
    <div>YoungBox © 2016 Developer par <a href="http://rafox.fr" class="rafox-link">Rafox</a></div>
  </div>
</div>
</div>
</div>

</footer>

<div class="tv header header-mirror post-header" style="background-image:url(../images/gif/cityhunter.gif);">
<div class="ui container">
<div class="header-title">
  Séries, Animes & Emissions ...
</div>
</div>
</div>
<div class="content-gray">
<div class="ui container pt">
<?php foreach ($categories as $categorie): ?>
  <a href="<?= $this->Url->build(['controller' => 'Vods', 'action' => 'category', 'slug' => $categorie->slug, 'id' => $categorie->id,]); ?>">
  <h1><?= $categorie->title ?></h1>
  </a>
  <div class="tv-owl-carousel">
  <?php foreach ($categorie->vods_playlists as $playlist): ?>
    <div class="item">
      <a href="<?= $this->Url->build(['controller' => 'Vods', 'action' => 'playlist', 'slug' => $playlist->slug, 'id' => $playlist->id,]); ?>">
      <div class="tv ui segment" style="background-image:url(<?= $playlist->thumb ?>);">
        <div class="title-info">
          <h3><?= $playlist->title ?></h3>
          <p>
            <?= $playlist->description ?>
          </p>
        </div>
      </div>
      </a>
    </div>


  <?php endforeach; ?>
</div>
<?php endforeach; ?>
</div>
</div>

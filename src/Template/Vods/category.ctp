<div class="tv header header-mirror post-header" style="background-image:url(../../images/gif/cityhunter.gif);">
<div class="ui container">
<div class="header-title">
<?= $category->title ?></div>
</div>
</div>
<div class="content-gray">
<div class="ui container pt">
  <div class="tv-div ui grid stackable">
  <?php foreach ($category->vods_playlists as $playlist): ?>
    <div class="four wide column">

    <div class="item">
      <a href="<?= $this->Url->build(['controller' => 'Vods', 'action' => 'playlist', 'slug' => $playlist->slug, 'id' => $playlist->id,]); ?>">
      <div class="tv ui segment" style="background-image:url(../<?= $playlist->thumb ?>);">
        <div class="title-info">
          <h3><?= $playlist->title ?></h3>
          <p>
            <?= $playlist->description ?>
          </p>
        </div>
      </div>
      </a>
    </div>

  </div>

  <?php endforeach; ?>
</div>
</div>
</div>

<div class="tv header header-mirror post-header" style="background-image:url(<?= $playlist->thumb ?>);">
<div class="ui container">
<div class="header-title">
<?= $playlist->title ?></div>
</div>
</div>
<div class="content-gray">
<div class="ui container pt">
  <div class="tv-div ui grid stackable">
  <?php foreach ($playlist->vods_videos as $video): ?>
    <div class="four wide column">

    <div class="item">
      <a href="<?= $this->Url->build(['controller' => 'Vods', 'action' => 'video', 'slug' => $video->slug, 'id' => $video->id,]); ?>">
      <div class="tv ui segment" style="background-image:url(<?= $video->thumb ?>);">
        <div class="title-info">
          <h3><?= $video->title ?></h3>
        </div>
      </div>
      </a>
    </div>

  </div>

  <?php endforeach; ?>
</div>
</div>
</div>

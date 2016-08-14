<?php if($tags): ?>
  <div class="ui floating labeled icon dropdown button cat-filter-btn">
    <i class="filter icon"></i>
    <span class="text">Catégories</span>
    <div class="menu transition cat-filter">
      <div class="header">
        <i class="tags icon"></i>
        Filtrer par catégories
      </div>
      <div class="divider"></div>
            <?php foreach($tags as $tag): ?>
              <a href="<?= $this->Url->build(['controller' => 'News', 'action' => 'tag', 'slug' => $tag->slug, 'id' => $tag->id,]); ?>">
              <div class="item">
                <i class="comment icon"></i>
                <?= $tag->title ?>
              </div>
              </a>

            <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>

<?php if($categories): ?>
  <div class="ui floating labeled icon dropdown button cat-filter-btn">
    <i class="filter icon"></i>
    <span class="text">Catégories</span>
    <div class="menu transition cat-filter">
      <div class="header">
        <i class="tags icon"></i>
        Filtrer par catégories
      </div>
      <div class="divider"></div>
            <?php foreach($categories as $category): ?>
              <a href="<?= $this->Url->build(['controller' => 'News', 'action' => 'category', 'slug' => $category->slug, 'id' => $category->id,]); ?>">
              <div class="item">
                <span class="filter-cat-icon <?= $category->class ?>"></span>
                <?= $category->title ?>
              </div>
              </a>

            <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>

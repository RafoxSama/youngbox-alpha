<div class="header-top">
        <div class="ui container">
<div class="ui grid stackable">
  <div class="eight wide column">
    <div class="left-filter">

      <?php if($tags): ?>
        <div class="ui floating labeled icon dropdown button cat-filter-btn">
          <i class="filter icon"></i>
          <span class="text"><?= $category->title ?></span>
          <div class="menu transition cat-filter">
            <div class="header">
              <i class="tags icon"></i>
              Filtrer par catégories
            </div>
            <div class="divider"></div>
                  <?php foreach($tags as $tag): ?>
                    <a href="<?= $this->Url->build(['controller' => 'News', 'action' => 'tag', 'slug' => $tag->slug, 'id' => $tag->id,]); ?>">
                    <div class="item">
                      <i class="circle icon <?= $tag->class ?>"></i>
                      <?= $tag->title ?>
                    </div>
                    </a>

                  <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>







    </div>
  </div>
  <div class="eight wide column">
      <div class="right m-hidden"><button class="ui positive labeled icon button">
      <i class="write icon"></i>
      Proposer un article
    </button>
      </div>
  </div>
</div>





        </div>
      </div>



<div class="ui container pt">
  <div class="ui items divided">

  <?php foreach ($articles as $article): ?>
    <div class="item">
      <div class="image news-thumb">
        <a href="<?= $this->Url->build(['controller' => 'News', 'action' => 'article', 'slug' => $article->slug, 'id' => $article->id,]); ?>">
        <img src="/images/thumb/<?= $article->thumb ?>">
        </a>
      </div>
      <div class="content news-content">
        <a class="header" href="<?= $this->Url->build(['controller' => 'News', 'action' => 'article', 'slug' => $article->slug, 'id' => $article->id,]); ?>"><?= $article->title ?></a>
        <div class="meta news-meta">
          <span class="news-date" data-date="<?= date("c", strtotime($article->created)); ?>"></span><span class="news-user">, Auteur <?= $article->user->username ?></span>
        </div>
        <div class="description">
          <p>              <?=
                        $this->Text->truncate(
                            $article->content,
                            330,
                            [
                                'ellipsis' => '...',
                                'exact' => false
                            ]
                        ) ?></p>
        </div>
        <div class="extra">
          <?php foreach ($article->news_tags as $tag): ?>
                      <a href="<?= $this->Url->build(['controller' => 'News', 'action' => 'tag', 'slug' => $tag->slug, 'id' => $tag->id,]); ?>">
        <div class="ui label cat-text <?= $tag->class ?>"><?= $tag->title ?></div>
                  </a>
        <?php endforeach; ?>
          <a href="<?= $this->Url->build(['controller' => 'News', 'action' => 'category', 'slug' => $category->slug, 'id' => $category->id,]); ?>"">
          <div class="ui label cat-text"><span class="cat-icon <?= $category->class ?>"></span> <?= $category->title ?></div>
          </a>
        </div>
      </div>
    </div>




<?php endforeach; ?>
</div>


<div class="blue ui buttons">
  <?php if ($this->Paginator->hasPrev()): ?>
      <?= $this->Paginator->prev('«'); ?>
  <?php endif; ?>
  <?= $this->Paginator->numbers(['modulus' => 5]); ?>
  <?php if ($this->Paginator->hasNext()): ?>
      <?= $this->Paginator->next('»'); ?>
  <?php endif; ?>
</div>
</div>

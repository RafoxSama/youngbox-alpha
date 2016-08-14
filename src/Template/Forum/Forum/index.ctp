<div class="header-top">
  <div class="ui container">
    <div class="ui grid stackable">
      <div class="eight wide column">
        <h2 class="page-title">Recherche forum</h2>
        <p class="text-title">Besoin de rechercher un sujet ?</p>
      </div>
      <div class="eight wide column search-forum">
        <div class="ui action fluid  input">
      <input type="text" placeholder="Search...">
      <button class="ui button primary">Search</button>
    </div>
      </div>
    </div>
  </div>
</div>
<div class="ui container pt">


                <?php foreach ($categories as $category): ?>

                    <?= $this->element('Forum/categories', [
                        'category' => $category,
                        'forums' => $category->children
                    ]) ?>

                <?php endforeach; ?>

</div>

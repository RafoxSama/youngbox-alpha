<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * News cell
 */
class NewsCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
    }

    public function categories()
    {
      $this->loadModel('NewsCategories');

      //Select all Categories.
      $categories = $this->NewsCategories
          ->find()
          ->select([
              'id',
              'class',
              'icon',
              'title',
              'slug'
          ])
          ->all();

      $this->set(compact('categories'));

    }
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NewsCategory Entity
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $slug
 * @property string $class
 * @property string $icon
 * @property int $article_count
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class NewsCategory extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}

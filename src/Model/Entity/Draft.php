<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Draft Entity
 *
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property string $title
 * @property string $content
 * @property string $slug
 * @property int $comment_count
 * @property int $like_count
 * @property int $is_display
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $thumb
 * @property string $postheader
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\User $user
 */
class Draft extends Entity
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

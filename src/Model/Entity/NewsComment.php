<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NewsComment Entity
 *
 * @property int $id
 * @property int $article_id
 * @property int $user_id
 * @property string $content
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Article $article
 * @property \App\Model\Entity\User $user
 */
class NewsComment extends Entity
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

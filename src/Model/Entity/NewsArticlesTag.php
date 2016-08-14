<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NewsArticlesTag Entity
 *
 * @property int $id
 * @property int $news_tag_id
 * @property int $news_article_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\NewsTag $news_tag
 * @property \App\Model\Entity\NewsArticle $news_article
 */
class NewsArticlesTag extends Entity
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

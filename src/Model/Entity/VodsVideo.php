<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VodsVideo Entity
 *
 * @property int $id
 * @property int $playlist_id
 * @property string $title
 * @property string $description
 * @property string $videolink
 * @property string $type
 * @property string $thumb
 * @property string $slug
 * @property int $comment_count
 * @property int $like_count
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Playlist $playlist
 */
class VodsVideo extends Entity
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

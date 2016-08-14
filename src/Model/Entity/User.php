<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\I18n\Time;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $active
 * @property string $email
 * @property string $mail_token
 * @property string $avatar
 * @property string $biography
 * @property string $facebook
 * @property string $twitter
 * @property string $google
 * @property string $twitch
 * @property int $group_id
 * @property string $slug
 * @property int $blog_articles_comment_count
 * @property int $blog_article_count
 * @property int $forum_thread_count
 * @property int $forum_post_count
 * @property int $forum_like_received
 * @property \Cake\I18n\Time $end_subscription
 * @property string $password_code
 * @property \Cake\I18n\Time $password_code_expire
 * @property int $password_reset_count
 * @property string $register_ip
 * @property bool $is_deleted
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\Notification[] $notifications
 * @property \App\Model\Entity\Badge[] $badges
 */
class User extends Entity
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
    ];
    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
    protected function _getPremium()
    {
        return $this->end_subscription > new Time();
    }


    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}

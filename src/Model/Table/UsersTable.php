<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Groups
 * @property \Cake\ORM\Association\HasMany $Notifications
 * @property \Cake\ORM\Association\BelongsToMany $Badges
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Xety/Cake3Upload.Upload', [
            'fields' => [
                'avatar' => [
                    'path' => 'upload/avatar/:id/:md5',
                    'overwrite' => true,
                    'prefix' => '../',
                    'defaultFile' => 'avatar.png'
                ]
            ]
        ]);
        $this->addBehavior('Xety/Cake3Sluggable.Sluggable', [
            'field' => 'username'
        ]);
        $this->hasMany('Notifications', [
             'foreignKey' => 'user_id',
             'dependent' => true,
             'cascadeCallbacks' => true
         ]);
        $this->hasMany('BadgesUsers', [
                   'foreignKey' => 'user_id',
                   'dependent' => true,
                   'cascadeCallbacks' => true
         ]);
        $this->hasMany('ForumThreads', [
            'foreignKey' => 'user_id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);
        $this->hasMany('ForumPosts', [
            'foreignKey' => 'user_id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);
        $this->hasMany('LastPosts', [
            'foreignKey' => 'user_id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);
        $this->hasMany('ForumPostsLikes', [
            'foreignKey' => 'user_id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);
        $this->hasMany('ForumThreadsFollowers', [
            'foreignKey' => 'user_id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */

     public function validationCreate(Validator $validator)
     {
         $validator
             ->notEmpty('username', __("You must set an username"))
             ->add('username', [
                 'unique' => [
                     'rule' => 'validateUnique',
                     'provider' => 'table',
                     'message' => __("This username is already used.")
                 ],
                 'alphanumeric' => [
                     'rule' => ['custom', '#^[A-Za-z0-9]+$#'],
                     'message' => __("Only alphanumeric characters.")
                 ],
                 'lengthBetween' => [
                     'rule' => ['lengthBetween', 4, 20],
                     'message' => __("Your username must be between {0} and {1} characters.", 4, 20)
                 ]
             ])
             ->notEmpty('password', __("You must specify your password."))
             ->notEmpty('password_confirm', __("You must specify your password (confirmation)."))
             ->add('password_confirm', [
                 'lengthBetween' => [
                     'rule' => ['lengthBetween', 8, 20],
                     'message' => __("Your password (confirmation) must be between {0} and {1} characters.", 8, 20)
                 ],
                 'equalToPassword' => [
                     'rule' => function ($value, $context) {
                         return $value === $context['data']['password'];
                     },
                     'message' => __("Your password confirm must match with your password.")
                 ]
             ])
             ->notEmpty('email')
             ->add('email', [
                 'unique' => [
                     'rule' => 'validateUnique',
                     'provider' => 'table',
                     'message' => __("This E-mail is already used.")
                 ],
                 'email' => [
                     'rule' => 'email',
                     'message' => __("You must specify a valid E-mail address.")
                 ]
             ])
             ->notEmpty('mail_token')
             ->add('mail_token', [
                 'unique' => [
                     'rule' => 'validateUnique',
                     'provider' => 'table',
                     'message' => __("This mail_token is already used.")
                 ]
             ]);

         return $validator;
     }

     public function validationSocial(Validator $validator)
     {
         $validator
             ->notEmpty('username', __("You must set an username"))
             ->add('username', [
                 'unique' => [
                     'rule' => 'validateUnique',
                     'provider' => 'table',
                     'message' => __("This username is already used.")
                 ],
                 'alphanumeric' => [
                     'rule' => ['custom', '#^[A-Za-z0-9]+$#'],
                     'message' => __("Only alphanumeric characters.")
                 ],
                 'lengthBetween' => [
                     'rule' => ['lengthBetween', 4, 20],
                     'message' => __("Your username must be between {0} and {1} characters.", 4, 20)
                 ]
             ])
             ->notEmpty('email')
             ->add('email', [
                 'unique' => [
                     'rule' => 'validateUnique',
                     'provider' => 'table',
                     'message' => __("This E-mail is already used.")
                 ],
                 'email' => [
                     'rule' => 'email',
                     'message' => __("You must specify a valid E-mail address.")
                 ]
             ])
             ->notEmpty('mail_token')
             ->add('mail_token', [
                 'unique' => [
                     'rule' => 'validateUnique',
                     'provider' => 'table',
                     'message' => __("This mail_token is already used.")
                 ]
             ]);

         return $validator;
     }




    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */

    public function findShort(Query $query)
     {
         return $query->select([
             'id',
             'username',
             'slug'
         ]);
     }
     /**
      * Custom finder for select the required fields and avatar.
      *
      * @param \Cake\ORM\Query $query The query finder.
      *
      * @return \Cake\ORM\Query
      */
     public function findMedium(Query $query)
     {
         return $query->select([
             'id',
             'username',
             'avatar',
             'slug'
         ]);
     }
     /**
      * Custom finder for select full fields.
      *
      * @param \Cake\ORM\Query $query The query finder.
      *
      * @return \Cake\ORM\Query
      */
     public function findFull(Query $query)
     {
         return $query->select([
             'id',
             'username',
             'avatar',
             'slug',
             'group_id',
             'forum_post_count',
             'forum_thread_count',
             'forum_like_received',
             'news_articles_comment_count',
             'news_article_count',
             'facebook',
             'twitter',
             'twitch',
             'end_subscription',
             'created',
             'last_login'
         ]);
     }



}

<?php
namespace App\Model\Table;

use ArrayObject;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VodsComments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Videos
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\VodsComment get($primaryKey, $options = [])
 * @method \App\Model\Entity\VodsComment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VodsComment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VodsComment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VodsComment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VodsComment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VodsComment findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VodsCommentsTable extends Table
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

        $this->table('vods_comments');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CounterCache', [
            'Users' => ['news_articles_comment_count']
                  ]);

        $this->belongsTo('Videos', [
            'foreignKey' => 'video_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
              ->notEmpty('content')
              ->add('content', [
                  'minLength' => [
                      'rule' => ['minLength', 5],
                      'message' => __("Please, {0} characters minimum for your comment.", 5)
                  ]
              ]);
          return $validator;
      }

      // public function afterSave(Event $event, Entity $entity, ArrayObject $options)
      //   {
      //       if ($entity->isNew()) {
      //           $comment = new Event('Model.NewsComments.add', $this, [
      //               'comment' => $entity
      //           ]);
      //           $this->eventManager()->dispatch($comment);
      //       }
      //       return true;
      //   }
}

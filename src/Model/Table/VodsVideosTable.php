<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VodsVideos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Playlists
 *
 * @method \App\Model\Entity\VodsVideo get($primaryKey, $options = [])
 * @method \App\Model\Entity\VodsVideo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VodsVideo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VodsVideo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VodsVideo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VodsVideo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VodsVideo findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VodsVideosTable extends Table
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

        $this->table('vods_videos');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CounterCache', [
            'VodsPlaylists' => ['videos_count']
                  ]);
        $this->addBehavior('Xety/Cake3Sluggable.Sluggable');


        $this->belongsTo('VodsPlaylists', [
            'foreignKey' => 'playlist_id',
            'joinType' => 'INNER'
        ]);

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('videolink', 'create')
            ->notEmpty('videolink');

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->requirePresence('thumb', 'create')
            ->notEmpty('thumb');

        $validator
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

        $validator
            ->integer('comment_count')
            ->requirePresence('comment_count', 'create')
            ->notEmpty('comment_count');

        $validator
            ->integer('like_count')
            ->requirePresence('like_count', 'create')
            ->notEmpty('like_count');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['playlist_id'], 'Playlists'));

        return $rules;
    }
}

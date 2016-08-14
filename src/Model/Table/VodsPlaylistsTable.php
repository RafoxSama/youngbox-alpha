<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VodsPlaylists Model
 *
 * @method \App\Model\Entity\VodsPlaylist get($primaryKey, $options = [])
 * @method \App\Model\Entity\VodsPlaylist newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VodsPlaylist[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VodsPlaylist|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VodsPlaylist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VodsPlaylist[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VodsPlaylist findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VodsPlaylistsTable extends Table
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

        $this->table('vods_playlists');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CounterCache', [
            'VodsCategories' => ['playlists_count']
                  ]);
        $this->addBehavior('Xety/Cake3Sluggable.Sluggable');

        $this->hasMany('VodsVideos', [
            'foreignKey' => 'playlist_id',
        ]);

        $this->belongsTo('VodsCategories', [
            'foreignKey' => 'category_id',
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
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

        $validator
            ->requirePresence('thumb', 'create')
            ->notEmpty('thumb');

        $validator
            ->integer('videos_count')
            ->requirePresence('videos_count', 'create')
            ->notEmpty('videos_count');

        return $validator;
    }
}

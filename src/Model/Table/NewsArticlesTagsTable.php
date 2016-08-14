<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NewsArticlesTags Model
 *
 * @property \Cake\ORM\Association\BelongsTo $NewsTags
 * @property \Cake\ORM\Association\BelongsTo $NewsArticles
 *
 * @method \App\Model\Entity\NewsArticlesTag get($primaryKey, $options = [])
 * @method \App\Model\Entity\NewsArticlesTag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NewsArticlesTag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NewsArticlesTag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NewsArticlesTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NewsArticlesTag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NewsArticlesTag findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NewsArticlesTagsTable extends Table
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

        $this->table('news_articles_tags');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('NewsTags', [
            'foreignKey' => 'news_tag_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('NewsArticles', [
            'foreignKey' => 'news_article_id',
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
        $rules->add($rules->existsIn(['news_tag_id'], 'NewsTags'));
        $rules->add($rules->existsIn(['news_article_id'], 'NewsArticles'));

        return $rules;
    }
}

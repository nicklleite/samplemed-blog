<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Posts Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\CommentsTable&\Cake\ORM\Association\HasMany $Comments
 *
 * @method \App\Model\Entity\Post newEmptyEntity()
 * @method \App\Model\Entity\Post newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Post> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Post get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Post findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Post patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Post> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Post|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Post saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Post>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Post>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Post>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Post> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Post>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Post>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Post>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Post> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PostsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('posts');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'post_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->allowEmptyString('user_id');

        $validator
            ->allowEmptyString('category_id');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->allowEmptyString('title');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->allowEmptyString('slug');

        $validator
            ->scalar('subtitle')
            ->maxLength('subtitle', 255)
            ->allowEmptyString('subtitle');

        $validator
            ->scalar('full_text')
            ->maxLength('full_text', 4294967295)
            ->allowEmptyString('full_text');

        $validator
            ->scalar('tags')
            ->allowEmptyString('tags');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['category_id'], 'Categories'), ['errorField' => 'category_id']);

        return $rules;
    }
}

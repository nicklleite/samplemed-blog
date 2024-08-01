<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Blacklist Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Blacklist newEmptyEntity()
 * @method \App\Model\Entity\Blacklist newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Blacklist> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Blacklist get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Blacklist findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Blacklist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Blacklist> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Blacklist|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Blacklist saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Blacklist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Blacklist>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Blacklist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Blacklist> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Blacklist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Blacklist>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Blacklist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Blacklist> deleteManyOrFail(iterable $entities, array $options = [])
 */
class BlacklistTable extends Table
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

        $this->setTable('blacklist');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->scalar('last_ip_address')
            ->maxLength('last_ip_address', 255)
            ->allowEmptyString('last_ip_address');

        $validator
            ->scalar('reason')
            ->allowEmptyString('reason');

        $validator
            ->dateTime('blocked')
            ->allowEmptyDateTime('blocked');

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

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ElectionSession Model
 *
 * @method \App\Model\Entity\ElectionSession get($primaryKey, $options = [])
 * @method \App\Model\Entity\ElectionSession newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ElectionSession[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ElectionSession|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ElectionSession|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ElectionSession patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ElectionSession[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ElectionSession findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ElectionSessionTable extends Table
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

        $this->setTable('election_session');
        $this->setDisplayField('election_session_id');
        $this->setPrimaryKey('election_session_id');

        $this->addBehavior('Timestamp');
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
            ->scalar('election_session_id')
            ->maxLength('election_session_id', 6)
            ->allowEmpty('election_session_id', 'create');

        $validator
            ->scalar('nama_kegiatan')
            ->maxLength('nama_kegiatan', 64)
            ->requirePresence('nama_kegiatan', 'create')
            ->notEmpty('nama_kegiatan');

        $validator
            ->scalar('is_active')
            ->maxLength('is_active', 1)
            ->requirePresence('is_active', 'create')
            ->notEmpty('is_active');

        $validator
            ->scalar('type_area')
            ->requirePresence('type_area', 'create')
            ->notEmpty('type_area');

        $validator
            ->uuid('created_by')
            ->allowEmpty('created_by');

        $validator
            ->scalar('modified_by')
            ->maxLength('modified_by', 36)
            ->allowEmpty('modified_by');

        $validator
            ->scalar('deleted')
            ->maxLength('deleted', 1)
            ->requirePresence('deleted', 'create')
            ->notEmpty('deleted');

        return $validator;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WilayahKabkot Model
 *
 * @property \App\Model\Table\ElectionSessionsTable|\Cake\ORM\Association\BelongsTo $ElectionSession
 *
 * @method \App\Model\Entity\WilayahKabkot get($primaryKey, $options = [])
 * @method \App\Model\Entity\WilayahKabkot newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WilayahKabkot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WilayahKabkot|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WilayahKabkot|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WilayahKabkot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WilayahKabkot[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WilayahKabkot findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WilayahKabkotTable extends Table
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

      $this->setTable('wilayah_kabkot');
      $this->setDisplayField('nama_kabkot');
      $this->setPrimaryKey('wilayah_kabkot_id');

      $this->addBehavior('Timestamp');

      $this->belongsTo('ElectionSession', [
          'foreignKey' => 'election_session_id',
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
        ->scalar('wilayah_kabkot_id')
        ->maxLength('wilayah_kabkot_id', 8)
        ->allowEmpty('wilayah_kabkot_id', 'create');

      $validator
        ->scalar('nama_prov')
        ->maxLength('nama_prov', 32)
        ->requirePresence('nama_prov', 'create')
        ->notEmpty('nama_prov');

      $validator
        ->scalar('nama_kabkot')
        ->maxLength('nama_kabkot', 32)
        ->requirePresence('nama_kabkot', 'create')
        ->notEmpty('nama_kabkot');

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
        ->allowEmpty('deleted');

      return $validator;
    }
}

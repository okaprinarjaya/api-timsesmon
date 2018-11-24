<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Relawan Model
 *
 * @property \App\Model\Table\ElectionSessionTable|\Cake\ORM\Association\BelongsTo $ElectionSession
 *
 * @method \App\Model\Entity\Relawan get($primaryKey, $options = [])
 * @method \App\Model\Entity\Relawan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Relawan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Relawan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Relawan|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Relawan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Relawan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Relawan findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RelawanTable extends Table
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

    $this->setTable('relawan');
    $this->setDisplayField('username');
    $this->setPrimaryKey('relawan_id');

    $this->addBehavior('Timestamp');

    $this->belongsTo('ElectionSession', [
      'foreignKey' => 'election_session_id',
      'joinType' => 'INNER'
    ]);

    $this->hasOne('RelawanProfile', [
      'foreignKey' => 'relawan_id',
      'joinType' => 'LEFT'
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
      ->scalar('relawan_id')
      ->maxLength('relawan_id', 27)
      ->requirePresence('relawan_id', 'create')
      ->notEmpty('relawan_id');

    $validator
      ->scalar('username')
      ->maxLength('username', 16)
      ->requirePresence('username', 'create')
      ->notEmpty('username');

    $validator
      ->scalar('password')
      ->maxLength('password', 6)
      ->requirePresence('password', 'create')
      ->notEmpty('password');

    $validator
      ->scalar('wilayah_prov_id')
      ->maxLength('wilayah_prov_id', 8)
      ->requirePresence('wilayah_prov_id', 'create')
      ->notEmpty('wilayah_prov_id');

    $validator
      ->scalar('wilayah_kabkot_id')
      ->maxLength('wilayah_kabkot_id', 8)
      ->requirePresence('wilayah_kabkot_id', 'create')
      ->notEmpty('wilayah_kabkot_id');

    $validator
      ->scalar('wilayah_kec_id')
      ->maxLength('wilayah_kec_id', 8)
      ->requirePresence('wilayah_kec_id', 'create')
      ->notEmpty('wilayah_kec_id');

    $validator
      ->scalar('wilayah_kel_id')
      ->maxLength('wilayah_kel_id', 8)
      ->requirePresence('wilayah_kel_id', 'create')
      ->notEmpty('wilayah_kel_id');

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
      ->scalar('nama_kec')
      ->maxLength('nama_kec', 32)
      ->requirePresence('nama_kec', 'create')
      ->notEmpty('nama_kec');

    $validator
      ->scalar('nama_kel')
      ->maxLength('nama_kel', 32)
      ->requirePresence('nama_kel', 'create')
      ->notEmpty('nama_kel');

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

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WilayahKelurahan Model
 *
 * @property \App\Model\Table\ElectionSessionTable|\Cake\ORM\Association\BelongsTo $ElectionSession
 *
 * @method \App\Model\Entity\WilayahKelurahan get($primaryKey, $options = [])
 * @method \App\Model\Entity\WilayahKelurahan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WilayahKelurahan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WilayahKelurahan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WilayahKelurahan|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WilayahKelurahan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WilayahKelurahan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WilayahKelurahan findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WilayahKelurahanTable extends Table
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

    $this->setTable('wilayah_kelurahan');
    $this->setDisplayField('nama_kel');
    $this->setPrimaryKey('wilayah_kel_id');

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
      ->scalar('wilayah_kel_id')
      ->maxLength('wilayah_kel_id', 10)
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

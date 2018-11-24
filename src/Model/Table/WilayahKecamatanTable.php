<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WilayahKecamatan Model
 *
 * @property \App\Model\Table\ElectionSessionsTable|\Cake\ORM\Association\BelongsTo $ElectionSession
 *
 * @method \App\Model\Entity\WilayahKecamatan get($primaryKey, $options = [])
 * @method \App\Model\Entity\WilayahKecamatan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WilayahKecamatan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WilayahKecamatan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WilayahKecamatan|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WilayahKecamatan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WilayahKecamatan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WilayahKecamatan findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WilayahKecamatanTable extends Table
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

    $this->setTable('wilayah_kecamatan');
    $this->setDisplayField('nama_kec');
    $this->setPrimaryKey('wilayah_kec_id');

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
      ->scalar('wilayah_kec_id')
      ->maxLength('wilayah_kec_id', 8)
      ->requirePresence('wilayah_kec_id', 'create')
      ->notEmpty('wilayah_kec_id');

    $validator
      ->scalar('wilayah_kabkot_id')
      ->maxLength('wilayah_kabkot_id', 8)
      ->requirePresence('wilayah_kabkot_id', 'create')
      ->notEmpty('wilayah_kabkot_id');

    $validator
      ->scalar('wilayah_prov_id')
      ->maxLength('wilayah_prov_id', 8)
      ->requirePresence('wilayah_prov_id', 'create')
      ->notEmpty('wilayah_prov_id');

    $validator
      ->scalar('election_session_id')
      ->maxLength('election_session_id', 6)
      ->requirePresence('election_session_id', 'create')
      ->notEmpty('election_session_id');

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

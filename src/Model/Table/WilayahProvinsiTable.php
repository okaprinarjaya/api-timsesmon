<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WilayahProvinsi Model
 *
 * @property \App\Model\Table\ElectionSessionsTable|\Cake\ORM\Association\BelongsTo $ElectionSessions
 *
 * @method \App\Model\Entity\WilayahProvinsi get($primaryKey, $options = [])
 * @method \App\Model\Entity\WilayahProvinsi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WilayahProvinsi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WilayahProvinsi|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WilayahProvinsi|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WilayahProvinsi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WilayahProvinsi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WilayahProvinsi findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WilayahProvinsiTable extends Table
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

    $this->setTable('wilayah_provinsi');
    $this->setDisplayField('nama_prov');
    $this->setPrimaryKey('wilayah_prov_id');

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
      ->scalar('wilayah_prov_id')
      ->maxLength('wilayah_prov_id', 8)
      ->requirePresence('wilayah_prov_id', 'create')
      ->notEmpty('wilayah_prov_id', 'create');

    $validator
      ->scalar('nama_prov')
      ->maxLength('nama_prov', 32)
      ->requirePresence('nama_prov', 'create')
      ->notEmpty('nama_prov');

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

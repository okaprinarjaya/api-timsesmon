<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pekerjaan Model
 *
 * @method \App\Model\Entity\Pekerjaan get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pekerjaan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pekerjaan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pekerjaan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pekerjaan|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pekerjaan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pekerjaan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pekerjaan findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PekerjaanTable extends Table
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

    $this->setTable('pekerjaan');
    $this->setDisplayField('pekerjaan');
    $this->setPrimaryKey('pekerjaan_id');

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
      ->scalar('pekerjaan_id')
      ->maxLength('pekerjaan_id', 27)
      ->requirePresence('pekerjaan_id', 'create')
      ->notEmpty('pekerjaan_id');

    $validator
      ->scalar('pekerjaan')
      ->maxLength('pekerjaan', 64)
      ->requirePresence('pekerjaan', 'create')
      ->notEmpty('pekerjaan');

    $validator
      ->uuid('created_by')
      ->requirePresence('created_by', 'create')
      ->notEmpty('created_by');

    $validator
      ->uuid('modified_by')
      ->allowEmpty('modified_by');

    $validator
      ->scalar('deleted')
      ->maxLength('deleted', 1)
      ->allowEmpty('deleted');

    return $validator;
  }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Penghasilan Model
 *
 * @method \App\Model\Entity\Penghasilan get($primaryKey, $options = [])
 * @method \App\Model\Entity\Penghasilan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Penghasilan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Penghasilan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Penghasilan|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Penghasilan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Penghasilan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Penghasilan findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PenghasilanTable extends Table
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

    $this->setTable('penghasilan');
    $this->setDisplayField('penghasilan');
    $this->setPrimaryKey('penghasilan_id');

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
      ->scalar('penghasilan_id')
      ->maxLength('penghasilan_id', 27)
      ->requirePresence('penghasilan', 'create')
      ->notEmpty('penghasilan');

    $validator
      ->scalar('penghasilan')
      ->maxLength('penghasilan', 32)
      ->requirePresence('penghasilan', 'create')
      ->notEmpty('penghasilan');

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

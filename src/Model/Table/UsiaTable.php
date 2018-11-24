<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usia Model
 *
 * @method \App\Model\Entity\Usium get($primaryKey, $options = [])
 * @method \App\Model\Entity\Usium newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Usium[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usium|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usium|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usium patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Usium[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usium findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsiaTable extends Table
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

    $this->setTable('usia');
    $this->setDisplayField('usia');
    $this->setPrimaryKey('usia_id');

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
      ->scalar('usia_id')
      ->maxLength('usia_id', 27)
      ->requirePresence('usia_id', 'create')
      ->notEmpty('usia_id');

    $validator
      ->scalar('usia')
      ->maxLength('usia', 8)
      ->requirePresence('usia', 'create')
      ->notEmpty('usia');

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

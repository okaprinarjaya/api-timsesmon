<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RelawanProfile Model
 *
 * @property \App\Model\Table\ElectionSessionTable|\Cake\ORM\Association\BelongsTo $ElectionSession
 * @property \App\Model\Table\UsiaTable|\Cake\ORM\Association\BelongsTo $Usia
 * @property \App\Model\Table\PekerjaanTable|\Cake\ORM\Association\BelongsTo $Pekerjaan
 * @property \App\Model\Table\PenghasilanTable|\Cake\ORM\Association\BelongsTo $Penghasilan
 *
 * @method \App\Model\Entity\RelawanProfile get($primaryKey, $options = [])
 * @method \App\Model\Entity\RelawanProfile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RelawanProfile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RelawanProfile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RelawanProfile|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RelawanProfile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RelawanProfile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RelawanProfile findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RelawanProfileTable extends Table
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

    $this->setTable('relawan_profile');
    $this->setDisplayField('nama');
    $this->setPrimaryKey('id');

    $this->addBehavior('Timestamp');

    $this->belongsTo('ElectionSession', [
      'foreignKey' => 'election_session_id',
      'joinType' => 'INNER'
    ]);
    $this->belongsTo('Usia', [
      'foreignKey' => 'usia_id',
      'joinType' => 'INNER'
    ]);
    $this->belongsTo('Pekerjaan', [
      'foreignKey' => 'pekerjaan_id',
      'joinType' => 'INNER'
    ]);
    $this->belongsTo('Penghasilan', [
      'foreignKey' => 'penghasilan_id',
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
      ->scalar('relawan_id')
      ->maxLength('relawan_id', 27)
      ->requirePresence('relawan_id', 'create')
      ->notEmpty('relawan_id');

    $validator
      ->scalar('nama')
      ->maxLength('nama', 32)
      ->requirePresence('nama', 'create')
      ->notEmpty('nama');

    $validator
      ->scalar('gender')
      ->maxLength('gender', 1)
      ->requirePresence('gender', 'create')
      ->notEmpty('gender');

    $validator
      ->email('email')
      ->allowEmpty('email');

    $validator
      ->scalar('alamat')
      ->maxLength('alamat', 512)
      ->allowEmpty('alamat');

    $validator
      ->scalar('phonenumber')
      ->maxLength('phonenumber', 20)
      ->allowEmpty('phonenumber');

    $validator
      ->scalar('photo_profile')
      ->maxLength('photo_profile', 128)
      ->allowEmpty('photo_profile');

    $validator
      ->scalar('target_canvasing')
      ->maxLength('target_canvasing', 128)
      ->allowEmpty('target_canvasing');

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

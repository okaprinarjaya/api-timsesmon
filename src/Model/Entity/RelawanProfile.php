<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RelawanProfile Entity
 *
 * @property int $id
 * @property string $relawan_id
 * @property string $nama
 * @property string $election_session_id
 * @property string $gender
 * @property string $usia_id
 * @property string $pekerjaan_id
 * @property string $penghasilan_id
 * @property string|null $email
 * @property string|null $alamat
 * @property string|null $phonenumber
 * @property string|null $photo_profile
 * @property string|null $target_canvasing
 * @property string $created_by
 * @property string|null $modified_by
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string $deleted
 */
class RelawanProfile extends Entity
{

  /**
   * Fields that can be mass assigned using newEntity() or patchEntity().
   *
   * Note that when '*' is set to true, this allows all unspecified fields to
   * be mass assigned. For security purposes, it is advised to set '*' to false
   * (or remove it), and explicitly make individual fields accessible as needed.
   *
   * @var array
   */
  protected $_accessible = [
    'relawan_id' => true,
    'nama' => true,
    'election_session_id' => true,
    'gender' => true,
    'usia_id' => true,
    'pekerjaan_id' => true,
    'penghasilan_id' => true,
    'email' => true,
    'alamat' => true,
    'phonenumber' => true,
    'photo_profile' => true,
    'target_canvasing' => true,
    'created_by' => true,
    'modified_by' => true,
    'created' => true,
    'modified' => true,
    'deleted' => true
  ];
}

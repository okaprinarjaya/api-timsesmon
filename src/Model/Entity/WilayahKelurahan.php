<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WilayahKelurahan Entity
 *
 * @property string $wilayah_prov_id
 * @property string $wilayah_kabkot_id
 * @property string $wilayah_kec_id
 * @property string $wilayah_kel_id
 * @property string $election_session_id
 * @property string $nama_prov
 * @property string $nama_kabkot
 * @property string $nama_kec
 * @property string $nama_kel
 * @property string|null $created_by
 * @property string|null $modified_by
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string $deleted
 */
class WilayahKelurahan extends Entity
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
    'wilayah_prov_id' => true,
    'wilayah_kabkot_id' => true,
    'wilayah_kec_id' => true,
    'wilayah_kel_id' => true,
    'election_session_id' => true,
    'nama_prov' => true,
    'nama_kabkot' => true,
    'nama_kec' => true,
    'nama_kel' => true,
    'created_by' => true,
    'modified_by' => true,
    'created' => true,
    'modified' => true,
    'deleted' => true
  ];
}

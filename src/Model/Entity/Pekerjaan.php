<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pekerjaan Entity
 *
 * @property int $id
 * @property string $pekerjaan
 * @property string $created_by
 * @property string|null $modified_by
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string $deleted
 *
 * @property \App\Model\Entity\RelawanProfile[] $relawan_profile
 */
class Pekerjaan extends Entity
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
    'pekerjaan_id' => true,
    'pekerjaan' => true,
    'created_by' => true,
    'modified_by' => true,
    'created' => true,
    'modified' => true,
    'deleted' => true
  ];
}

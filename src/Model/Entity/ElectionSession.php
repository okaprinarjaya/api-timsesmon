<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ElectionSession Entity
 *
 * @property string $election_session_id
 * @property string $nama_kegiatan
 * @property string $is_active
 * @property string $type_area
 * @property string|null $created_by
 * @property string|null $modified_by
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string $deleted
 */
class ElectionSession extends Entity
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
        'nama_kegiatan' => true,
        'is_active' => true,
        'type_area' => true,
        'created_by' => true,
        'modified_by' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MonitoresEvento Entity
 *
 * @property int $eventos_idevento
 * @property int $usuarios_idusuario
 * @property bool $compareceu
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class MonitoresEvento extends Entity
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
        '*' => true,
        'eventos_idevento' => false,
        'usuarios_idusuario' => false
    ];
}

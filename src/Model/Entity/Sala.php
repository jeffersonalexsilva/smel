<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sala Entity
 *
 * @property int $idsalas
 * @property string $titulo
 * @property string $coordenadas
 * @property int $ocupacao
 * @property int $andar
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $blocos_idblocos
 */
class Sala extends Entity
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
        'idsalas' => false
    ];
}

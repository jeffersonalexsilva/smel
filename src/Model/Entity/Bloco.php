<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bloco Entity
 *
 * @property int $idblocos
 * @property string $titulo
 * @property string $coordenadas
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $unidades_idunidades
 */
class Bloco extends Entity
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
        'idblocos' => false
    ];
}

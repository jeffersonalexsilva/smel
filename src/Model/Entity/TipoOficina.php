<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TipoOficina Entity
 *
 * @property int $idtipo_oficina
 * @property string $descricao
 * @property bool $necessita_inscricao
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class TipoOficina extends Entity
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
        'idtipo_oficina' => false
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MaisInfo Entity
 *
 * @property int $idmais_info
 * @property string $tipo_graduacao
 * @property string $curso
 * @property int $periodo_ano
 * @property int $periodo_entrada
 * @property string $departamento_nucleo
 * @property string $siape
 * @property string $setor
 * @property string $funcao
 * @property string $instituicao
 * @property int $usuario_idusuario
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class MaisInfo extends Entity
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
        'idmais_info' => false
    ];
}

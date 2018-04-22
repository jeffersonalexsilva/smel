<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LogAcesso Entity
 *
 * @property int $idlog_acesso
 * @property \Cake\I18n\FrozenTime $data_hora
 * @property string $ip_acesso
 * @property int $usuario_idusuario
 */
class LogAcesso extends Entity
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
        'idlog_acesso' => false
    ];
}

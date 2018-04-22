<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Agenda Entity
 *
 * @property int $idagendas
 * @property string $descricao
 * @property \Cake\I18n\FrozenTime $data_hora_inicio
 * @property \Cake\I18n\FrozenTime $data_hora_fim
 * @property int $carga_horaria
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $tipo_atividades_idtipo_atividades
 */
class Agenda extends Entity
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
        'idagendas' => false
    ];
}

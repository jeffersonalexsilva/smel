<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PresencaMonitore Entity
 *
 * @property int $monitores_eventos_eventos_idevento
 * @property int $monitores_eventos_usuarios_idusuario
 * @property int $data_horas_iddata_hora
 * @property int $oficina_cursos_idoficina_curso
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class PresencaMonitore extends Entity
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
        'monitores_eventos_eventos_idevento' => false,
        'monitores_eventos_usuarios_idusuario' => false,
        'data_horas_iddata_hora' => false,
        'oficina_cursos_idoficina_curso' => false
    ];
}

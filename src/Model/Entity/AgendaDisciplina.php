<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AgendaDisciplina Entity
 *
 * @property int $disciplinas_iddisciplinas
 * @property int $salas_idsalas
 * @property int $agendas_idagendas
 */
class AgendaDisciplina extends Entity
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
        'disciplinas_iddisciplinas' => false,
        'salas_idsalas' => false,
        'agendas_idagendas' => false
    ];
}

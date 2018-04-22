<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OficinaCursoHasUsuario Entity
 *
 * @property int $oficina_curso_idoficina_curso
 * @property int $usuario_idusuario
 * @property int $data_horas_iddata_hora
 * @property bool $presente
 */
class OficinaCursoHasUsuario extends Entity
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
        'oficina_curso_idoficina_curso' => false,
        'usuario_idusuario' => false,
        'data_horas_iddata_hora' => false
    ];
}

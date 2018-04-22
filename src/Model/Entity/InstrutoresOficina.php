<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InstrutoresOficina Entity
 *
 * @property int $oficina_cursos_idoficina_curso
 * @property int $usuarios_idusuario
 */
class InstrutoresOficina extends Entity
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
        'oficina_cursos_idoficina_curso' => false,
        'usuarios_idusuario' => false
    ];
}

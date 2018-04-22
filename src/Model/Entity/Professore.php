<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Professore Entity
 *
 * @property int $idprofessores
 * @property string $nome
 * @property string $url_lattes
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $nucleos_idnucleos
 *
 * @property \App\Model\Entity\Usuario[] $usuarios
 */
class Professore extends Entity
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
        'idprofessores' => false
    ];
}

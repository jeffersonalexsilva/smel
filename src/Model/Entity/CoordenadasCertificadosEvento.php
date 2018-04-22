<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CoordenadasCertificadosEvento Entity
 *
 * @property int $coordenadas_certificados_idcoordenadas_certificados
 * @property int $eventos_idevento
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class CoordenadasCertificadosEvento extends Entity
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
        'coordenadas_certificados_idcoordenadas_certificados' => false,
        'eventos_idevento' => false
    ];
}

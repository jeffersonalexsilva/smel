<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CoordenadasCertificado Entity
 *
 * @property int $idcoordenadas_certificados
 * @property int $nome_x
 * @property int $nome_y
 * @property int $descricao_x
 * @property int $descricao_y
 * @property int $ch_x
 * @property int $ch_y
 * @property string $uri_template
 * @property int $tamanho_fonte_nome
 * @property int $tamanho_fonte_descricao
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Evento[] $eventos
 */
class CoordenadasCertificado extends Entity
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
        'idcoordenadas_certificados' => false
    ];
}

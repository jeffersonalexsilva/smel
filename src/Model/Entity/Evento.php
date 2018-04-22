<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Evento Entity
 *
 * @property int $idevento
 * @property string $descricao
 * @property \Cake\I18n\FrozenTime $data_hora_inicio
 * @property \Cake\I18n\FrozenTime $data_hora_fim
 * @property \Cake\I18n\FrozenTime $data_hora_inicio_inscricao
 * @property \Cake\I18n\FrozenTime $data_hora_fim_inscricao
 * @property \Cake\I18n\FrozenTime $data_hora_inicio_submissao
 * @property \Cake\I18n\FrozenTime $data_hora_fim_submissao
 * @property \Cake\I18n\FrozenTime $data_hora_inicio_monitoria
 * @property \Cake\I18n\FrozenTime $data_hora_fim_monitoria
 * @property string $coordenadas_certificado
 * @property string $site_evento
 * @property string $email_evento
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\CoordenadasCertificado[] $coordenadas_certificados
 */
class Evento extends Entity
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
        'idevento' => false
    ];
}

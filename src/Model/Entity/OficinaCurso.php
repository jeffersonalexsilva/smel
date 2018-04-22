<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OficinaCurso Entity
 *
 * @property int $idoficina_curso
 * @property string $descricao
 * @property string $instrutor
 * @property int $vagas_oferecidas
 * @property int $vagas_restantes
 * @property string $observacao
 * @property string $local
 * @property int $data_hora_iddata_hora
 * @property int $eventos_idevento
 * @property int $tipo_oficina_idtipo_oficina
 * @property bool $continua
 * @property int $oficina_dependente
 * @property int $usuarios_idusuario
 * @property int $status_oficinas_idstatus_oficinas
 * @property bool $realizada
 * @property string $resumo
 * @property string $materiais_equipamentos
 * @property string $publico_alvo
 * @property int $carga_horaria
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $salas_idsalas
 */
class OficinaCurso extends Entity
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
        'idoficina_curso' => false
    ];
}

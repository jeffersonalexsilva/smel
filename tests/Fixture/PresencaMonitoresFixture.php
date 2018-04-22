<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PresencaMonitoresFixture
 *
 */
class PresencaMonitoresFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'monitores_eventos_eventos_idevento' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'monitores_eventos_usuarios_idusuario' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'data_horas_iddata_hora' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'oficina_cursos_idoficina_curso' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_presenca_monitores_data_hora1_idx' => ['type' => 'index', 'columns' => ['data_horas_iddata_hora'], 'length' => []],
            'fk_presenca_monitores_monitoes_eventos1_idx' => ['type' => 'index', 'columns' => ['monitores_eventos_eventos_idevento', 'monitores_eventos_usuarios_idusuario'], 'length' => []],
            'fk_presenca_monitores_oficina_cursos1_idx' => ['type' => 'index', 'columns' => ['oficina_cursos_idoficina_curso'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['monitores_eventos_eventos_idevento', 'monitores_eventos_usuarios_idusuario', 'data_horas_iddata_hora', 'oficina_cursos_idoficina_curso'], 'length' => []],
            'fk_presenca_monitores_data_horas1' => ['type' => 'foreign', 'columns' => ['data_horas_iddata_hora'], 'references' => ['data_horas', 'iddata_hora'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_presenca_monitores_monitores_eventos1' => ['type' => 'foreign', 'columns' => ['monitores_eventos_eventos_idevento', 'monitores_eventos_usuarios_idusuario'], 'references' => ['monitores_eventos', '1' => ['eventos_idevento', 'usuarios_idusuario']], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_presenca_monitores_oficina_cursos1' => ['type' => 'foreign', 'columns' => ['oficina_cursos_idoficina_curso'], 'references' => ['oficina_cursos', 'idoficina_curso'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'monitores_eventos_eventos_idevento' => 1,
            'monitores_eventos_usuarios_idusuario' => 1,
            'data_horas_iddata_hora' => 1,
            'oficina_cursos_idoficina_curso' => 1,
            'created' => '2017-10-01 00:09:05',
            'modified' => '2017-10-01 00:09:05'
        ],
    ];
}

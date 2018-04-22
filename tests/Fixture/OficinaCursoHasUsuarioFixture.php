<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OficinaCursoHasUsuarioFixture
 *
 */
class OficinaCursoHasUsuarioFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'oficina_curso_has_usuario';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'oficina_curso_idoficina_curso' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'usuario_idusuario' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'data_horas_iddata_hora' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'presente' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_oficina_curso_has_usuario_usuario1_idx' => ['type' => 'index', 'columns' => ['usuario_idusuario'], 'length' => []],
            'fk_oficina_curso_has_usuario_oficina_curso1_idx' => ['type' => 'index', 'columns' => ['oficina_curso_idoficina_curso'], 'length' => []],
            'fk_oficina_curso_has_usuario_data_horas1_idx' => ['type' => 'index', 'columns' => ['data_horas_iddata_hora'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['oficina_curso_idoficina_curso', 'usuario_idusuario', 'data_horas_iddata_hora'], 'length' => []],
            'fk_oficina_curso_has_usuario_data_horas1' => ['type' => 'foreign', 'columns' => ['data_horas_iddata_hora'], 'references' => ['data_horas', 'iddata_hora'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_oficina_curso_has_usuario_oficina_curso1' => ['type' => 'foreign', 'columns' => ['oficina_curso_idoficina_curso'], 'references' => ['oficina_cursos', 'idoficina_curso'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_oficina_curso_has_usuario_usuario1' => ['type' => 'foreign', 'columns' => ['usuario_idusuario'], 'references' => ['usuarios', 'idusuario'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_bin'
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
            'oficina_curso_idoficina_curso' => 1,
            'usuario_idusuario' => 1,
            'data_horas_iddata_hora' => 1,
            'presente' => 1
        ],
    ];
}

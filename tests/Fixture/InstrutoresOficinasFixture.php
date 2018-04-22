<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InstrutoresOficinasFixture
 *
 */
class InstrutoresOficinasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'oficina_cursos_idoficina_curso' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'usuarios_idusuario' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_oficina_cursos_has_usuarios_usuarios1_idx' => ['type' => 'index', 'columns' => ['usuarios_idusuario'], 'length' => []],
            'fk_oficina_cursos_has_usuarios_oficina_cursos1_idx' => ['type' => 'index', 'columns' => ['oficina_cursos_idoficina_curso'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['oficina_cursos_idoficina_curso', 'usuarios_idusuario'], 'length' => []],
            'fk_oficina_cursos_has_usuarios_oficina_cursos1' => ['type' => 'foreign', 'columns' => ['oficina_cursos_idoficina_curso'], 'references' => ['oficina_cursos', 'idoficina_curso'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_oficina_cursos_has_usuarios_usuarios1' => ['type' => 'foreign', 'columns' => ['usuarios_idusuario'], 'references' => ['usuarios', 'idusuario'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'oficina_cursos_idoficina_curso' => 1,
            'usuarios_idusuario' => 1
        ],
    ];
}

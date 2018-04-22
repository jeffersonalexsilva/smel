<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsuariosProfessoresFixture
 *
 */
class UsuariosProfessoresFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'usuarios_idusuario' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'professores_idprofessores' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_usuarios_professores_professores1_idx' => ['type' => 'index', 'columns' => ['professores_idprofessores'], 'length' => []],
            'fk_usuarios_professores_usuarios1_idx' => ['type' => 'index', 'columns' => ['usuarios_idusuario'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['usuarios_idusuario', 'professores_idprofessores'], 'length' => []],
            'fk_usuarios_professores_professores1' => ['type' => 'foreign', 'columns' => ['professores_idprofessores'], 'references' => ['professores', 'idprofessores'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_usuarios_professores_usuarios1' => ['type' => 'foreign', 'columns' => ['usuarios_idusuario'], 'references' => ['usuarios', 'idusuario'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'usuarios_idusuario' => 1,
            'professores_idprofessores' => 1,
            'created' => '2017-10-01 00:09:09',
            'modified' => '2017-10-01 00:09:09'
        ],
    ];
}

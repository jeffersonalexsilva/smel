<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MonitoresEventosFixture
 *
 */
class MonitoresEventosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'eventos_idevento' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'usuarios_idusuario' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'compareceu' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_eventos_has_usuarios_usuarios1_idx' => ['type' => 'index', 'columns' => ['usuarios_idusuario'], 'length' => []],
            'fk_eventos_has_usuarios_eventos1_idx' => ['type' => 'index', 'columns' => ['eventos_idevento'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['eventos_idevento', 'usuarios_idusuario'], 'length' => []],
            'fk_eventos_has_usuarios_eventos1' => ['type' => 'foreign', 'columns' => ['eventos_idevento'], 'references' => ['eventos', 'idevento'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_eventos_has_usuarios_usuarios1' => ['type' => 'foreign', 'columns' => ['usuarios_idusuario'], 'references' => ['usuarios', 'idusuario'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'eventos_idevento' => 1,
            'usuarios_idusuario' => 1,
            'compareceu' => 1,
            'created' => '2017-10-01 00:09:01',
            'modified' => '2017-10-01 00:09:01'
        ],
    ];
}

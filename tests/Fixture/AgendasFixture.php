<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AgendasFixture
 *
 */
class AgendasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'idagendas' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'descricao' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'data_hora_inicio' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'data_hora_fim' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'carga_horaria' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Em minutos', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'tipo_atividades_idtipo_atividades' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_agendas_tipo_atividades1_idx' => ['type' => 'index', 'columns' => ['tipo_atividades_idtipo_atividades'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['idagendas'], 'length' => []],
            'fk_agendas_tipo_atividades1' => ['type' => 'foreign', 'columns' => ['tipo_atividades_idtipo_atividades'], 'references' => ['tipo_atividades', 'idtipo_atividades'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'idagendas' => 1,
            'descricao' => 'Lorem ipsum dolor sit amet',
            'data_hora_inicio' => '2017-10-01 00:08:53',
            'data_hora_fim' => '2017-10-01 00:08:53',
            'carga_horaria' => 1,
            'created' => '2017-10-01 00:08:53',
            'modified' => '2017-10-01 00:08:53',
            'tipo_atividades_idtipo_atividades' => 1
        ],
    ];
}

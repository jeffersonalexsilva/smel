<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EventosFixture
 *
 */
class EventosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'idevento' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'descricao' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'data_hora_inicio' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'data_hora_fim' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'data_hora_inicio_inscricao' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'data_hora_fim_inscricao' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'data_hora_inicio_submissao' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'data_hora_fim_submissao' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'data_hora_inicio_monitoria' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'data_hora_fim_monitoria' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'coordenadas_certificado' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'site_evento' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => 'www.siteevento.com', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'email_evento' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => 'emailevanto@servidor.com', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['idevento'], 'length' => []],
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
            'idevento' => 1,
            'descricao' => 'Lorem ipsum dolor sit amet',
            'data_hora_inicio' => '2017-10-01 00:08:59',
            'data_hora_fim' => '2017-10-01 00:08:59',
            'data_hora_inicio_inscricao' => '2017-10-01 00:08:59',
            'data_hora_fim_inscricao' => '2017-10-01 00:08:59',
            'data_hora_inicio_submissao' => '2017-10-01 00:08:59',
            'data_hora_fim_submissao' => '2017-10-01 00:08:59',
            'data_hora_inicio_monitoria' => '2017-10-01 00:08:59',
            'data_hora_fim_monitoria' => '2017-10-01 00:08:59',
            'coordenadas_certificado' => 'Lorem ipsum dolor sit amet',
            'site_evento' => 'Lorem ipsum dolor sit amet',
            'email_evento' => 'Lorem ipsum dolor sit amet',
            'created' => '2017-10-01 00:08:59',
            'modified' => '2017-10-01 00:08:59'
        ],
    ];
}

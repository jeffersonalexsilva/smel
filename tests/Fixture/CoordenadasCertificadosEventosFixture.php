<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CoordenadasCertificadosEventosFixture
 *
 */
class CoordenadasCertificadosEventosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'coordenadas_certificados_idcoordenadas_certificados' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'eventos_idevento' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_coordenadas_certificados_eventos_eventos1_idx' => ['type' => 'index', 'columns' => ['eventos_idevento'], 'length' => []],
            'fk_coordenadas_certificados_eventos_coordenadas_certifi_idx' => ['type' => 'index', 'columns' => ['coordenadas_certificados_idcoordenadas_certificados'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['coordenadas_certificados_idcoordenadas_certificados', 'eventos_idevento'], 'length' => []],
            'fk_coordenadas_certificados_eventos_coordenadas_certifica1' => ['type' => 'foreign', 'columns' => ['coordenadas_certificados_idcoordenadas_certificados'], 'references' => ['coordenadas_certificados', 'idcoordenadas_certificados'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_coordenadas_certificados_eventos_eventos1' => ['type' => 'foreign', 'columns' => ['eventos_idevento'], 'references' => ['eventos', 'idevento'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'coordenadas_certificados_idcoordenadas_certificados' => 1,
            'eventos_idevento' => 1,
            'created' => '2017-10-01 00:08:56',
            'modified' => '2017-10-01 00:08:56'
        ],
    ];
}

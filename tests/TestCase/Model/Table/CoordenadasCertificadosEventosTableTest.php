<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CoordenadasCertificadosEventosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CoordenadasCertificadosEventosTable Test Case
 */
class CoordenadasCertificadosEventosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CoordenadasCertificadosEventosTable
     */
    public $CoordenadasCertificadosEventos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.coordenadas_certificados_eventos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CoordenadasCertificadosEventos') ? [] : ['className' => CoordenadasCertificadosEventosTable::class];
        $this->CoordenadasCertificadosEventos = TableRegistry::get('CoordenadasCertificadosEventos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CoordenadasCertificadosEventos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

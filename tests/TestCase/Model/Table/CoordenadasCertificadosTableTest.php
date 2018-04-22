<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CoordenadasCertificadosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CoordenadasCertificadosTable Test Case
 */
class CoordenadasCertificadosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CoordenadasCertificadosTable
     */
    public $CoordenadasCertificados;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.coordenadas_certificados',
        'app.eventos',
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
        $config = TableRegistry::exists('CoordenadasCertificados') ? [] : ['className' => CoordenadasCertificadosTable::class];
        $this->CoordenadasCertificados = TableRegistry::get('CoordenadasCertificados', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CoordenadasCertificados);

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

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MonitoresEventosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MonitoresEventosTable Test Case
 */
class MonitoresEventosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MonitoresEventosTable
     */
    public $MonitoresEventos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.monitores_eventos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MonitoresEventos') ? [] : ['className' => MonitoresEventosTable::class];
        $this->MonitoresEventos = TableRegistry::get('MonitoresEventos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MonitoresEventos);

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

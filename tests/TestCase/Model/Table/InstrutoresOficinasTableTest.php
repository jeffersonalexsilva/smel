<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InstrutoresOficinasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InstrutoresOficinasTable Test Case
 */
class InstrutoresOficinasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InstrutoresOficinasTable
     */
    public $InstrutoresOficinas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.instrutores_oficinas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InstrutoresOficinas') ? [] : ['className' => InstrutoresOficinasTable::class];
        $this->InstrutoresOficinas = TableRegistry::get('InstrutoresOficinas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InstrutoresOficinas);

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

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DataHorasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DataHorasTable Test Case
 */
class DataHorasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DataHorasTable
     */
    public $DataHoras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.data_horas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DataHoras') ? [] : ['className' => DataHorasTable::class];
        $this->DataHoras = TableRegistry::get('DataHoras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DataHoras);

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

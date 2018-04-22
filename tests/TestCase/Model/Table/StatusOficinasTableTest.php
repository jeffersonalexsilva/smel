<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StatusOficinasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StatusOficinasTable Test Case
 */
class StatusOficinasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StatusOficinasTable
     */
    public $StatusOficinas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.status_oficinas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('StatusOficinas') ? [] : ['className' => StatusOficinasTable::class];
        $this->StatusOficinas = TableRegistry::get('StatusOficinas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StatusOficinas);

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

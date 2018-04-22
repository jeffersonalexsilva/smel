<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BlocosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BlocosTable Test Case
 */
class BlocosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BlocosTable
     */
    public $Blocos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.blocos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Blocos') ? [] : ['className' => BlocosTable::class];
        $this->Blocos = TableRegistry::get('Blocos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Blocos);

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

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MaisInfosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MaisInfosTable Test Case
 */
class MaisInfosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MaisInfosTable
     */
    public $MaisInfos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mais_infos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MaisInfos') ? [] : ['className' => MaisInfosTable::class];
        $this->MaisInfos = TableRegistry::get('MaisInfos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MaisInfos);

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

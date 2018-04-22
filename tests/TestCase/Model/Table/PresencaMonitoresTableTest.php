<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PresencaMonitoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PresencaMonitoresTable Test Case
 */
class PresencaMonitoresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PresencaMonitoresTable
     */
    public $PresencaMonitores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.presenca_monitores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PresencaMonitores') ? [] : ['className' => PresencaMonitoresTable::class];
        $this->PresencaMonitores = TableRegistry::get('PresencaMonitores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PresencaMonitores);

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

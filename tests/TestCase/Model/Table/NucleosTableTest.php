<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NucleosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NucleosTable Test Case
 */
class NucleosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NucleosTable
     */
    public $Nucleos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.nucleos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Nucleos') ? [] : ['className' => NucleosTable::class];
        $this->Nucleos = TableRegistry::get('Nucleos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Nucleos);

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

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AgendaDisciplinasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AgendaDisciplinasTable Test Case
 */
class AgendaDisciplinasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AgendaDisciplinasTable
     */
    public $AgendaDisciplinas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.agenda_disciplinas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AgendaDisciplinas') ? [] : ['className' => AgendaDisciplinasTable::class];
        $this->AgendaDisciplinas = TableRegistry::get('AgendaDisciplinas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AgendaDisciplinas);

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

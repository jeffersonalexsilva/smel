<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OficinaCursosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OficinaCursosTable Test Case
 */
class OficinaCursosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OficinaCursosTable
     */
    public $OficinaCursos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.oficina_cursos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OficinaCursos') ? [] : ['className' => OficinaCursosTable::class];
        $this->OficinaCursos = TableRegistry::get('OficinaCursos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OficinaCursos);

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

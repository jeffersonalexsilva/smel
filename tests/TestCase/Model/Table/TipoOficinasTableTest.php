<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoOficinasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoOficinasTable Test Case
 */
class TipoOficinasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoOficinasTable
     */
    public $TipoOficinas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tipo_oficinas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TipoOficinas') ? [] : ['className' => TipoOficinasTable::class];
        $this->TipoOficinas = TableRegistry::get('TipoOficinas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TipoOficinas);

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

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoAtividadesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoAtividadesTable Test Case
 */
class TipoAtividadesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoAtividadesTable
     */
    public $TipoAtividades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tipo_atividades'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TipoAtividades') ? [] : ['className' => TipoAtividadesTable::class];
        $this->TipoAtividades = TableRegistry::get('TipoAtividades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TipoAtividades);

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

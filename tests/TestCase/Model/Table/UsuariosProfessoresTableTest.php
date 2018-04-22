<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsuariosProfessoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsuariosProfessoresTable Test Case
 */
class UsuariosProfessoresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsuariosProfessoresTable
     */
    public $UsuariosProfessores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.usuarios_professores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsuariosProfessores') ? [] : ['className' => UsuariosProfessoresTable::class];
        $this->UsuariosProfessores = TableRegistry::get('UsuariosProfessores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsuariosProfessores);

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

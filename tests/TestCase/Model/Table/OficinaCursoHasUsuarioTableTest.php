<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OficinaCursoHasUsuarioTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OficinaCursoHasUsuarioTable Test Case
 */
class OficinaCursoHasUsuarioTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OficinaCursoHasUsuarioTable
     */
    public $OficinaCursoHasUsuario;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.oficina_curso_has_usuario'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OficinaCursoHasUsuario') ? [] : ['className' => OficinaCursoHasUsuarioTable::class];
        $this->OficinaCursoHasUsuario = TableRegistry::get('OficinaCursoHasUsuario', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OficinaCursoHasUsuario);

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

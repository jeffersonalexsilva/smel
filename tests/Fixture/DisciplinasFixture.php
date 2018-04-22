<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DisciplinasFixture
 *
 */
class DisciplinasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'iddisciplinas' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'titulo' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'codigo' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'professores_idprofessores' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cursos_idcursos' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_disciplinas_professores1_idx' => ['type' => 'index', 'columns' => ['professores_idprofessores'], 'length' => []],
            'fk_disciplinas_cursos1_idx' => ['type' => 'index', 'columns' => ['cursos_idcursos'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['iddisciplinas'], 'length' => []],
            'fk_disciplinas_cursos1' => ['type' => 'foreign', 'columns' => ['cursos_idcursos'], 'references' => ['cursos', 'idcursos'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_disciplinas_professores1' => ['type' => 'foreign', 'columns' => ['professores_idprofessores'], 'references' => ['professores', 'idprofessores'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'iddisciplinas' => 1,
            'titulo' => 'Lorem ipsum dolor sit amet',
            'codigo' => 'Lorem ipsum dolor sit amet',
            'created' => '2017-10-01 00:08:58',
            'modified' => '2017-10-01 00:08:58',
            'professores_idprofessores' => 1,
            'cursos_idcursos' => 1
        ],
    ];
}

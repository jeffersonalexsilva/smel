<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AgendaDisciplinasFixture
 *
 */
class AgendaDisciplinasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'disciplinas_iddisciplinas' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'salas_idsalas' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'agendas_idagendas' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_agenda_disciplinas_salas1_idx' => ['type' => 'index', 'columns' => ['salas_idsalas'], 'length' => []],
            'fk_agenda_disciplinas_disciplinas1_idx' => ['type' => 'index', 'columns' => ['disciplinas_iddisciplinas'], 'length' => []],
            'fk_agenda_disciplina_agendas1_idx' => ['type' => 'index', 'columns' => ['agendas_idagendas'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['disciplinas_iddisciplinas', 'salas_idsalas', 'agendas_idagendas'], 'length' => []],
            'fk_agenda_disciplinas_agendas1' => ['type' => 'foreign', 'columns' => ['agendas_idagendas'], 'references' => ['agendas', 'idagendas'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_agenda_disciplinas_disciplinas1' => ['type' => 'foreign', 'columns' => ['disciplinas_iddisciplinas'], 'references' => ['disciplinas', 'iddisciplinas'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_agenda_disciplinas_salas1' => ['type' => 'foreign', 'columns' => ['salas_idsalas'], 'references' => ['salas', 'idsalas'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'disciplinas_iddisciplinas' => 1,
            'salas_idsalas' => 1,
            'agendas_idagendas' => 1
        ],
    ];
}

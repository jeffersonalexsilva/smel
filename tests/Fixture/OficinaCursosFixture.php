<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OficinaCursosFixture
 *
 */
class OficinaCursosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'idoficina_curso' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'descricao' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'instrutor' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'vagas_oferecidas' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'vagas_restantes' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'observacao' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null],
        'local' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'data_hora_iddata_hora' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'eventos_idevento' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tipo_oficina_idtipo_oficina' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'continua' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null],
        'oficina_dependente' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'usuarios_idusuario' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'status_oficinas_idstatus_oficinas' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '2', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'realizada' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'comment' => 'Define que a atividade realmente aconteceu e o palestrante está apto para receber a declaração', 'precision' => null],
        'resumo' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null],
        'materiais_equipamentos' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null],
        'publico_alvo' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'carga_horaria' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'salas_idsalas' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_oficina_cursos_data_hora1_idx' => ['type' => 'index', 'columns' => ['data_hora_iddata_hora'], 'length' => []],
            'fk_oficina_cursos_eventos1_idx' => ['type' => 'index', 'columns' => ['eventos_idevento'], 'length' => []],
            'fk_oficina_cursos_tipo_oficina1_idx' => ['type' => 'index', 'columns' => ['tipo_oficina_idtipo_oficina'], 'length' => []],
            'fk_oficina_cursos_oficina_cursos1_idx' => ['type' => 'index', 'columns' => ['oficina_dependente'], 'length' => []],
            'fk_oficina_cursos_usuarios1_idx' => ['type' => 'index', 'columns' => ['usuarios_idusuario'], 'length' => []],
            'fk_oficina_cursos_status_oficinas1_idx' => ['type' => 'index', 'columns' => ['status_oficinas_idstatus_oficinas'], 'length' => []],
            'fk_oficina_cursos_salas1_idx' => ['type' => 'index', 'columns' => ['salas_idsalas'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['idoficina_curso'], 'length' => []],
            'fk_oficina_cursos_data_hora1' => ['type' => 'foreign', 'columns' => ['data_hora_iddata_hora'], 'references' => ['data_horas', 'iddata_hora'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_oficina_cursos_eventos1' => ['type' => 'foreign', 'columns' => ['eventos_idevento'], 'references' => ['eventos', 'idevento'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_oficina_cursos_oficina_cursos1' => ['type' => 'foreign', 'columns' => ['oficina_dependente'], 'references' => ['oficina_cursos', 'idoficina_curso'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_oficina_cursos_salas1' => ['type' => 'foreign', 'columns' => ['salas_idsalas'], 'references' => ['salas', 'idsalas'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_oficina_cursos_status_oficinas1' => ['type' => 'foreign', 'columns' => ['status_oficinas_idstatus_oficinas'], 'references' => ['status_oficinas', 'idstatus_oficinas'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_oficina_cursos_tipo_oficina1' => ['type' => 'foreign', 'columns' => ['tipo_oficina_idtipo_oficina'], 'references' => ['tipo_oficinas', 'idtipo_oficina'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_oficina_cursos_usuarios1' => ['type' => 'foreign', 'columns' => ['usuarios_idusuario'], 'references' => ['usuarios', 'idusuario'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_bin'
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
            'idoficina_curso' => 1,
            'descricao' => 'Lorem ipsum dolor sit amet',
            'instrutor' => 'Lorem ipsum dolor sit amet',
            'vagas_oferecidas' => 1,
            'vagas_restantes' => 1,
            'observacao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'local' => 'Lorem ipsum dolor sit amet',
            'data_hora_iddata_hora' => 1,
            'eventos_idevento' => 1,
            'tipo_oficina_idtipo_oficina' => 1,
            'continua' => 1,
            'oficina_dependente' => 1,
            'usuarios_idusuario' => 1,
            'status_oficinas_idstatus_oficinas' => 1,
            'realizada' => 1,
            'resumo' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'materiais_equipamentos' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'publico_alvo' => 'Lorem ipsum dolor sit amet',
            'carga_horaria' => 1,
            'created' => '2017-10-01 00:09:03',
            'modified' => '2017-10-01 00:09:03',
            'salas_idsalas' => 1
        ],
    ];
}

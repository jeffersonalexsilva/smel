<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PresencaMonitores Model
 *
 * @method \App\Model\Entity\PresencaMonitore get($primaryKey, $options = [])
 * @method \App\Model\Entity\PresencaMonitore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PresencaMonitore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PresencaMonitore|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PresencaMonitore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PresencaMonitore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PresencaMonitore findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PresencaMonitoresTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('presenca_monitores');
        $this->setDisplayField('monitores_eventos_eventos_idevento');
        $this->setPrimaryKey(['monitores_eventos_eventos_idevento', 'monitores_eventos_usuarios_idusuario', 'data_horas_iddata_hora', 'oficina_cursos_idoficina_curso']);

        $this->addBehavior('Timestamp');
        
        ///associations
        $this->belongsTo('MonitoresEventos')
        ->setForeignKey(['monitores_eventos_eventos_idevento','monitores_eventos_usuarios_idusuario'])
        -setJoinType('INNER');
        
        $this->belongsTo('DataHoras')
        ->setForeignKey('data_horas_iddata_hora')
        -setJoinType('INNER');
        
        $this->belongsTo('OficinaCursos')
        ->setForeignKey('oficina_cursos_idoficina_curso')
        -setJoinType('INNER');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('monitores_eventos_eventos_idevento')
            ->allowEmpty('monitores_eventos_eventos_idevento', 'create');

        $validator
            ->integer('monitores_eventos_usuarios_idusuario')
            ->allowEmpty('monitores_eventos_usuarios_idusuario', 'create');

        $validator
            ->integer('data_horas_iddata_hora')
            ->allowEmpty('data_horas_iddata_hora', 'create');

        $validator
            ->integer('oficina_cursos_idoficina_curso')
            ->allowEmpty('oficina_cursos_idoficina_curso', 'create');

        return $validator;
    }
}

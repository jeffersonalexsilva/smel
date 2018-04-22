<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AgendaDisciplinas Model
 *
 * @method \App\Model\Entity\AgendaDisciplina get($primaryKey, $options = [])
 * @method \App\Model\Entity\AgendaDisciplina newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AgendaDisciplina[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AgendaDisciplina|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AgendaDisciplina patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AgendaDisciplina[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AgendaDisciplina findOrCreate($search, callable $callback = null, $options = [])
 */
class AgendaDisciplinasTable extends Table
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

        $this->setTable('agenda_disciplinas');
        $this->setDisplayField('disciplinas_iddisciplinas');
        $this->setPrimaryKey(['disciplinas_iddisciplinas', 'salas_idsalas', 'agendas_idagendas']);
        //Associations
        $this->belongsTo('Disciplinas')
            ->setForeignKey('disciplinas_iddisciplinas')
            -setJoinType('INNER');
        
        $this->belongsTo('Salas')
            ->setForeignKey('salas_idsalas')
            -setJoinType('INNER');
        
        $this->belongsTo('Agendas')
            ->setForeignKey('agendas_idagendas')
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
            ->integer('disciplinas_iddisciplinas')
            ->allowEmpty('disciplinas_iddisciplinas', 'create');

        $validator
            ->integer('salas_idsalas')
            ->allowEmpty('salas_idsalas', 'create');

        $validator
            ->integer('agendas_idagendas')
            ->allowEmpty('agendas_idagendas', 'create');

        return $validator;
    }
}

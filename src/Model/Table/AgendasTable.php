<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Agendas Model
 *
 * @method \App\Model\Entity\Agenda get($primaryKey, $options = [])
 * @method \App\Model\Entity\Agenda newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Agenda[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Agenda|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Agenda patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Agenda[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Agenda findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AgendasTable extends Table
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

        $this->setTable('agendas');
        $this->setDisplayField('idagendas');
        $this->setPrimaryKey('idagendas');

        $this->addBehavior('Timestamp');
        
        //associations
        $this->hasOne('TipoOficinas')
        ->setForeignKey('tipo_oficinas_idtipo_oficinas');
        
        //associação as disciplinas
        $this->belongsToMany('Disciplinas')
        ->setForeignKey('disciplinas_iddisciplinas')
        ->setJoinTable('agenda_disciplinas');

        //associação com salas
        $this->belongsToMany('Salas')
        ->setForeignKey('salas_idsalas')
        ->setJoinTable('agenda_disciplinas');
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
            ->integer('idagendas')
            ->allowEmpty('idagendas', 'create');

        $validator
            ->allowEmpty('descricao');

        $validator
            ->dateTime('data_hora_inicio')
            ->allowEmpty('data_hora_inicio');

        $validator
            ->dateTime('data_hora_fim')
            ->allowEmpty('data_hora_fim');

        $validator
            ->integer('carga_horaria')
            ->allowEmpty('carga_horaria');

        $validator
            ->integer('tipo_oficinas_idtipo_oficinas')
            ->requirePresence('tipo_oficinas_idtipo_oficinas', 'create')
            ->notEmpty('tipo_oficinas_idtipo_oficinas');

        return $validator;
    }
}

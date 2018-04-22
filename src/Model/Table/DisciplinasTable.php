<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Disciplinas Model
 *
 * @method \App\Model\Entity\Disciplina get($primaryKey, $options = [])
 * @method \App\Model\Entity\Disciplina newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Disciplina[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Disciplina|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Disciplina patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Disciplina[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Disciplina findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DisciplinasTable extends Table
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

        $this->setTable('disciplinas');
        $this->setDisplayField('iddisciplinas');
        $this->setPrimaryKey('iddisciplinas');

        $this->addBehavior('Timestamp');

        //associations
        $this->hasOne('Professores')
        ->setForeignKey('professores_idprofessores');
        
        $this->hasOne('Cursos')
        ->setForeignKey('cursos_idcursos');
        
        $this->belongsToMany('AgendaDisciplinas')
        ->setForeignKey('disciplina_iddisciplinas')
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
            ->integer('iddisciplinas')
            ->allowEmpty('iddisciplinas', 'create');

        $validator
            ->allowEmpty('titulo');

        $validator
            ->allowEmpty('codigo');

        $validator
            ->integer('professores_idprofessores')
            ->requirePresence('professores_idprofessores', 'create')
            ->notEmpty('professores_idprofessores');

        $validator
            ->integer('cursos_idcursos')
            ->requirePresence('cursos_idcursos', 'create')
            ->notEmpty('cursos_idcursos');

        return $validator;
    }
}

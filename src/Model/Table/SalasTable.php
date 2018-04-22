<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Salas Model
 *
 * @method \App\Model\Entity\Sala get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sala newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sala[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sala|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sala patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sala[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sala findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SalasTable extends Table
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

        $this->setTable('salas');
        $this->setDisplayField('idsalas');
        $this->setPrimaryKey('idsalas');

        $this->addBehavior('Timestamp');
        
        //associations
        $this->hasOne('Blocos')
            ->setForeignKey('blocos_idblocos');
        
        $this->belongsToMany('Agendas')
            ->setForeignKey('salas_idsalas')
            ->setBindingKey('agendas_idagendas')
            ->setJoinTable('agenda_disciplinas');
        
        $this->belongsToMany('Disciplinas')
            ->setForeignKey('salas_idsalas')
            ->setBindingKey('disciplinas_iddisciplinas')
            ->setJoinTable('agenda_disciplinas');
        
        $this->hasMany('OficinaCursos')
            ->setForeignKey('salas_idsalas');
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
            ->integer('idsalas')
            ->allowEmpty('idsalas', 'create');

        $validator
            ->allowEmpty('titulo');

        $validator
            ->allowEmpty('coordenadas');

        $validator
            ->integer('ocupacao')
            ->allowEmpty('ocupacao');

        $validator
            ->integer('andar')
            ->allowEmpty('andar');

        $validator
            ->integer('blocos_idblocos')
            ->requirePresence('blocos_idblocos', 'create')
            ->notEmpty('blocos_idblocos');

        return $validator;
    }
}

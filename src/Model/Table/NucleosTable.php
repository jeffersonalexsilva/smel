<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nucleos Model
 *
 * @method \App\Model\Entity\Nucleo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Nucleo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Nucleo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Nucleo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nucleo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Nucleo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Nucleo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NucleosTable extends Table
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

        $this->setTable('nucleos');
        $this->setDisplayField('idnucleos');
        $this->setPrimaryKey('idnucleos');

        $this->addBehavior('Timestamp');
        
        //associations
        $this->hasMany('Cursos')
            ->setForeignKey('nucleos_idnucleos');
        
        $this->hasMany('Professores')
            ->setForeignKey('nucleos_idnucleos');
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
            ->integer('idnucleos')
            ->allowEmpty('idnucleos', 'create');

        $validator
            ->allowEmpty('titulo');

        return $validator;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Avisos Model
 *
 * @method \App\Model\Entity\Aviso get($primaryKey, $options = [])
 * @method \App\Model\Entity\Aviso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Aviso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Aviso|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aviso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Aviso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Aviso findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AvisosTable extends Table
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

        $this->setTable('avisos');
        $this->setDisplayField('idaviso');
        $this->setPrimaryKey(['idaviso', 'modified']);

        $this->addBehavior('Timestamp');
        
        //associations
        $this->hasOne('Eventos')
            ->setForeignKey('eventos_idevento');
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
            ->integer('idaviso')
            ->allowEmpty('idaviso', 'create');

        $validator
            ->allowEmpty('titulo');

        $validator
            ->allowEmpty('texto');

        $validator
            ->integer('eventos_idevento')
            ->requirePresence('eventos_idevento', 'create')
            ->notEmpty('eventos_idevento');

        return $validator;
    }
}

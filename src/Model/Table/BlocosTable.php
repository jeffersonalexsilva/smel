<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Blocos Model
 *
 * @method \App\Model\Entity\Bloco get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bloco newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bloco[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bloco|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bloco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bloco[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bloco findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BlocosTable extends Table
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

        $this->setTable('blocos');
        $this->setDisplayField('idblocos');
        $this->setPrimaryKey('idblocos');

        $this->addBehavior('Timestamp');
        
        //associations
        $this->hasOne('Unidades')
        ->setForeignKey('unidades_idunidades');
        
        $this->hasMany('Salas')
        ->setForeignKey('blocos_idblocos');
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
            ->integer('idblocos')
            ->allowEmpty('idblocos', 'create');

        $validator
            ->allowEmpty('titulo');

        $validator
            ->allowEmpty('coordenadas');

        $validator
            ->integer('unidades_idunidades')
            ->requirePresence('unidades_idunidades', 'create')
            ->notEmpty('unidades_idunidades');

        return $validator;
    }
}

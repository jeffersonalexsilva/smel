<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Unidades Model
 *
 * @method \App\Model\Entity\Unidade get($primaryKey, $options = [])
 * @method \App\Model\Entity\Unidade newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Unidade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Unidade|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Unidade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Unidade[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Unidade findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UnidadesTable extends Table
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

        $this->setTable('unidades');
        $this->setDisplayField('idunidades');
        $this->setPrimaryKey('idunidades');

        $this->addBehavior('Timestamp');
        
        $this->hasMany('Blocos')
            ->setForeignKey('unidades_idunidades');
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
            ->integer('idunidades')
            ->allowEmpty('idunidades', 'create');

        $validator
            ->allowEmpty('titulo');

        $validator
            ->allowEmpty('coordenadas');

        return $validator;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StatusOficinas Model
 *
 * @method \App\Model\Entity\StatusOficina get($primaryKey, $options = [])
 * @method \App\Model\Entity\StatusOficina newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StatusOficina[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StatusOficina|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StatusOficina patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StatusOficina[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StatusOficina findOrCreate($search, callable $callback = null, $options = [])
 */
class StatusOficinasTable extends Table
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

        $this->setTable('status_oficinas');
        $this->setDisplayField('idstatus_oficinas');
        $this->setPrimaryKey('idstatus_oficinas');
        
        $this->hasMany('OficinaCursos')
            ->setForeignKey('status_oficinas_idstatus_oficinas');
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
            ->integer('idstatus_oficinas')
            ->allowEmpty('idstatus_oficinas', 'create');

        $validator
            ->allowEmpty('descricao');

        return $validator;
    }
}

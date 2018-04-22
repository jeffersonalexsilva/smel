<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LogAcessos Model
 *
 * @method \App\Model\Entity\LogAcesso get($primaryKey, $options = [])
 * @method \App\Model\Entity\LogAcesso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LogAcesso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LogAcesso|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LogAcesso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LogAcesso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LogAcesso findOrCreate($search, callable $callback = null, $options = [])
 */
class LogAcessosTable extends Table
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

        $this->setTable('log_acessos');
        $this->setDisplayField('idlog_acesso');
        $this->setPrimaryKey('idlog_acesso');
        
        //associations
        $this->hasOne('Usuarios')
        ->setForeignKey('usuario_idusuario');
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
            ->integer('idlog_acesso')
            ->allowEmpty('idlog_acesso', 'create');

        $validator
            ->dateTime('data_hora')
            ->allowEmpty('data_hora');

        $validator
            ->allowEmpty('ip_acesso');

        $validator
            ->integer('usuario_idusuario')
            ->requirePresence('usuario_idusuario', 'create')
            ->notEmpty('usuario_idusuario');

        return $validator;
    }
}

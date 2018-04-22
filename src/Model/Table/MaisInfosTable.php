<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MaisInfos Model
 *
 * @method \App\Model\Entity\MaisInfo get($primaryKey, $options = [])
 * @method \App\Model\Entity\MaisInfo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MaisInfo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MaisInfo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MaisInfo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MaisInfo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MaisInfo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MaisInfosTable extends Table
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

        $this->setTable('mais_infos');
        $this->setDisplayField('idmais_info');
        $this->setPrimaryKey('idmais_info');

        $this->addBehavior('Timestamp');
        
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
            ->integer('idmais_info')
            ->allowEmpty('idmais_info', 'create');

        $validator
            ->allowEmpty('tipo_graduacao');

        $validator
            ->allowEmpty('curso');

        $validator
            ->integer('periodo_ano')
            ->allowEmpty('periodo_ano');

        $validator
            ->integer('periodo_entrada')
            ->allowEmpty('periodo_entrada');

        $validator
            ->allowEmpty('departamento_nucleo');

        $validator
            ->allowEmpty('siape');

        $validator
            ->allowEmpty('setor');

        $validator
            ->allowEmpty('funcao');

        $validator
            ->allowEmpty('instituicao');

        $validator
            ->integer('usuario_idusuario')
            ->requirePresence('usuario_idusuario', 'create')
            ->notEmpty('usuario_idusuario');

        return $validator;
    }
}

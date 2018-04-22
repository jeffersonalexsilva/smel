<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsuariosProfessores Model
 *
 * @method \App\Model\Entity\UsuariosProfessore get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsuariosProfessore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UsuariosProfessore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsuariosProfessore|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsuariosProfessore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsuariosProfessore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsuariosProfessore findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsuariosProfessoresTable extends Table
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

        $this->setTable('usuarios_professores');
        $this->setDisplayField('usuarios_idusuario');
        $this->setPrimaryKey(['usuarios_idusuario', 'professores_idprofessores']);

        $this->addBehavior('Timestamp');

        ///associations
        $this->belongsTo('Usuarios')
        ->setForeignKey('usuarios_idusuario')
        -setJoinType('INNER');
        
        $this->belongsTo('Professores')
        ->setForeignKey('professores_idprofessores')
        -setJoinType('INNER');
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
            ->integer('usuarios_idusuario')
            ->allowEmpty('usuarios_idusuario', 'create');

        $validator
            ->integer('professores_idprofessores')
            ->allowEmpty('professores_idprofessores', 'create');

        return $validator;
    }
}

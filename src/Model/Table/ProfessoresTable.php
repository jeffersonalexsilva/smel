<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Professores Model
 *
 * @property \App\Model\Table\UsuariosTable|\Cake\ORM\Association\BelongsToMany $Usuarios
 *
 * @method \App\Model\Entity\Professore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Professore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Professore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Professore|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Professore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Professore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Professore findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProfessoresTable extends Table
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

        $this->setTable('professores');
        $this->setDisplayField('idprofessores');
        $this->setPrimaryKey('idprofessores');

        $this->addBehavior('Timestamp');

        //associations
        $this->belongsToMany('Usuarios')
            ->setForeignKey('professores_idprofessores')
            ->setTargetForeignKey('usuarios_idusuario')
            ->joinTable('usuarios_professores');
        
        $this->hasMany('Disciplinas')
            ->setForeignKey('professores_idprofessores');
        
        $this->hasOne('Nucleos')
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
            ->integer('idprofessores')
            ->allowEmpty('idprofessores', 'create');

        $validator
            ->allowEmpty('nome');

        $validator
            ->allowEmpty('url_lattes');

        $validator
            ->integer('nucleos_idnucleos')
            ->requirePresence('nucleos_idnucleos', 'create')
            ->notEmpty('nucleos_idnucleos');

        return $validator;
    }
}

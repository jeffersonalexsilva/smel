<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuarios Model
 *
 * @property \App\Model\Table\ProfessoresTable|\Cake\ORM\Association\BelongsToMany $Professores
 *
 * @method \App\Model\Entity\Usuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Usuario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Usuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsuariosTable extends Table
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

        $this->setTable('usuarios');
        $this->setDisplayField('idusuario');
        $this->setPrimaryKey('idusuario');

        $this->addBehavior('Timestamp');
/* 
        $this->belongsToMany('Professores')
            ->setForeignKey('usuarios_idusuario')
            ->setTargetForeignKey('professores_idprofessores')
            ->joinTable('usuarios_professores');
        
        $this->belongsToMany('Inscricoes')
            ->setForeignKey('usuario_idusuario')
            ->setTargetForeignKey('oficina_curso_idoficina_curso')
            ->joinTable('oficina_curso_has_usuario');
        
        $this->belongsToMany('Monitorias')
            ->setForeignKey('usuarios_idusuario')
            ->setTargetForeignKey('eventos_idevento')
            ->joinTable('monitores_eventos');
        
        $this->belongsToMany('InstrutorOficina')
            ->setForeignKey('usuarios_idusuario')
            ->setTargetForeignKey('oficina_cursos_idoficina_curso')
            ->joinTable('instrutores_oficinas');
         */
        $this->hasOne('Perfis')
            ->setForeignKey('perfil_idperfil');
        
        $this->belongsTo('MaisInfos')
            ->setForeignKey('usuario_idusuario');
        
        $this->hasMany('LogAcessos')
            ->setForeignKey('usuario_idusuario');
        
        $this->hasMany('ResponsavelOficina')
            ->setClassName('OficinaCursos')
            ->setForeignKey('usuarios_idusuario');
        
        
       
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
            ->integer('idusuario')
            ->allowEmpty('idusuario', 'create');

        $validator
            ->allowEmpty('nome');

        $validator
            ->requirePresence('cpf', 'create')
            ->notEmpty('cpf')
            ->add('cpf', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->allowEmpty('senha');

        $validator
            ->allowEmpty('token');

        $validator
            ->allowEmpty('sexo');

        $validator
            ->allowEmpty('cidade');

        $validator
            ->allowEmpty('uf');

        $validator
            ->allowEmpty('endereco');

        $validator
            ->allowEmpty('telefone');

        $validator
            ->integer('perfil_idperfil')
            ->requirePresence('perfil_idperfil', 'create')
            ->notEmpty('perfil_idperfil');

        $validator
            ->boolean('admin')
            ->allowEmpty('admin');

        $validator
            ->allowEmpty('idfacebook');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['cpf']));

        return $rules;
    }
}
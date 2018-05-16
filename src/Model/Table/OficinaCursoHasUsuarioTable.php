<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OficinaCursoHasUsuario Model
 *
 * @method \App\Model\Entity\OficinaCursoHasUsuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\OficinaCursoHasUsuario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OficinaCursoHasUsuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OficinaCursoHasUsuario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OficinaCursoHasUsuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OficinaCursoHasUsuario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OficinaCursoHasUsuario findOrCreate($search, callable $callback = null, $options = [])
 */
class OficinaCursoHasUsuarioTable extends Table
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

        $this->setTable('oficina_curso_has_usuario');
        $this->setDisplayField('oficina_curso_idoficina_curso');
        $this->setPrimaryKey(['oficina_curso_idoficina_curso', 'usuario_idusuario', 'data_horas_iddata_hora']);
        
        ///associations
        /* $this->belongsTo('Usuarios')
        ->setForeignKey('usuario_idusuario')
        -setJoinType('INNER');
        
        $this->belongsTo('OficinaCursos')
        ->setForeignKey('oficina_curso_idoficina_curso')
        -setJoinType('INNER');
        
        $this->belongsTo('DataHoras')
        ->setForeignKey('data_horas_iddata_hora')
        -setJoinType('INNER'); */

        $this->belongsTo('Usuarios')
            ->setForeignKey('usuario_idusuario');

        $this->belongsTo('OficinaCursos')
            ->setForeignKey('oficina_curso_idoficina_curso');
        
        $this->belongsTo('DataHoras')
            ->setForeignKey('data_horas_iddata_hora');
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
            ->integer('oficina_curso_idoficina_curso')
            ->allowEmpty('oficina_curso_idoficina_curso', 'create');

        $validator
            ->integer('usuario_idusuario')
            ->allowEmpty('usuario_idusuario', 'create');

        $validator
            ->integer('data_horas_iddata_hora')
            ->allowEmpty('data_horas_iddata_hora', 'create');

        $validator
            ->boolean('presente')
            ->allowEmpty('presente');

        return $validator;
    }
}

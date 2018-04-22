<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InstrutoresOficinas Model
 *
 * @method \App\Model\Entity\InstrutoresOficina get($primaryKey, $options = [])
 * @method \App\Model\Entity\InstrutoresOficina newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InstrutoresOficina[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InstrutoresOficina|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InstrutoresOficina patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InstrutoresOficina[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InstrutoresOficina findOrCreate($search, callable $callback = null, $options = [])
 */
class InstrutoresOficinasTable extends Table
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

        $this->setTable('instrutores_oficinas');
        $this->setDisplayField('oficina_cursos_idoficina_curso');
        $this->setPrimaryKey(['oficina_cursos_idoficina_curso', 'usuarios_idusuario']);
        
        $this->belongsTo('Usuarios')
        ->setForeignKey('usuarios_idusuario')
        -setJoinType('INNER');
        
        $this->belongsTo('OficinaCursos')
        ->setForeignKey('oficina_cursos_idoficina_curso')
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
            ->integer('oficina_cursos_idoficina_curso')
            ->allowEmpty('oficina_cursos_idoficina_curso', 'create');

        $validator
            ->integer('usuarios_idusuario')
            ->allowEmpty('usuarios_idusuario', 'create');

        return $validator;
    }
}

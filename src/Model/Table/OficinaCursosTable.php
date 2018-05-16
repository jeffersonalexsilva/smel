<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OficinaCursos Model
 *
 * @method \App\Model\Entity\OficinaCurso get($primaryKey, $options = [])
 * @method \App\Model\Entity\OficinaCurso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OficinaCurso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OficinaCurso|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OficinaCurso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OficinaCurso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OficinaCurso findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OficinaCursosTable extends Table
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

        $this->setTable('oficina_cursos');
        $this->setDisplayField('idoficina_curso');
        $this->setPrimaryKey('idoficina_curso');

        $this->addBehavior('Timestamp');
        
        //associtaions
        
        $this->belongsTo('OficinaMestre')
            ->setForeignKey('oficina_dependente');
        
        $this->hasOne('DataHoras')
            ->setForeignKey('iddata_hora');
        
        $this->hasOne('Eventos')
            ->setForeignKey('eventos_idevento');
        
        $this->hasOne('StatusOficinas')
            ->setForeignKey('idstatus_oficinas');
        
        $this->hasOne('Salas')
            ->setForeignKey('salas_idsalas');
        
        $this->hasOne('TipoOficinas')
            ->setForeignKey('idtipo_oficina');
        
        $this->hasOne('Responsavel')
            ->setForeignKey('usuarios_idusuario');
        
        // $this->belongsToMany('Inscritos')
        //     ->setForeignKey('oficina_curso_idoficina_curso')
        //     ->joinTable('oficina_curso_has_usuario');
        
        $this->belongsToMany('Instrutores',['joinTable'=> 'instrutores_oficinas'])
            ->setForeignKey('oficina_curso_idoficina_curso');
        
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
            ->integer('idoficina_curso')
            ->allowEmpty('idoficina_curso', 'create');

        $validator
            ->allowEmpty('descricao');

        $validator
            ->allowEmpty('instrutor');

        $validator
            ->integer('vagas_oferecidas')
            ->allowEmpty('vagas_oferecidas');

        $validator
            ->integer('vagas_restantes')
            ->allowEmpty('vagas_restantes');

        $validator
            ->allowEmpty('observacao');

        $validator
            ->allowEmpty('local');

        $validator
            ->integer('data_hora_iddata_hora')
            ->requirePresence('data_hora_iddata_hora', 'create')
            ->notEmpty('data_hora_iddata_hora');

        $validator
            ->integer('eventos_idevento')
            ->requirePresence('eventos_idevento', 'create')
            ->notEmpty('eventos_idevento');

        $validator
            ->integer('tipo_oficina_idtipo_oficina')
            ->requirePresence('tipo_oficina_idtipo_oficina', 'create')
            ->notEmpty('tipo_oficina_idtipo_oficina');

        $validator
            ->boolean('continua')
            ->allowEmpty('continua');

        $validator
            ->integer('oficina_dependente')
            ->allowEmpty('oficina_dependente');

        $validator
            ->integer('usuarios_idusuario')
            ->requirePresence('usuarios_idusuario', 'create')
            ->notEmpty('usuarios_idusuario');

        $validator
            ->integer('status_oficinas_idstatus_oficinas')
            ->requirePresence('status_oficinas_idstatus_oficinas', 'create')
            ->notEmpty('status_oficinas_idstatus_oficinas');

        $validator
            ->boolean('realizada')
            ->allowEmpty('realizada');

        $validator
            ->allowEmpty('resumo');

        $validator
            ->allowEmpty('materiais_equipamentos');

        $validator
            ->allowEmpty('publico_alvo');

        $validator
            ->integer('carga_horaria')
            ->allowEmpty('carga_horaria');

        $validator
            ->integer('salas_idsalas')
            ->requirePresence('salas_idsalas', 'create')
            ->notEmpty('salas_idsalas');

        return $validator;
    }
}

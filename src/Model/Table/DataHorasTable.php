<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DataHoras Model
 *
 * @method \App\Model\Entity\DataHora get($primaryKey, $options = [])
 * @method \App\Model\Entity\DataHora newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DataHora[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DataHora|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DataHora patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DataHora[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DataHora findOrCreate($search, callable $callback = null, $options = [])
 */
class DataHorasTable extends Table
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

        $this->setTable('data_horas');
        $this->setDisplayField('iddata_hora');
        $this->setPrimaryKey('iddata_hora');
        
        //associations
        //Muitas datas para um evento
        $this->belongsTo('Eventos')
            ->setForeignKey('eventos_idevento');

        //Muitos Cursos com a mesma data
        $this->hasMany('OficinaCursos')
            ->setForeignKey('data_hora_iddata_hora');
        
        //Muitas Inscricoes (oficina cursos has usuários
        $this->hasMany('OficinaCursosHasUsuario')
            ->setForeignKey('data_horas_iddata_hora');
        
        //muitas datas para muitos monitores, marcando presença
        $this->belongsToMany('MonitoresEventos')
            ->setForeignKey('data_horas_iddata_hora')
            ->setJoinTable('presenca_monitores');
        
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
            ->integer('iddata_hora')
            ->allowEmpty('iddata_hora', 'create');

        $validator
            ->dateTime('inicio')
            ->allowEmpty('inicio');

        $validator
            ->dateTime('final')
            ->allowEmpty('final');

        $validator
            ->integer('eventos_idevento')
            ->requirePresence('eventos_idevento', 'create')
            ->notEmpty('eventos_idevento');

        return $validator;
    }
}

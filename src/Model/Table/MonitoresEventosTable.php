<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MonitoresEventos Model
 *
 * @method \App\Model\Entity\MonitoresEvento get($primaryKey, $options = [])
 * @method \App\Model\Entity\MonitoresEvento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MonitoresEvento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MonitoresEvento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MonitoresEvento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MonitoresEvento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MonitoresEvento findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MonitoresEventosTable extends Table
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

        $this->setTable('monitores_eventos');
        $this->setDisplayField('eventos_idevento');
        $this->setPrimaryKey(['eventos_idevento', 'usuarios_idusuario']);

        $this->addBehavior('Timestamp');
        
        //associations
        $this->belongsTo('Usuarios')
        ->setForeignKey('usuarios_idusuario')
        -setJoinType('INNER');
        
        $this->belongsTo('Eventos')
        ->setForeignKey('eventos_idevento')
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
            ->integer('eventos_idevento')
            ->allowEmpty('eventos_idevento', 'create');

        $validator
            ->integer('usuarios_idusuario')
            ->allowEmpty('usuarios_idusuario', 'create');

        $validator
            ->boolean('compareceu')
            ->allowEmpty('compareceu');

        return $validator;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CoordenadasCertificadosEventos Model
 *
 * @method \App\Model\Entity\CoordenadasCertificadosEvento get($primaryKey, $options = [])
 * @method \App\Model\Entity\CoordenadasCertificadosEvento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CoordenadasCertificadosEvento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CoordenadasCertificadosEvento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CoordenadasCertificadosEvento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CoordenadasCertificadosEvento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CoordenadasCertificadosEvento findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CoordenadasCertificadosEventosTable extends Table
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

        $this->setTable('coordenadas_certificados_eventos');
        $this->setDisplayField('coordenadas_certificados_idcoordenadas_certificados');
        $this->setPrimaryKey(['coordenadas_certificados_idcoordenadas_certificados', 'eventos_idevento']);

        $this->addBehavior('Timestamp');
        //associations
        $this->belongsTo('Eventos')
        ->setForeignKey('eventos_idevento')
        -setJoinType('INNER');
        
        $this->belongsTo('CoordenadasCertificados')
        ->setForeignKey('coordenadas_certificados_idcoordenadas_certificados')
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
            ->integer('coordenadas_certificados_idcoordenadas_certificados')
            ->allowEmpty('coordenadas_certificados_idcoordenadas_certificados', 'create');

        $validator
            ->integer('eventos_idevento')
            ->allowEmpty('eventos_idevento', 'create');

        return $validator;
    }
}

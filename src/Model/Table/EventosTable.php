<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Eventos Model
 *
 * @property \App\Model\Table\CoordenadasCertificadosTable|\Cake\ORM\Association\BelongsToMany $CoordenadasCertificados
 *
 * @method \App\Model\Entity\Evento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Evento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Evento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Evento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Evento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Evento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Evento findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EventosTable extends Table
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

        $this->setTable('eventos');
        $this->setDisplayField('idevento');
        $this->setPrimaryKey('idevento');

        $this->addBehavior('Timestamp');

        //associations
        $this->belongsToMany('CoordenadasCertificados',['joinTable'=>'coordenadas_certificados_eventos'])
            ->setForeignKey('eventos_idevento')
            ->setTargetForeignKey('coordenadas_certificados_idcoordenadas_certificados');
        
        $this->hasMany('OficinaCursos')
        ->setForeignKey('eventos_idevento');
        
        $this->hasMany('Avisos')
        ->setForeignKey('eventos_idevento');
        
        $this->hasMany('DatasHoras')
        ->setForeignKey('eventos_idevento');

        $this->belongsToMany('Monitores',['joinTable'=>'monitores_eventos'])
            ->setForeignKey('eventos_idevento')
            ->setTargetForeignKey('usuarios_idusuario');
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
            ->integer('idevento')
            ->allowEmpty('idevento', 'create');

        $validator
            ->allowEmpty('descricao');

        $validator
            ->dateTime('data_hora_inicio')
            ->allowEmpty('data_hora_inicio');

        $validator
            ->dateTime('data_hora_fim')
            ->allowEmpty('data_hora_fim');

        $validator
            ->dateTime('data_hora_inicio_inscricao')
            ->allowEmpty('data_hora_inicio_inscricao');

        $validator
            ->dateTime('data_hora_fim_inscricao')
            ->allowEmpty('data_hora_fim_inscricao');

        $validator
            ->dateTime('data_hora_inicio_submissao')
            ->allowEmpty('data_hora_inicio_submissao');

        $validator
            ->dateTime('data_hora_fim_submissao')
            ->allowEmpty('data_hora_fim_submissao');

        $validator
            ->dateTime('data_hora_inicio_monitoria')
            ->allowEmpty('data_hora_inicio_monitoria');

        $validator
            ->dateTime('data_hora_fim_monitoria')
            ->allowEmpty('data_hora_fim_monitoria');

        $validator
            ->allowEmpty('coordenadas_certificado');

        $validator
            ->allowEmpty('site_evento');
        
        $validator
            ->allowEmpty('slug');

        $validator
            ->allowEmpty('email_evento');

        return $validator;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CoordenadasCertificados Model
 *
 * @property \App\Model\Table\EventosTable|\Cake\ORM\Association\BelongsToMany $Eventos
 *
 * @method \App\Model\Entity\CoordenadasCertificado get($primaryKey, $options = [])
 * @method \App\Model\Entity\CoordenadasCertificado newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CoordenadasCertificado[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CoordenadasCertificado|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CoordenadasCertificado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CoordenadasCertificado[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CoordenadasCertificado findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CoordenadasCertificadosTable extends Table
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

        $this->setTable('coordenadas_certificados');
        $this->setDisplayField('idcoordenadas_certificados');
        $this->setPrimaryKey('idcoordenadas_certificados');

        $this->addBehavior('Timestamp');

       /*  $this->belongsToMany('Eventos')
            ->setForeignKey('coordenadas_certificados_idcoordenadas_certificados')
            ->setTargetForeignKey('eventos_idevento')
            ->setJoinTable('coordenadas_certificados_eventos'); */
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
            ->integer('idcoordenadas_certificados')
            ->allowEmpty('idcoordenadas_certificados', 'create');

        $validator
            ->integer('nome_x')
            ->allowEmpty('nome_x');

        $validator
            ->integer('nome_y')
            ->allowEmpty('nome_y');

        $validator
            ->integer('descricao_x')
            ->allowEmpty('descricao_x');

        $validator
            ->integer('descricao_y')
            ->allowEmpty('descricao_y');

        $validator
            ->integer('ch_x')
            ->allowEmpty('ch_x');

        $validator
            ->integer('ch_y')
            ->allowEmpty('ch_y');

        $validator
            ->allowEmpty('uri_template');

        $validator
            ->integer('tamanho_fonte_nome')
            ->allowEmpty('tamanho_fonte_nome');

        $validator
            ->integer('tamanho_fonte_descricao')
            ->allowEmpty('tamanho_fonte_descricao');

        return $validator;
    }
}

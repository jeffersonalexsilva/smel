<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Usuario Entity
 *
 * @property int $idusuario
 * @property string $nome
 * @property string $cpf
 * @property string $email
 * @property string $senha
 * @property string $token
 * @property string $sexo
 * @property string $cidade
 * @property string $uf
 * @property string $endereco
 * @property string $telefone
 * @property int $perfil_idperfil
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $admin
 * @property string $idfacebook
 *
 * @property \App\Model\Entity\Professore[] $professores
 */
class Usuario extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'idusuario' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'token'
    ];
}

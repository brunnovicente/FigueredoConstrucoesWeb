<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cliente Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $cpf
 * @property string|null $cep
 * @property string|null $endereco
 * @property string|null $bairro
 * @property string|null $cidade
 * @property string|null $estado
 * @property int|null $numero
 * @property string|null $telefone1
 * @property string|null $telefone2
 * @property string|null $email
 * @property int|null $status
 *
 * @property \App\Model\Entity\Venda[] $vendas
 */
class Cliente extends Entity
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
        'nome' => true,
        'cpf' => true,
        'cep' => true,
        'endereco' => true,
        'bairro' => true,
        'cidade' => true,
        'estado' => true,
        'numero' => true,
        'telefone1' => true,
        'telefone2' => true,
        'email' => true,
        'status' => true,
        'vendas' => true,
    ];
}

<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fornecedore Entity
 *
 * @property int $id
 * @property string|null $cnpj
 * @property string|null $razao
 * @property string|null $telefone1
 * @property string|null $telefone2
 * @property string|null $email
 * @property int|null $status
 * @property string|null $endereco
 *
 * @property \App\Model\Entity\Entrada[] $entradas
 */
class Fornecedore extends Entity
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
        'cnpj' => true,
        'razao' => true,
        'telefone1' => true,
        'telefone2' => true,
        'email' => true,
        'status' => true,
        'endereco' => true,
        'entradas' => true,
    ];
}

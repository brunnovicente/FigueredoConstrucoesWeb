<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Entrada Entity
 *
 * @property int $id
 * @property string|null $quantidade
 * @property string|null $preco_compra
 * @property \Cake\I18n\FrozenDate|null $data
 * @property int $produto_id
 * @property int $user_id
 * @property int $fornecedore_id
 *
 * @property \App\Model\Entity\Produto $produto
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Fornecedore $fornecedore
 */
class Entrada extends Entity
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
        'quantidade' => true,
        'preco_compra' => true,
        'data' => true,
        'produto_id' => true,
        'user_id' => true,
        'fornecedore_id' => true,
        'produto' => true,
        'user' => true,
        'fornecedore' => true,
    ];
}

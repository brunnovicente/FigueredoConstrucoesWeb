<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Iten Entity
 *
 * @property int $id
 * @property string|null $quantidade
 * @property string|null $total
 * @property int $produto_id
 * @property int $venda_id
 *
 * @property \App\Model\Entity\Produto $produto
 * @property \App\Model\Entity\Venda $venda
 */
class Iten extends Entity
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
        'total' => true,
        'produto_id' => true,
        'venda_id' => true,
    ];
}

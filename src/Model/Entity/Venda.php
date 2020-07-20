<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Venda Entity
 *
 * @property int $id
 * @property string|null $total
 * @property \Cake\I18n\FrozenDate|null $data
 * @property int|null $status
 * @property int $cliente_id
 * @property int $user_id
 * @property string|null $pagamento
 *
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Iten[] $itens
 */
class Venda extends Entity
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
        'total' => true,
        'status' => true,
        'cliente_id' => true,
        'user_id' => true,
        'pagamento' => true,
        'cliente' => true,
        'user' => true,
        'itens' => true,
        'created' => true,
        'modified' => true,
    ];
}

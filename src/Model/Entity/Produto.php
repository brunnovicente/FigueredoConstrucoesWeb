<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Produto Entity
 *
 * @property int $id
 * @property string|null $codigoBarra
 * @property string|null $descricao
 * @property string|null $preco
 * @property string|null $estoque
 * @property string|null $minimo
 * @property int|null $status
 * @property string|null $codigobarras
 * @property string|null $marca
 *
 * @property \App\Model\Entity\Entrada[] $entradas
 * @property \App\Model\Entity\Iten[] $itens
 */
class Produto extends Entity
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
        'codigoBarra' => true,
        'descricao' => true,
        'preco' => true,
        'estoque' => true,
        'minimo' => true,
        'status' => true,
        'codigobarras' => true,
        'marca' => true,
        'entradas' => true,
        'itens' => true,
    ];
}

<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ItensFixture
 */
class ItensFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'quantidade' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'total' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'produto_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'venda_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'produto' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'venda' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_Item_Produtos1_idx' => ['type' => 'index', 'columns' => ['produto_id'], 'length' => []],
            'fk_Item_Vendas1_idx' => ['type' => 'index', 'columns' => ['venda_id'], 'length' => []],
            'FK_fgmiamhhyg1oe1qmbqw79b3vf' => ['type' => 'index', 'columns' => ['produto'], 'length' => []],
            'FK_61qsmptnhs6hr2iuql7smrho6' => ['type' => 'index', 'columns' => ['venda'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_61qsmptnhs6hr2iuql7smrho6' => ['type' => 'foreign', 'columns' => ['venda'], 'references' => ['vendas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_fgmiamhhyg1oe1qmbqw79b3vf' => ['type' => 'foreign', 'columns' => ['produto'], 'references' => ['produtos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_Item_Produtos1' => ['type' => 'foreign', 'columns' => ['produto_id'], 'references' => ['produtos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_Item_Vendas1' => ['type' => 'foreign', 'columns' => ['venda_id'], 'references' => ['vendas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'quantidade' => 1.5,
                'total' => 1.5,
                'produto_id' => 1,
                'venda_id' => 1,
                'produto' => 1,
                'venda' => 1,
            ],
        ];
        parent::init();
    }
}

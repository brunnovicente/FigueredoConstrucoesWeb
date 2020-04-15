<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItensTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItensTable Test Case
 */
class ItensTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ItensTable
     */
    protected $Itens;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Itens',
        'app.Produtos',
        'app.Vendas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Itens') ? [] : ['className' => ItensTable::class];
        $this->Itens = TableRegistry::getTableLocator()->get('Itens', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Itens);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

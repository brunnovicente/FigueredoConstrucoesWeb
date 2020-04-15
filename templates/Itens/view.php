<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Iten $iten
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Iten'), ['action' => 'edit', $iten->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Iten'), ['action' => 'delete', $iten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $iten->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Itens'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Iten'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="itens view content">
            <h3><?= h($iten->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Produto') ?></th>
                    <td><?= $iten->has('produto') ? $this->Html->link($iten->produto->id, ['controller' => 'Produtos', 'action' => 'view', $iten->produto->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Venda') ?></th>
                    <td><?= $iten->has('venda') ? $this->Html->link($iten->venda->id, ['controller' => 'Vendas', 'action' => 'view', $iten->venda->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($iten->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantidade') ?></th>
                    <td><?= $this->Number->format($iten->quantidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?= $this->Number->format($iten->total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Produto') ?></th>
                    <td><?= $this->Number->format($iten->produto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Venda') ?></th>
                    <td><?= $this->Number->format($iten->venda) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

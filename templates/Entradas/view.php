<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>
<div class="container">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand"><h3><?= __('Dados da Entrada') ?></h3></a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <?= $this->Html->link(__(' Editar'), ['action' => 'edit', $entrada->id], ['class' => 'nav-link  btn btn-outline-primary btn-sm m-1 fas fa-edit']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Form->postLink(__(' Excluir'), ['action' => 'delete', $entrada->id], ['confirm' => __('Tem certeza que seja excluir a Entrada?'), 'class' => 'nav-link  btn btn-outline-danger btn-sm m-1 fas fa-trash-alt']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(__(' Voltar'), ['action' => 'index'], ['class' => 'nav-link  btn btn-outline-info btn-sm m-1 fas fa-angle-left']) ?>
            </li>
        </ul>
    </nav>
    <div class="p-3 container">
            <table class="table">
                <tr>
                    <th><?= __('CÓDIGO') ?></th>
                    <td><?= $this->Number->format($entrada->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('PRODUTO') ?></th>
                    <td><?= $entrada->has('produto') ? $this->Html->link($entrada->produto->descricao, ['controller' => 'Produtos', 'action' => 'view', $entrada->produto->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('FORNECEDOR') ?></th>
                    <td><?= $entrada->has('fornecedore') ? $this->Html->link($entrada->fornecedore->razao, ['controller' => 'Fornecedores', 'action' => 'view', $entrada->fornecedore->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('QUANTIDADE') ?></th>
                    <td><?= $this->Number->format($entrada->quantidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('PREÇO DE COMPRA') ?></th>
                    <td><?= $this->Number->format($entrada->preco_compra) ?></td>
                </tr>
                <tr>
                    <th><?= __('CADASTRADO POR') ?></th>
                    <td><?= $entrada->has('user') ? $this->Html->link($entrada->user->nome, ['controller' => 'Users', 'action' => 'view', $entrada->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('DATA') ?></th>
                    <td><?= h($entrada->data) ?></td>
                </tr>
            </table>
    </div>
</div>

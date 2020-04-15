<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto[]|\Cake\Collection\CollectionInterface $produtos
 */
?>
<div class="container-fluid">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand"><h3><?= __('Entradas Realizadas') ?></h3></a>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Digite o nome do produto" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0 fas fa-search" type="submit"></button>
        </form>
    </nav>

    <ul class="nav">
        <li class="nav-item">
            <?= $this->Html->link(__(' Início'), ['controller'=>'Welcome','action' => 'index'], ['class' => 'nav-link btn btn-outline-info btn-sm m-1 fas fa-home']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link(__(' Novo'), ['action' => 'add'], ['class' => 'nav-link btn btn-outline-secondary btn-sm m-1 fas fa-plus']) ?>
        </li>
    </ul>

    <div class="shadow">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th><?= $this->Paginator->sort('id', 'CÓDIGO') ?></th>
                    <th><?= $this->Paginator->sort('produto_id', 'PRODUTO') ?></th>
                    <th><?= $this->Paginator->sort('fornecedore_id', 'FORNECEDOR') ?></th>
                    <th><?= $this->Paginator->sort('quantidade', 'QUANTIDADE') ?></th>
                    <th><?= $this->Paginator->sort('preco_compra', 'PREÇO DE COMPRA') ?></th>
                    <th><?= $this->Paginator->sort('data', 'DATA') ?></th>
                    <th><?= $this->Paginator->sort('user_id', 'CADASTRADO POR') ?></th>
                    <th class="actions"><?= __('AÇÕES') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entradas as $entrada): ?>
                <tr>
                    <td><?= $this->Number->format($entrada->id) ?></td>
                    <td><?= $entrada->has('produto') ? $this->Html->link($entrada->produto->descricao, ['controller' => 'Produtos', 'action' => 'view', $entrada->produto->id]) : '' ?></td>
                    <td><?= $entrada->has('fornecedore') ? $this->Html->link($entrada->fornecedore->razao, ['controller' => 'Fornecedores', 'action' => 'view', $entrada->fornecedore->id]) : '' ?></td>
                    <td><?= $this->Number->format($entrada->quantidade) ?></td>
                    <td><?= $this->Number->format($entrada->preco_compra) ?></td>
                    <td><?= h($entrada->data) ?></td>
                    <td><?= $entrada->has('user') ? $this->Html->link($entrada->user->nome, ['controller' => 'Users', 'action' => 'view', $entrada->user->id]) : '' ?></td>

                    <td class="actions">
                        <?= $this->Html->link(__(''), ['action' => 'view', $entrada->id], ['class'=>'btn btn-info btn-sm fas fa-folder-open']) ?>
                        <?= $this->Html->link(__(''), ['action' => 'edit', $entrada->id], ['class'=>'btn btn-primary btn-sm fas fa-edit']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $entrada->id], ['confirm' => __('Are you sure you want to delete # {0}?', $entrada->id), 'class'=>'btn btn-danger btn-sm fas fa-trash-alt']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
        </ul>
    </nav>

    <!--
    <div class="paginator">
        <ul class="pagination">
            <?//= $this->Paginator->first('<< ' . __('first')) ?>
            <?//= $this->Paginator->prev('< ' . __('previous')) ?>
            <?//= $this->Paginator->numbers() ?>
            <?//= $this->Paginator->next(__('next') . ' >') ?>
            <?//= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?//= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
    -->
</div>

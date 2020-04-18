<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto[]|\Cake\Collection\CollectionInterface $produtos
 */

$this->Paginator->setTemplates([
    'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'current' => '<li class="page-item active"><a class="page-link" href="{{url}}">{{text}}</a></li>',
]);

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
            <?= $this->Html->link(__(' Novo'), ['action' => 'add'], ['class' => 'nav-link btn btn-outline-success btn-sm m-1 fas fa-plus']) ?>
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

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?= $this->Paginator->prev('< ' . ('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(('Próxima') . ' >') ?>
        </ul>
    </nav>

</div>

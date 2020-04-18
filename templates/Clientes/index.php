<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente[]|\Cake\Collection\CollectionInterface $clientes
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
        <a class="navbar-brand"><h3><?= __('Gerência de Clientes') ?></h3></a>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Digite o nome do cliente" aria-label="Search">
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
                <th><?= $this->Paginator->sort('cpf', 'CPF') ?></th>
                <th><?= $this->Paginator->sort('nome','NOME') ?></th>
                <th><?= $this->Paginator->sort('endereco','ENDEREÇO') ?></th>
                <th><?= $this->Paginator->sort('telefone1', 'TELEFONE 1') ?></th>
                <th><?= $this->Paginator->sort('telefone2', 'TELEFONE 2') ?></th>
                <th>AÇÕES</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?= h($cliente->cpf) ?></td>
                    <td><?= $this->Html->link(__($cliente->nome), ['action' => 'view', $cliente->id]) ?></td>
                    <td><?= h($cliente->endereco) ?></td>
                    <td><?= h($cliente->telefone1) ?></td>
                    <td><?= h($cliente->telefone2) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__(''), ['action' => 'edit', $cliente->id], ['class'=>'btn btn-sm btn-outline-primary fas fa-edit']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $cliente->id], ['confirm' => __('Tem certeza que deseja excluir {0}?', $cliente->nome), 'class'=>'btn btn-sm btn-outline-danger far fa-trash-alt']) ?>
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

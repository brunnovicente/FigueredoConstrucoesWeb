<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente[]|\Cake\Collection\CollectionInterface $clientes
 */

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
                        <?= $this->Html->link(__(''), ['action' => 'edit', $cliente->id], ['class'=>'btn btn-sm btn-primary fas fa-edit']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $cliente->id], ['confirm' => __('Tem certeza que deseja excluir {0}?', $cliente->nome), 'class'=>'btn btn-sm btn-danger far fa-trash-alt']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br>
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
    <div class="pagination">
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

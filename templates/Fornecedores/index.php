<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedore[]|\Cake\Collection\CollectionInterface $fornecedores
 */
?>
<div class="container-fluid">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand"><h3><?= __('Gerência de Fornecedores') ?></h3></a>
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
                <th><?= $this->Paginator->sort('cnpj', 'CNPJ') ?></th>
                <th><?= $this->Paginator->sort('razao', 'RAZÃO') ?></th>
                <th><?= $this->Paginator->sort('telefone1', 'TELEFONE 1') ?></th>
                <th><?= $this->Paginator->sort('telefone2', 'TELEFONE 2') ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($fornecedores as $fornecedore): ?>
                <tr>
                    <td><?= h($fornecedore->cnpj) ?></td>
                    <td><?= $this->Html->link(__($fornecedore->razao), ['action' => 'view', $fornecedore->id]) ?></td>
                    <td><?= h($fornecedore->telefone1) ?></td>
                    <td><?= h($fornecedore->telefone2) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__(''), ['action' => 'edit', $fornecedore->id], ['class'=>'btn btn-primary btn-sm fas fa-edit']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $fornecedore->id], ['class'=>'btn btn-danger btn-sm fas fa-trash-alt','confirm' => __('Tem certeza que deseja excluir {0}?', $fornecedore->razao)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedore[]|\Cake\Collection\CollectionInterface $fornecedores
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
        <a class="navbar-brand"><h3><?= __('Gerência de Fornecedores') ?></h3></a>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Digite o nome do cliente" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0 fas fa-search" type="submit"></button>
        </form>
    </nav>
</div>

<div class="container-fluid">

    <ul class="nav">
        <li class="nav-item">
            <?= $this->Html->link(__(' Novo'), ['action' => 'add'], ['class' => 'nav-link btn btn-outline-success btn-sm m-1 fas fa-plus']) ?>
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
                        <?= $this->Html->link(__(''), ['action' => 'edit', $fornecedore->id], ['class'=>'btn btn-outline-primary btn-sm fas fa-edit']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $fornecedore->id], ['class'=>'btn btn-outline-danger btn-sm fas fa-trash-alt','confirm' => __('Tem certeza que deseja excluir {0}?', $fornecedore->razao)]) ?>
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

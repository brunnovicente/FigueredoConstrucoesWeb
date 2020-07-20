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
        <a class="navbar-brand"><h3><?= __('Vendas Realizadas') ?></h3></a>
    </nav>
</div>

<div class="container-fluid">
    <ul class="nav">
        <li class="nav-item">
            <?= $this->Html->link(__(' Vender'), ['action' => 'vender'], ['class' => 'nav-link btn btn-outline-success btn-sm m-1 fas fa-plus']) ?>
        </li>
    </ul>
    <div class="shadow">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'CÓDIGO') ?></th>
                    <th><?= $this->Paginator->sort('data', 'DATA') ?></th>
                    <th><?= $this->Paginator->sort('total', 'TOTAL') ?></th>
                    <th><?= $this->Paginator->sort('status', 'STATUS') ?></th>
                    <th><?= $this->Paginator->sort('cliente_id', 'CLIENTE') ?></th>
                    <th><?= $this->Paginator->sort('user_id', 'VENDIDO POR') ?></th>
                    <th><?= $this->Paginator->sort('pagamento', 'PAGAMENTO') ?></th>
                    <th class="actions"><?= __('AÇÕES') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendas as $venda): ?>
                <tr>
                    <td><?= $this->Number->format($venda->id) ?></td>
                    <td><?= h($venda->created) ?></td>
                    <td><?= $this->Number->format($venda->total) ?></td>
                    <td><?php
                        if($venda->status == 1){
                            echo "Fechada";
                        }else{
                            echo "Pendente";
                        }
                        ?>
                    </td>
                    <td><?= $venda->has('cliente') ? $this->Html->link($venda->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $venda->cliente->id]) : '' ?></td>
                    <td><?= $venda->has('user') ? $this->Html->link($venda->user->nome, ['controller' => 'Users', 'action' => 'view', $venda->user->id]) : '' ?></td>
                    <td><?= h($venda->pagamento) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__(''), ['action' => 'view', $venda->id], ['class'=>'btn btn-outline-info btn-sm fas fa-folder-open']); ?>
                     <!--   <?//= $this->Html->link(__(''), ['action' => 'edit', $venda->id], ['class'=>'btn btn-outline-primary btn-sm fas fa-edit']) ?>
                        <?//= $this->Form->postLink(__(''), ['action' => 'delete', $venda->id], ['class'=>'btn btn-outline-danger btn-sm fas fa-trash-alt', 'confirm' => __('Tem certeza que deseja excluir a venda # {0}?', $venda->id)]) ?>
                        -->
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

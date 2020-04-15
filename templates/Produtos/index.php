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
        <a class="navbar-brand"><h3><?= __('Gerência de Produtos') ?></h3></a>
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
                <th><?= $this->Paginator->sort('codigoBarra','CÓDIGO DE BARRAS') ?></th>
                <th><?= $this->Paginator->sort('descricao','DESCRIÇAO') ?></th>
                <th><?= $this->Paginator->sort('preco', 'PREÇO') ?></th>
                <th><?= $this->Paginator->sort('estoque', 'ESTOQUE') ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?= $produto->codigoBarra; ?></td>
                    <td><?= $this->Html->link(__($produto->descricao), ['action' => 'view', $produto->id]) ?></td>
                    <td><?= $this->Number->format($produto->preco, ['place'=> 2, 'before'=>'R$ ', 'locale'=>'fr_BR']) ?></td>
                    <td><?= $this->Number->format($produto->estoque) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__(''), ['action' => 'edit', $produto->id],['class'=>'btn btn-primary btn-sm fas fa-edit']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $produto->id],['confirm' => __('Tem certeza que deseja excluir {0}?', $produto->descricao),'class'=>'btn btn-danger btn-sm far fa-trash-alt']) ?>
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

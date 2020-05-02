<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>

<div class="container-fluid">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand"><h3><?= __('Dados do Produto') ?></h3></a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <?= $this->Html->link(__(' Editar'), ['action' => 'edit', $produto->id], ['class' => 'nav-link  btn btn-outline-primary btn-sm m-1 fas fa-edit']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Form->postLink(__(' Excluir'), ['action' => 'delete', $produto->id], ['confirm' => __('Tem certeza que seja excluir {0}?', $produto->razao), 'class' => 'nav-link  btn btn-outline-danger btn-sm m-1 fas fa-trash-alt']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(__(' Voltar'), ['action' => 'index'], ['class' => 'nav-link  btn btn-outline-info btn-sm m-1 fas fa-angle-left']) ?>
            </li>
        </ul>
    </nav>
</div>
<br>
<div class="container">

    <div class="p-3 shadow">

        <h3 class="text-center"><?= h($produto->descricao) ?></h3>
        <table class="table">
            <tr>
                <th><?= __('CodigoBarra') ?></th>
                <td><?= h($produto->codigoBarra) ?></td>
            </tr>

            <tr>
                <th><?= __('Preco') ?></th>
                <td><?= $this->Number->format($produto->preco, ['place'=> 2, 'before'=>'R$ ', 'locale'=>'fr_BR']) ?></td>
            </tr>
            <tr>
                <th><?= __('Estoque') ?></th>
                <td><?= $this->Number->format($produto->estoque) ?></td>
            </tr>
            <tr>
                <th><?= __('Minimo') ?></th>
                <td><?= $this->Number->format($produto->minimo) ?></td>
            </tr>

        </table>


    </div>
</div>

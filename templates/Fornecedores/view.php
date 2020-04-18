<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedore $fornecedore
 */
?>

<div class="container-fluid">
    <nav class="navbar navbar-light bg-light m-1">
        <a class="navbar-brand"><h3><?= __('Dados do Fornecedor') ?></h3></a>

        <ul class="nav justify-content-end">
            <li class="nav-item">
                <?= $this->Html->link(__(' Editar'), ['action' => 'edit', $fornecedore->id], ['class' => 'nav-link btn btn-outline-primary btn-sm m-1 fas fa-edit']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Form->postLink(__(' Excluir'), ['action' => 'delete', $fornecedore->id], ['confirm' => __('Tem certeza que seja excluir {0}?', $fornecedore->razao), 'class' => 'nav-link btn btn-outline-danger btn-sm m-1 fas fa-trash-alt']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(__(' Voltar'), ['action' => 'index'], ['class' => 'nav-link btn btn-outline-info btn-sm m-1 fas fa-angle-left']) ?>
            </li>
        </ul>
    </nav>
</div>
<br>
<div class="container-fluid">

    <div class="p-3 shadow">

        <h3 class="text-center"><?= h($fornecedore->razao) ?></h3>
        <table class="table">
            <tr>
                <th><?= __('CNPJ') ?></th>
                <td><?= h($fornecedore->cnpj) ?></td>
            </tr>
            <tr>
                <th><?= __('ENDEREÇO') ?></th>
                <td><?= h($fornecedore->endereco) ?></td>
            </tr>
            <tr>
                <th><?= __('TELEFONE 1') ?></th>
                <td><?= h($fornecedore->telefone1) ?></td>
            </tr>
            <tr>
                <th><?= __('TELEFONE 2') ?></th>
                <td><?= h($fornecedore->telefone2) ?></td>
            </tr>
            <tr>
                <th><?= __('E-MAIL') ?></th>
                <td><?= h($fornecedore->email) ?></td>
            </tr>

        </table>
    </div>
</div>

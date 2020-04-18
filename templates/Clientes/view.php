<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div class="container-fluid m-1">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand"><h3><?= __('Dados do Cliente') ?></h3></a>

        <ul class="nav justify-content-end">
            <li class="nav-item">
                <?= $this->Html->link(__(' Editar'), ['action' => 'edit', $cliente->id], ['class' => 'nav-link btn btn-outline-primary btn-sm m-1 far fa-edit']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Form->postLink(__(' Excluir'), ['action' => 'delete', $cliente->id], ['confirm' => __('Tem certeza que seja excluir {0}?', $cliente->razao), 'class' => 'nav-link btn btn-outline-danger btn-sm m-1 far fa-trash-alt']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(__(' Voltar'), ['action' => 'index'], ['class' => 'nav-link btn btn-outline-info btn-sm m-1 fas fa-angle-left']) ?>
            </li>
        </ul>
    </nav>
    <div class="p-3 shadow">
        <h3 class="text-center"><?= h($cliente->nome) ?></h3>
        <table class="table">

            <tr>
                <th><?= __('CPF') ?></th>
                <td><?= h($cliente->cpf) ?></td>
            </tr>
            <tr>
                <th><?= __('CEP') ?></th>
                <td><?= h($cliente->cep) ?></td>
            </tr>
            <tr>
                <th><?= __('ENDEREÇO') ?></th>
                <td><?= h($cliente->endereco) ?></td>
            </tr>
            <tr>
                <th><?= __('NÚMERO') ?></th>
                <td><?= $this->Number->format($cliente->numero) ?></td>
            </tr>
            <tr>
                <th><?= __('BAIRRO') ?></th>
                <td><?= h($cliente->bairro) ?></td>
            </tr>
            <tr>
                <th><?= __('CIDADE') ?></th>
                <td><?= h($cliente->cidade) ?></td>
            </tr>
            <tr>
                <th><?= __('ESTADO') ?></th>
                <td><?= h($cliente->estado) ?></td>
            </tr>
            <tr>
                <th><?= __('TELEFONE 1') ?></th>
                <td><?= h($cliente->telefone1) ?></td>
            </tr>
            <tr>
                <th><?= __('TELEFONE 2') ?></th>
                <td><?= h($cliente->telefone2) ?></td>
            </tr>
            <tr>
                <th><?= __('E-MAIL') ?></th>
                <td><?= h($cliente->email) ?></td>
            </tr>



        </table>
    </div>
</div>

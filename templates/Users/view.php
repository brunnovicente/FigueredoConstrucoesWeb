<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="container-fluid">
    <nav class="navbar navbar-light bg-light m-1">
        <a class="navbar-brand"><h3><?= __('Dados do Usuário') ?></h3></a>

        <ul class="nav justify-content-end">
            <li class="nav-item">
                <?= $this->Html->link(__(' Editar'), ['action' => 'edit', $user->id], ['class' => 'nav-link btn btn-outline-primary btn-sm m-1 fas fa-edit']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(__(' Voltar'), ['action' => 'index'], ['class' => 'nav-link btn btn-outline-info btn-sm m-1 fas fa-angle-left']) ?>
            </li>
        </ul>
    </nav>
</div>
<br>

<div class="container">

    <div class="p-3 shadow">
            <h3 class="text-center"><?= h($user->nome) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('NOME') ?></th>
                    <td><?= h($user->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('NOME DE USUÁRIO') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('E-MAIL') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('CATEGORIA') ?></th>
                    <td><?= h($user->categoria) ?></td>
                </tr>
                <tr>
                    <th><?= __('CRIADO') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('MODIFICADO') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
            </table>

    </div>
</div>

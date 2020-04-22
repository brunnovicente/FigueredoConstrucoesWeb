<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
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
        <a class="navbar-brand"><h3><?= __('Gerência de Usuários') ?></h3></a>
    </nav>

    <ul class="nav">
        <li class="nav-item">
            <?= $this->Html->link(__(' Novo'), ['action' => 'add'], ['class' => 'nav-link btn btn-outline-success btn-sm m-1 fas fa-plus']) ?>
        </li>
    </ul>

    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'CÓDIGO') ?></th>
                    <th><?= $this->Paginator->sort('nome', 'NOME') ?></th>
                    <th><?= $this->Paginator->sort('username', 'NOME DE USUÁRIO') ?></th>
                    <th><?= $this->Paginator->sort('email', 'E-MAIL') ?></th>
                    <th><?= $this->Paginator->sort('categoria', 'CATEGORIA') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->nome) ?></td>
                    <td><?= h($user->username) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->categoria) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__(''), ['action' => 'edit', $user->id], ['class'=>'btn btn-outline-primary btn-sm fas fa-edit']) ?>
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

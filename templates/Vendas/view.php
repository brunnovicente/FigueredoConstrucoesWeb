<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venda $venda
 */
?>

<div class="container-fluid">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand"><h3><?= __('Dados da Venda') ?></h3></a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <?= $this->Html->link(__(' Voltar'), ['action' => 'index'], ['class' => 'nav-link  btn btn-outline-info btn-sm m-1 fas fa-angle-left']) ?>
            </li>
        </ul>
    </nav>
</div>
<br>
<div class="container-fluid">
    <div class="shadow p-3">
            <table class="table table-hover">
                <tr>
                    <th><?= __('CÓDIGO') ?></th>
                    <td><?= $this->Number->format($venda->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('DATA') ?></th>
                    <td><?= h($venda->data) ?></td>
                </tr>
                <tr>
                    <th><?= __('TOTAL') ?></th>
                    <td><?= $this->Number->format($venda->total) ?></td>
                </tr>
                <tr>
                    <th><?= __('STATUS') ?></th>
                    <td><?php
                        if($venda->status == 1){
                            echo 'Fechada';
                        }else{
                            echo 'Pendente';
                        }
                    ?></td>
                </tr>
                <tr>
                    <th><?= __('CLIENTE') ?></th>
                    <td><?= $venda->has('cliente') ? $this->Html->link($venda->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $venda->cliente->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('VENDIDO POR') ?></th>
                    <td><?= $venda->has('user') ? $this->Html->link($venda->user->nome, ['controller' => 'Users', 'action' => 'view', $venda->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('PAGAMENTO') ?></th>
                    <td><?= h($venda->pagamento) ?></td>
                </tr>



            </table>
                <h4 class="bg-light"><?= __('Itens da Venda') ?></h4>
                <?php if (!empty($venda->itens)) : ?>
                <div>
                    <table class="table table-hover">
                        <tr>
                            <th><?= __('PRODUTO') ?></th>
                            <th><?= __('QUANTIDADE') ?></th>
                            <th><?= __('TOTAL') ?></th>
                        </tr>
                        <?php foreach ($venda->itens as $itens) : ?>
                        <tr>
                            <td><?= h($itens->produto_id) ?></td>
                            <td><?= h($itens->quantidade) ?></td>
                            <td><?= h($itens->total) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
    </div>
</div>

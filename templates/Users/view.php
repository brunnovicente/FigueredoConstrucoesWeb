<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($user->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($user->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Categoria') ?></th>
                    <td><?= h($user->categoria) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($user->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Entradas') ?></h4>
                <?php if (!empty($user->entradas)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Quantidade') ?></th>
                            <th><?= __('Preco Compra') ?></th>
                            <th><?= __('Data') ?></th>
                            <th><?= __('Produto Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Fornecedore Id') ?></th>
                            <th><?= __('Produto') ?></th>
                            <th><?= __('Usuario') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->entradas as $entradas) : ?>
                        <tr>
                            <td><?= h($entradas->id) ?></td>
                            <td><?= h($entradas->quantidade) ?></td>
                            <td><?= h($entradas->preco_compra) ?></td>
                            <td><?= h($entradas->data) ?></td>
                            <td><?= h($entradas->produto_id) ?></td>
                            <td><?= h($entradas->user_id) ?></td>
                            <td><?= h($entradas->fornecedore_id) ?></td>
                            <td><?= h($entradas->produto) ?></td>
                            <td><?= h($entradas->usuario) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Entradas', 'action' => 'view', $entradas->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Entradas', 'action' => 'edit', $entradas->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Entradas', 'action' => 'delete', $entradas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $entradas->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Vendas') ?></h4>
                <?php if (!empty($user->vendas)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Total') ?></th>
                            <th><?= __('Data') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Cliente Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Pagamento') ?></th>
                            <th><?= __('Cliente') ?></th>
                            <th><?= __('Usuario') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->vendas as $vendas) : ?>
                        <tr>
                            <td><?= h($vendas->id) ?></td>
                            <td><?= h($vendas->total) ?></td>
                            <td><?= h($vendas->data) ?></td>
                            <td><?= h($vendas->status) ?></td>
                            <td><?= h($vendas->cliente_id) ?></td>
                            <td><?= h($vendas->user_id) ?></td>
                            <td><?= h($vendas->pagamento) ?></td>
                            <td><?= h($vendas->cliente) ?></td>
                            <td><?= h($vendas->usuario) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Vendas', 'action' => 'view', $vendas->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Vendas', 'action' => 'edit', $vendas->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vendas', 'action' => 'delete', $vendas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendas->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

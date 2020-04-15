<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Entrada $entrada
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $entrada->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $entrada->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Entradas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="entradas form content">
            <?= $this->Form->create($entrada) ?>
            <fieldset>
                <legend><?= __('Edit Entrada') ?></legend>
                <?php
                    echo $this->Form->control('quantidade');
                    echo $this->Form->control('preco_compra');
                    echo $this->Form->control('data', ['empty' => true]);
                    echo $this->Form->control('produto_id', ['options' => $produtos]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('fornecedore_id', ['options' => $fornecedores]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

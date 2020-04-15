<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Iten $iten
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $iten->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $iten->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Itens'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="itens form content">
            <?= $this->Form->create($iten) ?>
            <fieldset>
                <legend><?= __('Edit Iten') ?></legend>
                <?php
                    echo $this->Form->control('quantidade');
                    echo $this->Form->control('total');
                    echo $this->Form->control('produto_id', ['options' => $produtos]);
                    echo $this->Form->control('venda_id', ['options' => $vendas]);
                    echo $this->Form->control('produto');
                    echo $this->Form->control('venda');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

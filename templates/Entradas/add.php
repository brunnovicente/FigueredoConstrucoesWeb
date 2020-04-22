<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
$this->Html->script(['jquery.mask.js'], ['block' => true]);
?>


<div class="container-fluid">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand"><h3><?= __('Entrada de Produtos') ?></h3></a>
        <?= $this->Html->link(__(' Voltar'), ['action' => 'index'], ['class' => 'nav-link btn btn-outline-info btn-sm fas fa-angle-left']) ?>
    </nav>
</div>
<br>
<div class="container">
    <div class="p-3 shadow">
        <?= $this->Form->create($entrada) ?>
        <div class="row">
            <div class="col-12 form-group">
                <?php echo $this->Form->control('produto_id',['options'=>$produtos, 'class'=>'form-control']);?>
            </div>
        </div>
        <div class="row">
            <div class="col-12 form-group">
                <?php echo $this->Form->control('fornecedore_id',['options'=>$fornecedores,  'class'=>'form-control']);?>
            </div>
        </div>
        <div class="row">
            <div class="col-4 form-group">
                <?php echo $this->Form->control('quantidade', ['class'=>'form-control']);?>
            </div>
            <div class="col-4 form-group">
                <?php echo $this->Form->control('preco_compra',['class'=>'form-control']);?>
            </div>
            <div class="col-4 form-group">
                <?php echo $this->Form->control('data', ['class'=>'form-control']);?>
            </div>
        </div>

        <div class="row">
            <div class="col-12 form-group">
                <?php echo $this->Form->control('user_id',['options'=>$users, 'class'=>'form-control']);?>
            </div>
        </div>

        <div class="row mb-2 mr-1 justify-content-end">
            <?= $this->Form->button(__(' Salvar'), ['class'=>'btn btn-success fas fa-save']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

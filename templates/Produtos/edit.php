<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>

<div class="container-fluid">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand"><h3><?= __('Editar de Produto') ?></h3></a>
        <?= $this->Html->link(__(' Voltar'), ['action' => 'index'], ['class' => 'nav-link btn btn-outline-info btn-sm m-1 fas fa-angle-left']) ?>
    </nav>
</div>
<br>
<div class="container">

    <div class="p-3 shadow">
        <?= $this->Form->create($produto) ?>

        <div class="row">
            <div class="col-8 form-group">
                <?php echo $this->Form->control('descricao',['class'=>'form-control','label'=>'DESCRIÇÃO']);?>
            </div>
            <div class="col-4 form-group">
                <?php echo $this->Form->control('preco',['class'=>'form-control','label'=>'PREÇO']);?>
            </div>
        </div>

        <div class="row">
            <div class="col-4 form-group">
                <?php echo $this->Form->control('estoque',['class'=>'form-control','label'=>'ESTOQUE']);?>
            </div>
            <div class="col-4 form-group">
                <?php echo $this->Form->control('minimo',['class'=>'form-control','label'=>'ESTOQUE MÍNIMO']);?>
            </div>
            <div class="col-4 form-group">
                <?php echo $this->Form->control('codigoBarra',['class'=>'form-control','label'=>'CÓDIGO DE BARRAS']);?>
            </div>
        </div>

        <div class="row mb-2 mr-1 justify-content-end">
            <?= $this->Form->button(__(' Salvar'), ['class'=>'btn btn-success fas fa-save']) ?>
        </div>

        <?= $this->Form->end() ?>
    </div>
</div>

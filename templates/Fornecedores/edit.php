<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedore $fornecedore
 */
?>

<div class="container-fluid">
    <nav class="navbar navbar-light bg-light m-1">
        <a class="navbar-brand"><h3><?= __('Editar Fornecedor') ?></h3></a>
        <?= $this->Html->link(__(' Voltar'), ['action' => 'index'], ['class' => 'nav-link btn btn-outline-info btn-sm fas fa-angle-left']) ?>
    </nav>
</div>
<br>
<div class="container">

    <div class="p-3 shadow">
        <?= $this->Form->create($fornecedore) ?>
        <div class="row">
            <div class="col-4 form-group">
                <?php echo $this->Form->control('cnpj',['class'=>'form-control','label'=>'CNPJ', 'id'=>'cnpj'])?>
            </div>
            <div class="col-8 form-group">
                <?php echo $this->Form->control('razao',['class'=>'form-control','label'=>'RAZÃO'])?>
            </div>
        </div>

        <div class="row">
            <div class="col-12 form-group">
                <?php echo $this->Form->control('endereco',['class'=>'form-control','label'=>'ENDEREÇO', 'id'=>'endereco'])?>
            </div>
        </div>

        <div class="row">
            <div class="col-3 form-group">
                <?php echo $this->Form->control('telefone1',['class'=>'form-control','label'=>'TELEFONE 1', 'id'=>'telefone1'])?>
            </div>
            <div class="col-3 form-group">
                <?php echo $this->Form->control('telefone2',['class'=>'form-control','label'=>'TELEFONE 2', 'id'=>'telefone2'])?>
            </div>
            <div class="col-6 form-group">
                <?php echo $this->Form->control('email',['class'=>'form-control','label'=>'E-MAIL'])?>
            </div>
        </div>
        <div class="row mb-2 mr-1 justify-content-end">
            <?= $this->Form->button(__(' Salvar'), ['class'=>'btn btn-success fas fa-save']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

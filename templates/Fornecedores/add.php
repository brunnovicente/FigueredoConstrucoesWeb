<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedore $fornecedore
 */
$this->Html->script(['jquery.mask.js'], ['block' => true]);
?>
<div class="container-fluid">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand"><h3><?= __('Cadastro de Fornecedor') ?></h3></a>
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

<?= $this->Html->scriptBlock('
$(document).ready( function() {
        $(\'#cnpj\').mask(\'00.000.000/0000-00\', {reverse: true});
});
'); ?>

<?= $this->Html->scriptBlock('
$(document).ready( function() {
        $(\'#telefone1\').mask(\'(00) 00000-0000\', {reverse: false});
});
'); ?>

<?= $this->Html->scriptBlock('
$(document).ready( function() {
        $(\'#telefone2\').mask(\'(00) 00000-0000\', {reverse: false});
});
'); ?>

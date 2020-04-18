<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */

$this->Html->script(['jquery.mask.js'], ['block' => true]);

$UF = array(
    'AC'=>'Acre',
    'AL'=>'Alagoas',
    'AP'=>'Amapá',
    'AM'=>'Amazonas',
    'BA'=>'Bahia',
    'CE'=>'Ceará',
    'DF'=>'Distrito Federal',
    'ES'=>'Espírito Santo',
    'GO'=>'Goiás',
    'MA'=>'Maranhão',
    'MT'=>'Mato Grosso',
    'MS'=>'Mato Grosso do Sul',
    'MG'=>'Minas Gerais',
    'PA'=>'Pará',
    'PB'=>'Paraíba',
    'PR'=>'Paraná',
    'PE'=>'Pernambuco',
    'PI'=>'Piauí',
    'RJ'=>'Rio de Janeiro',
    'RN'=>'Rio Grande do Norte',
    'RS'=>'Rio Grande do Sul',
    'RO'=>'Rondônia',
    'RR'=>'Roraima',
    'SC'=>'Santa Catarina',
    'SP'=>'São Paulo',
    'SE'=>'Sergipe',
    'TO'=>'Tocantins'
);

?>
<div class="container-fluid">
    <nav class="navbar navbar-light bg-light m-1">
        <a class="navbar-brand"><h3><?= __('Editar Cliente') ?></h3></a>
        <?= $this->Html->link(__(' Voltar'), ['action' => 'index'], ['class' => 'nav-link btn btn-outline-info btn-sm fas fa-angle-left']) ?>
    </nav>
</div>
<br>
    <div class="container shadow">
        <?= $this->Form->create($cliente) ?>

        <div class="row">

            <div class="form-group col-3">
                <?php echo $this->Form->control('cpf',['class'=>'form-control','label'=>'CPF', 'id'=>'input-cpf'])?>
            </div>
            <div class="form-group col-9">
                <?php echo $this->Form->control('nome',['class'=>'form-control','label'=>'NOME'])?>
            </div>
        </div>

        <div class="row">
            <div class="col-3 form-group">
                <?php echo $this->Form->control('cep',['class'=>'form-control','label'=>'CEP', 'id'=>'input-cep'])?>
            </div>
            <div class="col-7 form-group">
                <?php echo $this->Form->control('endereco',['class'=>'form-control','label'=>'ENDEREÇO'])?>
            </div>
            <div class="col-2 form-group">
                <?php echo $this->Form->control('numero',['class'=>'form-control','label'=>'NÚMERO'])?>
            </div>
        </div>


        <div class="row">
            <div class="col-4 form-group">
                <?php echo $this->Form->control('bairro',['class'=>'form-control','label'=>'BAIRRO'])?>
            </div>
            <div class="col-5 form-group">
                <?php echo $this->Form->control('cidade',['class'=>'form-control','label'=>'CIDADE'])?>
            </div>
            <div class="col-3 form-group">
                <?php echo $this->Form->control('estado',['options'=>$UF, 'class'=>'form-control','label'=>'ESTADO'])?>
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
            <?= $this->Form->button(__(' Salvar'), ['class'=>'btn btn-success far fa-save']) ?>
        </div>
        <br>
        <?= $this->Form->end() ?>
    </div>


<?= $this->Html->scriptBlock('
$(document).ready( function() {
        $(\'#input-cpf\').mask(\'000.000.000-00\', {reverse: true});
});
'); ?>

<?= $this->Html->scriptBlock('
$(document).ready( function() {
        $(\'#input-cep\').mask(\'00000-000\', {reverse: true});
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

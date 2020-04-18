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

<head>
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
</head>

<div class="container-fluid">
    <nav class="navbar navbar-light bg-light m-1">
        <a class="navbar-brand"><h3><?= __('Cadastro de Cliente') ?></h3></a>
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
                <?php echo $this->Form->control('cep',['class'=>'form-control','label'=>'CEP', 'id'=>'cep'])?>
            </div>
            <div class="col-7 form-group">
                <?php echo $this->Form->control('endereco',['class'=>'form-control','label'=>'ENDEREÇO', 'id'=>'rua'])?>
            </div>
            <div class="col-2 form-group">
                <?php echo $this->Form->control('numero',['class'=>'form-control','label'=>'NÚMERO', 'id'=>'numero'])?>
            </div>
        </div>


        <div class="row">
            <div class="col-4 form-group">
                <?php echo $this->Form->control('bairro',['class'=>'form-control','label'=>'BAIRRO', 'id'=>'bairro'])?>
            </div>
            <div class="col-5 form-group">
                <?php echo $this->Form->control('cidade',['class'=>'form-control','label'=>'CIDADE', 'id'=>'cidade'])?>
            </div>
            <div class="col-3 form-group">
                <?php echo $this->Form->control('estado',['options'=>$UF, 'class'=>'form-control','label'=>'ESTADO', 'id'=>'uf'])?>
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
        $(\'#cep\').mask(\'00000-000\', {reverse: true});
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

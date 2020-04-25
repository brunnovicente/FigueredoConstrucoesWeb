<?php

$this->Html->css('autocomplete.css', ['block' => true]);

$this->Html->script([
    'jquery.autocomplete.min.js'
], ['block' => true]);

?>

<div class="container-fluid">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand"><h3><?= __('Venda de Produtos') ?></h3></a>
        <?= $this->Html->link(__(' Voltar'), ['action' => 'index'], ['class' => 'nav-link btn btn-outline-info btn-sm fas fa-angle-left']) ?>
    </nav>
</div>
<br>

<div class="shadow p-3 container">
    <div class="row">
        <div class="col-12">
            <div>
                <div class="col-12">
                    <?php echo $this->Form->control('cliente',['class'=>'form-control', 'label'=>'CLIENTE', 'id'=>'buscacliente']);?>
                </div>
            </div>
            <div class="dropdown-divider"></div><br>
            <div class="col-12 row mt-2">
                <div class="col-8">
                    <?php echo $this->Form->control('busca',['class'=>'form-control', 'label'=>'PRODUTO', 'id'=>'busca']);?>
                </div>
                <div class="col-2">
                    <label for"preco">Preço (R$)</label>
                    <div id="preco" class="form-control"></div>
                </div>
                <div class="col-2">
                    <?php echo $this->Form->control('quantidade', ['class'=>'form-control', 'label' => 'Quantidade', 'id'=>'quantidade']);?>
                </div>
            </div>

            <div>
                <div class="col-2 mt-4 justify-content-end">
                    <?= $this->Form->button(__(' Add'), ['type' => 'button', 'class'=>'btn btn-primary fas fa-plus', 'id' => 'adicionar']) ?>
                </div>
            </div>
            <br>
            <?= $this->Form->create(null) ?>
            <div class="col-12 mt-2">
                <label class="bg-light" for="produtos">ITENS DA VENDA</label>
                <div class="row">
                    <div class="col-1">Código</div>
                    <div class="col-8">Descrição</div>
                    <div class="col-1">Preço</div>
                    <div class="col-1">Quantidade</div>
                    <div class="col-1">Açoes</div>
                </div>
                <hr>
                <div id="lista"></div>
                <hr>
                <div class="row">
                    <div class="col-1 offset-9">Total</div>
                    <div class="form-control col-1" id="total">0.00</div>
                </div>
            </div>
            <div class="col-12 mt-2 justify-content-end">
                <?= $this->Form->submit(__('Salvar'), ['class'=>'btn btn-success']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>
    function removeItem(item) {
        $(item).remove();
    }
    function calculaTotal() {
        var total = 0;
        $('#lista > div').each(function(index, element){
            var p = parseFloat($(element).find('.item-preco').text());
            var q = parseFloat($(element).find('.item-quantidade').val());
            console.log(p * q);
            total = total + p * q;
        });
        $('#total').html(total);
    }
    window.onload = function() {

        // index pra gerar linhas de itens
        var index = 0;

        // item selecionado no autocomplete
        var selected;
        var cselected;

        // autocomplete
        $("#busca").autocomplete({
            serviceUrl: "produtos-ajax",
            paramName: 'q',
            transformResult: function(response) {
                return {
                    suggestions: $.map(JSON.parse(response).produtos, function(item) {
                        return { value: item.descricao, data: item.id, price: item.preco };
                    })
                };
            },
            minChars: 2,
            onSelect: function (suggestion) {
                if(selected == null) {
                    selected = suggestion;
                    $('#quantidade').focus();
                    $('#preco').html(suggestion.price);
                }
            }
        });

        $("#buscacliente").autocomplete({
            serviceUrl: "clientes-ajax",
            paramName: 'q',
            transformResult: function(response) {
                return {
                    suggestions: $.map(JSON.parse(response).clientes, function(item) {
                        return { value: item.nome};
                    })
                };
            },
            minChars: 2,
            onSelect: function (suggestion) {
                if(cselected == null) {
                    cselected = suggestion;
                    $('#busca').focus();
                }
            }
        });

        $("#adicionar").click(function() {
            // criação de linha de item
            $('#lista').append('<div id="item'+index+'" class="row item-linha'+((index % 2) == 1?' bg-light':'')+'">' +
                '<div class="col-1"><input class="d-none" name="item['+index+'][id]" value="'+selected.data+'"/>'+selected.data+'</div>' +
                '<div class="col-8">'+selected.value+'</div>'+
                '<div class="col-1 item-preco">'+selected.price+'</div>'+
                '<div class="col-1"><input class="form-control item-quantidade" name="item['+index+'][quantidade]" value="'+$('#quantidade').val()+'"/></div>' +
                '<div class="col-1 p-1"><button class="btn btn-danger delete-item" type="button" onclick="removeItem(item'+index+')"><i class="fas fa-times"></i></button>'+
                '</div>');
            index++;
            // limpar campos
            selected = null;
            $('#quantidade').val("");
            $('#preco').val("");
            $('#busca').val("");
            calculaTotal();
        });

        $(".item-quantidade").change(function(){
            calculaTotal();
        });
    }
</script>

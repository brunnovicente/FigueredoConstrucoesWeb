<?php

$this->Html->css('autocomplete.css', ['block' => true]);

$this->Html->script(['jquery.autocomplete.min.js'], ['block' => true]);

$tipos = array(
    'Dinheiro'=>'Dinheiro',
    'Cartão Débito'=>'Cartão Débido',
    'Cartão Crédito'=>'Cartão Crédito',
    'Pendente'=>'Pendente',
);

?>

<div class="container-fluid">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand"><h3><?= __('CAIXA ABERTO - Venda de Produtos') ?></h3></a>
        <?= $this->Html->link(__(' Voltar'), ['action' => 'index'], ['class' => 'nav-link btn btn-outline-info btn-sm fas fa-angle-left']) ?>
    </nav>
</div>
<br>

<div class="container">

    <div class="row mb-3">
        <div class="col">
            <?php echo $this->Form->control('cliente',['class'=>'form-control', 'label'=>'CLIENTE', 'id'=>'buscacliente']);?>
        </div>
    </div>

    <div class="row mb-3"> <!-- Div Linha -->
        <!-- Dados de Busca -->
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

    <div class="row mb-5">
        <div class="col-12">
            <?= $this->Form->button(__(' Add'), ['type' => 'button', 'class'=>'btn btn-primary fas fa-plus float-right', 'id' => 'adicionar']) ?>
        </div>
    </div>

    <div class="row shadow mt-5 p-2">
        <!-- Produtos Adicionados na Venda -->
        <div class="col-12">
            <?= $this->Form->create(null) ?>
            <div class="col-1">
                <?php echo $this->Form->control('idcliente', ['class'=>'form-control', 'type'=>'hidden', 'id'=>'idcliente']);?>
            </div>
                <label class="bg-light h4" for="produtos">ITENS DA VENDA</label>
                <div class="row">
                    <div class="col-1">Código</div>
                    <div class="col-6">Descrição</div>
                    <div class="col-2">Preço</div>
                    <div class="col-2">Quantidade</div>
                    <div class="col-1">Açoes</div>
                </div>
                <hr>
                <div id="lista"></div>
                <hr>
                <div class="row bg-light    ">
                    <!--<div class="col-2 offset-8">SUB TOTAL</div>-->
                    <div class="col-3">
                        <?php echo $this->Form->control('total', ['class'=>'form-control', 'readonly' =>'readonly', 'label'=>'SUB TOTAL', 'id'=>'total']);?>
                    </div>
                </div>
            <!-- CÓDIGO DO BUTÃO DO MODAL -->
            <div class="col-12 mt-5">
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#janelaFinalizar">
                    Finalizar
                </button>
            </div>

            <div class="row"> <!-- DIV do Modal -->
                <!-- Modal -->
                <div class="modal fade" id="janelaFinalizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Finalizar Venda</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row p-3">
                                    <div class="col">
                                    <!-- <div class="col">SUB TOTAL</div>
                                    <div class="col form-control" id="total2">0.00</div> -->
                                    <?php echo $this->Form->control('total2', ['class'=>'form-control', 'disabled' =>'disabled', 'label' => 'SUB TOTAL', 'id'=>'total2']);?>
                                    </div>
                                </div>
                                <div class="row p-3">
                                    <div class="col">
                                        <?php echo $this->Form->control('', ['class'=>'form-control', 'label' => 'VALOR PAGO', 'id'=>'valorpago']);?>
                                    </div>
                                </div>
                                <div class="row p-3">
                                    <div class="col form-group">
                                        <?php echo $this->Form->control('pagamento',['options'=>$tipos, 'class'=>'form-control','label'=>'PAGAMENTO', 'id'=>'pagamento'])?>
                                    </div>
                                </div>
                                <div class="row p-3">
                                    <div class="col">
                                        <?php echo $this->Form->control('', ['class'=>'form-control', 'disabled' =>'disabled', 'label' => 'TROCO', 'id'=>'troco']);?>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <?= $this->Form->button(__('OK'), ['class'=>'btn btn-success']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- FIm da DIV do Modal -->

            <?= $this->Form->end() ?>
        </div>
    </div> <!-- Fim da DIV linha -->

</div>

<script>

    // index pra gerar linhas de itens
    var index = 0;

    // item selecionado no autocomplete
    var cselected;
    var selected;

    function removeItem(item) {
        $(item).remove();
    }

    function calculaTotal() {
        var total = 0;
        $('#lista > div').each(function(index, element){
            var p = parseFloat($(element).find('.item-preco').val());
            var q = parseFloat($(element).find('.item-quantidade').val());
            total = total + p * q;
        });
        $('#total').val(parseFloat(total, 10).toFixed(2).toString());
        $('#total2').val(parseFloat(total, 10).toFixed(2).toString());
    }

    function getItemOnBasket(id) {
        let e = null;
        $('#lista > div').each(function(index, element){
            let elem_id = parseInt($(element).find('.item-id').text());
            if(elem_id === id) {
                e = element;
            }
        });
        return e;
    }

    function adicionar(){
        let item_div = getItemOnBasket(selected.data);
        if(item_div == null) {
            // criação de linha de item
            $('#lista').append('<div id="item' + index + '" class="row item-linha' + ((index % 2) == 1 ? ' bg-light' : '') + '">' +
                '<div class="col-1 item-id"><input class="d-none" name="item[' + index + '][id]" value="' + selected.data + '"/>' + selected.data + '</div>' +
                '<div class="col-6">' + selected.value + '</div>' +
                //'<div class="col-2 item-preco">' + selected.price + '</div>' +
                '<div class="col-2"><input class="form-control item-preco" name="item[' + index + '][price]" value="' + selected.price + '"/></div>' +
                '<div class="col-2"><input class="form-control item-quantidade" name="item[' + index + '][quantidade]" value="' + $('#quantidade').val() + '"/></div>' +
                '<div class="col-1 p-1"><button class="btn btn-danger delete-item" type="button" onclick="removeItem(item' + index + ')"><i class="fas fa-times"></i></button>' +
                '</div>');
            index++;
        } else {
            let item_quant = parseInt($(item_div).find('.item-quantidade').val());
            let list_quant = parseInt($('#quantidade').val());
            $(item_div).find('.item-quantidade').val(item_quant+list_quant);
        }
        // limpar campos
        selected = null;
        $('#quantidade').val("");
        $('#preco').text("");
        $('#busca').val("");
        calculaTotal();
        $('#busca').focus();
    }

    window.onload = function() {
        // autocomplete
        $("#buscacliente").autocomplete({
            serviceUrl: "clientes-ajax",
            paramName: 'q',
            autoSelectFirst: true,
            transformResult: function(response) {
                return {
                    suggestions: $.map(JSON.parse(response).clientes, function(item) {
                        return { value: item.nome, data: item.id, cpf:item.cpf};
                    })
                };
            },
            minChars: 2,
            onSelect: function (suggestion) {
                if(cselected == null) {
                    cselected = suggestion;
                    $('#busca').focus();
                    $('#idcliente').val(suggestion.data)
                }
            }
        });

        $("#busca").autocomplete({
            serviceUrl: "produtos-ajax",
            paramName: 'q',
            autoSelectFirst: true,
            transformResult: function(response) {
                return {
                    suggestions: $.map(JSON.parse(response).produtos, function (item) {
                        return {value: item.descricao, data: item.id, price: item.preco};
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

        $('#quantidade').keyup(function(e){
            if(e.keyCode === 13 && $('#quantidade').val()!=="")
            {
                adicionar();
            }
        });

        $("#adicionar").click(function() {
            adicionar();
        });

        $(".item-quantidade").change(function(){
            calculaTotal();
        });
    }
</script>

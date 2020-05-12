<?php

$this->Html->css('autocomplete.css', ['block' => true]);

$this->Html->script([
    'jquery.autocomplete.min.js'
], ['block' => true]);

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
        <div class="col-3">
            <?php echo $this->Form->control('cpf',['class'=>'form-control', 'label'=>'CPF', 'id'=>'cpf']);?>
        </div>
        <div class="col-9">
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
                    <div class="col-2 offset-8">SUB TOTAL</div>
                    <div class="form-control col-2" id="total">0.00</div>
                </div>
            <div class="col-12 mt-5">
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalExemplo">
                    Finalizar
                </button>
            </div>

            <div class="row"> <!-- DIV do Modal -->
                <!-- Modal -->
                <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <div class="col">SUB TOTAL</div>
                                    <div class="col form-control" id="total2">0.00</div>
                                </div>
                                <div class="row p-3">
                                    <div class="col">
                                        <?php echo $this->Form->control('', ['class'=>'form-control', 'label' => 'VALOR PAGO', 'id'=>'valorpago']);?>
                                    </div>
                                </div>
                                <div class="row p-3">
                                    <div class="col">TROCO</div>
                                    <div class="col form-control" id="troco">0.00</div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <?= $this->Form->submit(__('OK'), ['class'=>'btn btn-success']) ?>
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
        $('#total2').html(total);
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
                        return { value: item.nome, data: item.id, cpf:item.cpf};
                    })
                };
            },
            minChars: 2,
            onSelect: function (suggestion) {
                if(cselected == null) {
                    cselected = suggestion;
                    $('#cpf').html(suggestion.cpf)
                    $('#busca').focus();
                }
            }
        });

        $("#adicionar").click(function() {
            // criação de linha de item
            $('#lista').append('<div id="item'+index+'" class="row item-linha'+((index % 2) == 1?' bg-light':'')+'">' +
                '<div class="col-1"><input class="d-none" name="item['+index+'][id]" value="'+selected.data+'"/>'+selected.data+'</div>' +
                '<div class="col-6">'+selected.value+'</div>'+
                '<div class="col-2 item-preco">'+selected.price+'</div>'+
                '<div class="col-2"><input class="form-control item-quantidade" name="item['+index+'][quantidade]" value="'+$('#quantidade').val()+'"/></div>' +
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

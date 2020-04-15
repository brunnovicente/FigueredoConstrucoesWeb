<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">

    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('all.css') ?>
    <?= $this->Html->css('estilo.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->script(['jquery-3.4.1.min.js','bootstrap.js', 'bootstrap.bundle.js','menu.js']);?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav id="barra">
        <div class="top-nav-title">
            <a href="/">Figueredo Construções</a>
        </div>

    </nav>

    <div id="lateral">

        <ul id="accordion" class="accordion">
            <li>
                <div class="link"><i class="fa fa-shopping-cart"></i>Vendas<i class="fa fa-chevron-down"></i></div>
                <ul class="submenu">
                    <li><a href="/vendas/add">Operação de Venda</a></li>
                    <li><a href="/vendas/index">Consulta de Vendas</a></li>
                </ul>
            </li>
            <li>
                <div class="link"><i class="fa fa-user-tie"></i>Clientes<i class="fa fa-chevron-down"></i></div>
                <ul class="submenu">
                    <li><a href="/clientes/add">Cadastrar Cliente</a></li>
                    <li><a href="/clientes/index">Consulta de Clientes</a></li>
                </ul>
            </li>
            <li>
                <div class="link"><i class="fa fa-paint-roller"></i>Estoque<i class="fa fa-chevron-down"></i></div>
                <ul class="submenu">
                    <li><a href="/fornecedores/index">Gerência de Fornecedores</a></li>
                    <li><a href="/produtos/index">Gerência de Produtos</a></li>
                    <li><a href="/entradas/index">Entrada de Produtos</a></li>
                </ul>
            </li>
            <li>
                </i><a class="link" href="/users/logout"><i class="fas fa-power-off"> </i> Sair</a>
            </li>
        </ul>

    </div>

    <div id="conteudo">
          <?= $this->Flash->render() ?>
          <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>

<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'Figueredo Construçoes';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
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

    <?= $this->Html->css('milligram.min.css') ?>
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('home.css') ?>
    <?= $this->Html->css('all.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="align-items-center m-0">

    </div>

    <div>
        <div class="container text-center">
            <a href="https://cakephp.org/" target="_blank">
                <img alt="CakePHP" src="/img/logo.png" width="350" />
            </a>
            <p class="h1 text-success"> Fazemos Entrega!</p>
        </div>
    </div>

    <div class="container-sm shadow mt-5 p-4">
        <div class="row justify-content-center">
            <p style="font-size: 25px; font-weight: bold;">CONTATOS </p>
        </div>
        <div>
            <table align="center" style="width: 260px; text-align:center;">
                <tr>
                    <td> <p style="font-size: 25px;"> <i class="fab fa-whatsapp text-success fa-1x"></i> (86) 98864-8697</i></p> </td>
                </tr>
                <tr>
                    <td> <p style="font-size: 25px;"> <i class="fas fa-phone"></i> (86) 99927-4161 </p> </td>
                </tr>
                <tr>
                    <td> <p style="font-size: 25px;"> <i class="fas fa-phone"></i> (86) 99477-8209 </p> </td>
                </tr>
            </table>
        </div>

        <div class="row justify-content-center mt-5">
            <a class="btn btn-success text-light" href="/users/login"> <i class="fas fa-sign-in-alt"></i> ACESSAR SISTEMA</a>
        </div>

    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col h2 text-center">
                Nossa Localização
            </div>
        </div>
        <div class="row">
            <div class="col embed-responsive embed-responsive-16by9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.9105562399527!2d-42.812514684712994!3d-5.118115053250718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x78e371c2979617d%3A0x19c69d1be5fd337e!2sFigueredo%20Constru%C3%A7%C3%B5es!5e0!3m2!1spt-BR!2sbr!4v1588431251540!5m2!1spt-BR!2sbr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>

</body>
</html>

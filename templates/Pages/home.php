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

</body>
</html>

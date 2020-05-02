<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<br>
<div class="container shadow col-4 p-2">
    <div class="row mb-5 justify-content-center">
        <div class="col-9">
            <?php echo $this->Html->image('logo.png', ['class'=>'img-fluid'])?>
        </div>
    </div>
    <?= $this->Form->create()?>

    <div class="row mb-2">
        <div class="col-12 h4 text-center">
            Acesso ao Sistema
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <?php echo $this->Form->control('username', ['class' =>'form-control h3','label'=>'LOGIN']);?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <?php echo $this->Form->control('password', ['class' =>'form-control h3','label'=>'SENHA']);?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <?= $this->Form->button(__('Entrar'), ['class'=>'btn btn-success btn-block']);?>
        </div>
        <?= $this->Form->end() ?>
    </div>
    <div class="row">
        <div class="col-12">
            <a class="btn btn-light btn-block mt-2" href="/">Voltar</a>
        </div>
    </div>
</div>

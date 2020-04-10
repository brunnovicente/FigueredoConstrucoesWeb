<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<br>
<div class="container" align="center">

    <div class="p-3 col-4 shadow">
        <div><?php echo $this->Html->image('logo.png', ['width'=>'290px'])?></div>
        <br>
        <?= $this->Form->create()?>
        <p class="h2" align="center">Acesso ao Sistema</p>
        <div class="form-group">
            <?php echo $this->Form->control('username', ['class' =>'form-control h3','label'=>'LOGIN']);?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->control('password', ['class' =>'form-control h3','label'=>'SENHA']);?>
        </div>
        <?= $this->Form->button(__('Entrar'), ['class'=>'btn btn-success btn-block']);?>
        <?= $this->Form->end() ?>
        <a class="btn btn-light btn-block mt-2" href="/">Voltar</a>
    </div>

</div>

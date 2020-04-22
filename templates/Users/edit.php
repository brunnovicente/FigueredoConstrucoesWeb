<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="container-fluid">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand"><h3><?= __('Editar Usuário') ?></h3></a>
        <?= $this->Html->link(__(' Voltar'), ['action' => 'index'], ['class' => 'nav-link btn btn-outline-info btn-sm fas fa-angle-left']) ?>
    </nav>
</div>
<br>

<div class="container">
    <div class="p-3 shadow">
        <div class="users form content">
            <?= $this->Form->create($usuario) ?>
            <div class="row">
                <div class="col-12 form-group">
                    <?php echo $this->Form->control('nome',['class'=>'form-control','label'=>'NOME', 'id'=>'nome'])?>
                </div>
            </div>

            <div class="row">
                <div class="col-6 form-group">
                    <?php echo $this->Form->control('username',['class'=>'form-control','label'=>'NOME DE USUÁRIO', 'id'=>'username'])?>
                </div>
                <div class="col-6 form-group">
                    <?php echo $this->Form->control('password',['class'=>'form-control','label'=>'SENHA', 'id'=>'senha'])?>
                </div>
            </div>

            <div class="row">
                <div class="col-12 form-group">
                    <?php echo $this->Form->control('email',['class'=>'form-control','label'=>'E-MAIL', 'id'=>'email'])?>
                </div>
            </div>
            <div class="row mb-2 mr-1 justify-content-end">
                <?= $this->Form->button(__(' Salvar'), ['class'=>'btn btn-success fas fa-save']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

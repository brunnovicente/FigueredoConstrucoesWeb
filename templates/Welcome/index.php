
<div id="suprema" class="container-fluid">

    <nav class="navbar navbar-light bg-light m-1">
        <p class="h3">Bem Vindo <?php echo $user['nome']?></p>
    </nav>
    <div class="mt-5">
    <h3>Menu Rápido</h3>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand text-info" href="#">
            <i class="fas fa-shopping-cart fa-3x"></i><br>
            <span>Vender</span>
        </a>
        <a class="navbar-brand text-primary" href="/produtos/add">
            <i class="fas fa-paint-roller fa-3x"></i><br>
            <span>Produtos</span>
        </a>
        <a class="navbar-brand text-success" href="#">
            <i class="fas fa-money-check-alt fa-3x"></i> <br>
            <span>Preço</span>
        </a>
    </nav>
    </div>
</div>

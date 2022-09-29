<nav>
    <ul>
        <li><a href="index.php">Inicio</a></li>
    <?php 
        if($_SESSION['user'] == 1){
        ?>
        <li class="principal">

            <a href="#">Usuarios</a>
            <ul>
                <li><a href="lista_usuarios.php">Lista de Usuarios</a></li>
            </ul>
        </li>
    <?php } ?>
        <li class="principal">
            <a href="#">Productos</a>
            <ul>
                <li><a href="lista_productos.php">Lista de Productos</a></li>
            </ul>
        </li>
    </ul>
</nav>
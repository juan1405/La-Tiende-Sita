<?php
include 'global/config.php';
include 'global/conexion.php';
include 'global/carrito.php';

include 'templates/cabecera3.php';

?>
<?php

if (!isset($_SESSION["admin"])) {
    header("Location:login.php");
    session_start();

}

?>
<?php

echo "<h3>Has iniciado sesión como: " . $_SESSION["admin"] . "</h3><br><br><h3>Has entrado como<i><b> Administrador</b></i> de este sitio web</h3><br><br>";

?>

<body class="wiki">
    <div class="container-fluid">
     
        <!--Menú-->
        <div class="row text-white justify-content-center">
            <div class="col-12 text-white justify-content-center">
                <ul class="nav justify-content-center">
                    <li class="nav-item "><a class="nav-link text-dark btn btn-outline-warning" href="admin/ingresar.php">Añadir productos</a></li>
                    <li class="nav-item"><a class="nav-link text-dark btn btn-outline-warning" href="admin/mostrar.php">Listar productos</a></li>
                    <li class="nav-item"><a class="nav-link text-dark btn btn-outline-warning" href="admin/borrar.php">Borrar productos</a></li>
                    <li class="nav-item"><a class="nav-link text-dark btn btn-outline-warning" href="admin/actualizar.php">Actualizar productos</a></li>
                </ul>

            </div>
        </div>
       
    </div>
    <br>
    <br>

<?php
include 'templates/pie.php';
?>

<!-- Esta parte sirve para la parte de administración de los productos. Concretamente muestra el producto que esté en nuestra base de datos -->

<?php
include '../global/config.php';
include '../global/conexion.php';
include '../global/carrito.php';
include '../templates/cabeceraadmin.php';

//incluye la clase Libro y CrudLibro
require_once('crud_libro.php');
require_once('libro.php');
$crud=new CrudLibro();
$libro= new Libro();
//obtiene todos los libros con el método mostrar de la clase crud
$listaLibros=$crud->mostrar();

?>

<?php

/*Esta condición evalua si existe la sesión de usuario y si no existe no deja acceder a esta parte y te manda al login*/

if (!isset($_SESSION["admin"])) {
    session_start();
    header("Location: ../login.php");
    exit();
   
}

?>
<br>
<br>
<body class="wiki">
    <div class="container-fluid">
            <div class="col-12 text-white ">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!--Con un bucle recorremos el array $listaLibros e imprimimos el resultado.-->
                    <?php foreach ($listaLibros as $libro) {?>
                        <tr>
                            <th scope="row"><?php echo $libro->getNombre() ?></th>
                            <td><?php echo $libro->getDescripcion() ?></td>
                            <td><?php echo $libro->getPrecio() ."€" ?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        <div class="volver text-center pt-3">    
           <a href="../admin.php" class="btn btn-success text-white">Volver</a>
        </div>
    </div>

<?php
include '../templates/pieadmin.php';
?>

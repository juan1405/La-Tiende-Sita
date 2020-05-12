<!-- Esta parte sirve para la parte de administración de los productos. Concretamente actualiza el producto que esté en nuestra base de datos -->
<?php 
session_start();

include '../global/config.php';
include '../global/conexion.php';
include '../carrito.php';
include '../templates/cabeceraadmin.php';

//incluye la clase Libro y CrudLibro
require_once('crud_libro.php');
require_once('libro.php');
$crud=new CrudLibro();
$libro= new Libro();
//obtiene todos los libros con el método mostrar de la clase crud
$libro=$crud->obtenerLibro2($_GET['ID']);
?>
<?php
/*Esta condición evalua si existe la sesión de usuario y si no existe no deja acceder a esta parte y te manda al login*/

if (!isset($_SESSION["admin"])) {
    header("Location: ../login.php");
    exit();
}
?>

<body class="wiki">
    <div class="container-fluid">
    <br>
        <!--Menú-->
        <div class="row  text-white justify-content-center">
            <div class="col-12 text-white justify-content-center">
   

            <form class="text-center" action='administrar_libro.php' method='post'>
                <div class="form-row">
                    <div class="col text-center">
                        <input type='hidden' name='ID' value='<?php echo $libro->getId()?>'>
                        <label for="inputNmae" class="text-center">Nombre</label>
                        <input type="text" class="form-control" required name='nombre' value='<?php echo $libro->getNombre()?>'>
                    </div>

                    <div class="col text-center">
                        <label for="inputName">Descipcion</label>
                        <input type="text" class="form-control" required name='descripcion' value='<?php echo $libro->getDescripcion()?>' >
                    </div>

                    <div class="col text-center">
                        <label for="inputName">Precio</label>
                        <input type="text" class="form-control" required name='precio' value='<?php echo $libro->getPrecio()?>' >
                        <small>El precio se debe fijar con dos decimales: 10.00€</small>
                    </div>           
                </div>
                <div class="form-row">
                    <div class="col text-center">
                        <label for="inputName">Imagen</label>
                        <input type="text" class="form-control" required name='imagen' value='<?php echo $libro->getImagen()?>' >
                    </div>
                </div>
                    <input type='hidden' name='actualizar' value'actualizar'>
                <br>
                <input type='submit' value='Guardar'> <br><br>
                <a href="../admin.php" class="btn btn-success text-white">Volver</a>
               
            </form>
            <br>
            </div>
        </div>
    </div> 
 

    <?php
include '../templates/pieadmin.php';
?>

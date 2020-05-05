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
     
        <!--Menú-->
            <div class="col-12 text-white ">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Precio</th>
                        <!--    <th scope="col">Imágen</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($listaLibros as $libro) {?>
                        <tr>
                            <th scope="row"><?php echo $libro->getNombre() ?></th>
                            <td><?php echo $libro->getDescripcion() ?></td>
                            <td><?php echo $libro->getPrecio() ."€" ?></td>
                           <!-- <td><?php //echo $libro->getImagen() ?></td> -->
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

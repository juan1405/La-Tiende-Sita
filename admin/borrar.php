<!-- Esta parte sirve para la parte de administración de los productos. Concretamente elimina el producto que esté en nuestra base de datos -->
<?php
include '../templates/cabeceraadmin.php';
    session_start();
?>

<?php

/*Esta condición evalua si existe la sesión de administrador y si no existe no deja acceder a esta parte y te manda al login*/

if (!isset($_SESSION["admin"])) {
    header("Location: ../login.php");
    exit();
}
?>

<?php
//incluye la clase Libro y CrudLibro
require_once('crud_libro.php');
require_once('libro.php');
$crud=new CrudLibro();
$libro= new Libro();
//obtiene todos los libros con el método mostrar de la clase crud
$listaLibros=$crud->mostrar();
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
                        
                         <th scope="col">Borrar producto</th>
                     </tr>
                 </thead>
                 <tbody>
                      <!--Con un bucle recorremos el array $listaLibros e imprimimos el resultado. Seguido hay un enlace que elimina el libro-->
                     <?php foreach ($listaLibros as $libro) {?>
                        <tr>
                            <th scope="row"><?php echo $libro->getNombre() ?></th>
                            <td><?php echo $libro->getDescripcion() ?></td>
                            <td><?php echo $libro->getPrecio() ."€" ?></td>
                            <td><a class="btn btn-warning" href="administrar_libro.php?ID=<?php echo $libro->getId()?>&accion=e">Eliminar</a></td>

                        </tr>
                        <?php }?>

                 </tbody>
             </table>
         
         </div>
     <div class="volver text-center pt-3">    
        <a href="../admin.php" class="btn btn-success text-white text-center">Volver</a>
     </div>
     <br>
 </div>

 <?php
include '../templates/pieadmin.php';
?>

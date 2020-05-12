<!-- Esta parte sirve para la parte de administración de los productos. Concretamente actualiza el producto que esté en nuestra base de datos -->

<?php
include '../templates/cabeceraadmin.php';
?>

<?php

session_start();

/*Esta condición evalua si existe la sesión de administrador y si no existe no deja acceder a esta parte y te manda al login*/

if (!isset($_SESSION["admin"])) {
    header("Location: ../login.php");
    exit();    
}

?>

<!--Hacemos referencia a una clase implementada de otro código empleado en clase-->

<?php

require_once('crud_libro.php');

require_once('libro.php');

$crud=new CrudLibro();

$libro= new Libro();

$listaLibros=$crud->mostrar();

$SID=session_id();
?>
<br>
<br>
<body class="bg-success">

    <div class="container-fluid">

         <div class="col-12 text-white ">
             <table class="table table-hover table-dark">
                 <thead>
                     <tr>
                         <th scope="col">Nombre</th>
                         <th scope="col">Descripcion</th>
                         <th scope="col">Precio</th>
                         <th scope="col">Imagen</th>
                         <th scope="col">Modificar producto</th>
                     </tr>
                 </thead>
                 <tbody>
                    <!--Con un bucle recorremos el array $listaLibros e imprimimos el resultado-->
                     <?php foreach ($listaLibros as $libro) {?>
                        <tr>
                            <th scope="row"><?php echo $libro->getNombre() ?></th>
                            <td><?php echo $libro->getDescripcion() ?></td>
                            <td><?php echo $libro->getPrecio() ."€" ?></td>
                            <td><?php echo $libro->getImagen() ?></td>
                            <td><a class="btn btn-warning" href="update.php?ID=<?php echo $libro->getId()?>&accion=a">Actualizar</a> </td>
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

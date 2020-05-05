<?php
include '../templates/cabeceraadmin.php';

 session_start();
?>
<?php

if (!isset($_SESSION["admin"])) {
    header("Location: ../login.php");
    exit();
   

}
?>
<br>
<br>

<body class="wiki">
    <div class="container-fluid">
      
        <!--Menú-->
        <div class="row  text-white ">
            <div class="col-12 text-dark ">
		
            <form class="text-center" action='administrar_libro.php' method='post'>
                <div class="form-row">
                    <div class="col text-center">
                        <label for="inputNmae" class="text-center">Nombre</label>
                        <input type="text" class="form-control" name="nombre" >
                    </div>
                    <div class="col text-center">
                        <label for="inputName">Descripcion</label>
                        <input type="text" class="form-control" name="descripcion">
                    </div>
                    <div class="col text-center">
                        <label for="inputName">Precio</label>
                        <input type="text" required class="form-control" name="precio">
                        <small>El precio se debe fijar con dos decimales: 10.00€</small>
                    </div>
                    <input type='hidden' name='insertar' value='insertar'>
                </div>
                <div class="form-row">
                  
                    <div class="col text-center">
                        <label for="inputName">Imagen</label>
                        <input type="text" required class="form-control" name="imagen">
                  
                    </div>
                </div>
                <br>
                <input type='submit' value='Guardar'> <br><br>
                <a href="../admin.php" class="btn btn-info text-white text-center">Volver</a>
            </form>
            </div>
        </div>
       
    </div>
 
<br>
<?php
include '../templates/pieadmin.php';
?>

<!--Contiene una de las 4 cabeceras necesarias-->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">

    <script src="https://kit.fontawesome.com/4507daba72.js" crossorigin="anonymous"></script>

    <title>Mercedes-Benz</title>

    <link rel="stylesheet" href="estilo/custom.css">

  </head>
  <body class="wiki">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand"><img src="img/logo.svg" width="70" height="40"></a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
               <a class="nav-link" href="mostrarCarrito.php"> <i class="fas fa-shopping-cart"></i> (<?php 
                        echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']); 
                    ?>)</a>
                </li>
                
            </ul>
            
            <form class="form-inline">
            <a class="btn btn-outline-warning" href="login.php" role="button">Iniciar Sesión</a>
            <a class="btn btn-outline-warning" href="registro.php" role="button">Registrarse</a>
            </form>
            
        </div>
        
    </nav> 

</br>
</br>
<div class="container-fluid wiki">
<br>

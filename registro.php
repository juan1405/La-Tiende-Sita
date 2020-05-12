<!--Es la página de registro no contiene nada maás que el formulario para registrar el usuario en la BD-->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Registrarse</title>
</head>

<body class="bg-success">
    <h1 class="bg-primary text-center">Registrarse</h1>

    <div class="container">
        <form action="validaciones/comprueba_registro.php" method="post">
            <div class="form-row">
                    <div class="col">
                        <label for="inputName">Nombre</label>
                    <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                    </div>
                    <div class="col">
                        <label for="inputLastName">Apellidos</label>
                    <input type="text" class="form-control" placeholder="Apellidos" name="apellido">
                    </div>
            </div>
            <div class="form-row">
                        <div class="form-group  col-md-6">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="example@expample.com" name="login">
                        </div>
                        <div class="form-group  col-md-6">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="" name="password">
                            <small>Mínimo 8 caracteres, una mayúscula, una minúscula, un número y un símbolo</small>
                        </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Dirección</label>
                <input type="text" placeholder="Calle ejemplo n20" class="form-control" id="inputAddress" name="direc">
            </div>
            <div class="form-group">
                <label for="inputAddress2">País</label>
                <input type="text" class="form-control" id="inputAddress2" name="pais">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputCity">Ciudad</label>
                <input type="text" class="form-control" id="inputCity" name="ciudad">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPhone">Teléfono</label>
                    <input class="form-control" type="text" name="tel">
                </div>
                <div class="form-group col-md-2">
                <label for="inputZip">Código postal</label>
                <input type="number" class="form-control" id="inputZip" name="cod">
                </div>
            </div>

            <input type="hidden" name="perfil" value="usuario">
            


         

            <button type="submit" class="btn btn-primary" name="enviar">Registrarse</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
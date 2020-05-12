<!--Esta parte es de las más importantes de la página ya que comprueba si el usuario esta logueado que le inicie sesión según el tipo de usuario que sea, etc.-->
<?php

try {
    /* se establece conexión con la base de datos y se obtiene el usuario y la contraseña */
    $base = new PDO("mysql:host=localhost; dbname=tienda1", "root", "");
    $base ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql="SELECT * FROM USUARIOS_PASS WHERE USUARIOS= :login AND PASSWORD= :password";
    $resultado = $base->prepare($sql);

    $login=htmlentities(addslashes($_POST["login"]));
    $password=htmlentities(addslashes($_POST["password"]));
    
    $resultado->bindValue(":login", $login);
    $resultado->bindValue(":password", $password);

    $resultado->execute();

    /* Obtiene el resultado de la ejecución de la consulta preparada anterior y cuenta las filas */

    $numero_registro=$resultado->rowCount();

    /* Si el resultado anterior es distinto de 0 esto quiere decir que si el usuario que ha introducido una persona en el login existe me hace lo siguiente:
        Comprueba si el usuarios es el administrador y si es así me dirige la página principal del administrador.
        Si el usuario es un comprador me lleva al index.
    */

    if ($numero_registro!=0) {
        if ($_POST["login"] == "admin@gmail.com" && $_POST['password'] == "Admin89--") {
            session_start();

            $_SESSION["admin"]=$_POST["login"];

            header("location:../admin.php");
            exit();
        }else {
            session_start();

        $_SESSION["usuario"]=$_POST["login"];
     
        $_SESSION["contraseña"]=$_POST['password'];
     
        
        header("location:../index2.php");
        exit();
        }
        
  
    }else {
        
        header("location:../login.php");
        exit();
      
    }

} catch (Exception $e) {
    die("Error:" . $e->getMessage());
}

?>

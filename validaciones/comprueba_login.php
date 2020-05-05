<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

try {
    $base = new PDO("mysql:host=localhost; dbname=tienda1", "root", "");
    $base ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql="SELECT * FROM USUARIOS_PASS WHERE USUARIOS= :login AND PASSWORD= :password";
    $resultado = $base->prepare($sql);

    $login=htmlentities(addslashes($_POST["login"]));
    $password=htmlentities(addslashes($_POST["password"]));
    
    $resultado->bindValue(":login", $login);
    $resultado->bindValue(":password", $password);
   
    

    $resultado->execute();
   

    $numero_registro=$resultado->rowCount();

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
    
</body>
</html>

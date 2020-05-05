<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
if (!empty($_POST['password']) && !empty($_POST['login']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['pais']) && !empty($_POST['direc']) && !empty($_POST['ciudad']) && !empty($_POST['tel']) && !empty($_POST['cod'])) {
    if ((preg_match("/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/", $_POST['password']))) {
        if (preg_match("/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/", $_POST['login'])) {
            if (preg_match("/[a-z]/", $_POST['nombre'])) {
                if (preg_match("/[a-z]/", $_POST['apellido'])) {
                    if (preg_match("/[a-z]/", $_POST['pais'])) {
                        if (preg_match("/[a-z][0-9]/", $_POST['direc'])) {
                            if (preg_match("/[a-z]/", $_POST['ciudad'])) {
                                if (preg_match("/[0-9]{9}/", $_POST['tel'])) {
                                    if (preg_match("/^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/", $_POST['cod'])) {
                                        
                                        try {
                                            $base = new PDO("mysql:host=localhost; dbname=tienda1", "root", "");
                                            $base ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                            if(isset($_POST['enviar'])){
                                    
                                    
                                                $existenciausql=("SELECT COUNT(*) FROM USUARIOS_PASS WHERE USUARIOS = :login");
                                                $stmt1= $base->prepare($existenciausql);
                                                $login=htmlentities(addslashes($_POST["login"]));
                                                
                                                $stmt1->execute(array(":login" => $login));
                                                if($stmt1->fetchColumn() > 0){
                                                    header("location:../templates/registrohecho.php");
                                                    exit();
                                                }else {
                                                    $login=$_POST['login'];
                                                    $password=$_POST['password'];
                                                    $nombre= $_POST['nombre'];
                                                    $apellido = $_POST["apellido"];
                                                    $direc = $_POST["direc"];
                                                    $tel = $_POST["tel"];
                                                    $cod = $_POST["cod"];
                                                    $pais=$_POST['pais'];
                                                    $ciudad=$_POST['ciudad'];
                                                    $perfil=$_POST['perfil'];
                                    
                                                    $sql = "INSERT INTO USUARIOS_PASS (NOMBRE, APELLIDOS, USUARIOS, PASSWORD, DIRECCION, PAIS, CIUDAD, TELEFONO, CODIGO_POSTAL, PERFIL) VALUES (:nombre, :apellido, :login, :password, :direc, :pais, :ciudad, :tel, :cod, :perfil)";
                                                    $stmt = $base -> prepare($sql);

                                                    $stmt->bindParam(':nombre', $_POST['nombre']);

                                                    $stmt->bindParam(':apellido', $_POST['apellido']);

                                                    $stmt -> bindParam(':login',$_POST['login']);
                                                    
                                                    $stmt -> bindParam(':password',$_POST['password']);

                                                    $stmt->bindParam(':direc', $_POST['direc']);

                                                    $stmt->bindParam(':pais', $_POST['pais']);

                                                    $stmt->bindParam(':ciudad', $_POST['ciudad']);

                                                    $stmt->bindParam(':tel', $_POST['tel']);
                                                    
                                                    $stmt->bindParam(':cod', $cod);

                                                    $stmt->bindParam(':perfil', $_POST['perfil']);
                                    
                                                    if ($stmt -> execute()) {
                                                        header("location:../templates/registroexitoso.php");
                                                        exit();
                                                    }
                                                    else {
                                                        echo "Ha ocurrido un error que no puedes saber";
                                                    }
                                                }
                                            
                                            }
                                    
                                        } catch (Exception $e) {
                                            die("Error:" . $e->getMessage());
                                        }

                                    } else {
                                        echo "<small>Escriba un CP correcto</small>";
                                    }
                                    
                                } else {
                                    echo "<small>Escriba un teléfono correcto</small>";
                                }
                                
                            } else {
                                echo "<small>Escriba una ciudad correcta correcto</small>";
                            }
                            
                        } else {
                            echo "<small>Escriba una dirección correcta correcto</small>";
                        }
                        
                    } else {
                        echo "<small>Escriba un país correcto</small>";
                    }
                    
                }else {
                    echo "<small>Escriba un apellido correcto</small>";
                }
            } else {
                echo "<small>Escriba un nombre correcto</small>";
            }
            
        } else {
            echo "<small>Escriba un email correcto</small>";
        }
        
    } else {
        echo "<small>Escriba una contraseña correcta</small>";
    }
    
}else {
    echo "Completa todos los campos";
}




?>
</body>
</html>

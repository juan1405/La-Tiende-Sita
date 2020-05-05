<?php
ob_start();
?>
<?php

include 'global/config.php';
include 'global/conexion.php';
include 'global/carrito.php';
include 'templates/cabecera2.php';

?>

<?php

if (!isset($_SESSION["usuario"])) {
    echo '<script language="javascript">alert("Porfavor inicie sesión..");</script>';
    echo '<script>window.location.href = "login.php"</script>';

    
}else {
    if ($_POST) {
        $total=0;
        $SID=session_id();
        $Correo=$_POST['email'];

        foreach ($_SESSION['CARRITO'] as $indice => $producto) {
            $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);


        }

        $sentencia=$pdo->prepare("INSERT INTO `tblventas` (`ID`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `status`) VALUES (NULL, :ClaveTransaccion, '', NOW(), :Correo, :Total, 'pendiente');");
        
        $sentencia->bindParam(":ClaveTransaccion", $SID);
        $sentencia->bindParam(":Correo", $Correo);
        $sentencia->bindParam(":Total", $total);
    
        
        $sentencia->execute();
        $idVenta=$pdo->lastInsertId();

        foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        
        $sentencia=$pdo->prepare("    INSERT INTO `tbldetallaventa` (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`, `DESCARGADO`)
        VALUES (NULL, :IDVENTA, :IDPRODUCTO, :PRECIOUNITARIO, :CANTIDAD, '0');
        ");


        $sentencia->bindParam(":IDVENTA", $idVenta);
        $sentencia->bindParam(":IDPRODUCTO", $producto['ID']);
        $sentencia->bindParam(":PRECIOUNITARIO", $producto['PRECIO']);
        $sentencia->bindParam(":CANTIDAD", $producto['CANTIDAD']);
        $sentencia->execute();


        }
        //echo "<h3>".$total."</h3>";
    }

}

?>


<div class="jumbotron">
    <h1 class="display-4">¡Paso final!</h1>
    <hr class="my-4">
    <p class="lead"> Estas apunto de pagar la cantidad de: 
        <h4> <?php echo number_format($total, 2); ?>€ </h4>
    </p>
    <p>Los productos pdran ser descargados una vez realizado el pago</p>
</div>

<?php
include 'templates/pie.php';
?>
<?php
ob_end_flush();
?>
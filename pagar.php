<!---En esta parte se ve los productos que has comprado y puedes tener la factura y realizar la compra con paypal. Sólo tienen acceso aquellos usuarios que pueden comprar-->
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
    /* Recupera el id de la sesión que hay iniciada y mete en la tabla de ventas y en la de detallaventa los detalles que tienen los productos que se compran */
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
<!--Aquí empieza la parte de pagar con PayPal -->

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<style>
    
/* Media query for mobile viewport */

@media screen and (max-width: 400px) {
    #paypal-button-container {
        width: 100%;
    }
}


/* Media query for desktop viewport */

@media screen and (min-width: 400px) {
    #paypal-button-container {
        width: 250px;
        display: inline-block;
    }
}
</style>

<div class="jumbotron">
    <h1 class="display-4 text-center">¡Tu compra se ha realizado correctamente!</h1>
    <hr class="my-4">
    <p class="lead text-center"> Total a Pagar: 
        <h4 class="text-center"> <?php echo number_format($total, 2); ?>€ </h4>
    </p>
    <div class="text-center">
        <div id="paypal-button-container"></div> 
    </div>
        

    <h3 class="text-center">Prodcutos comprados:</h3>
    <p class="lead text-center">

   <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){ 
      echo "->" . $producto['NOMBRE']."<br>";
        echo "->" . number_format($producto['PRECIO'],2)."€";
       
 
    }  
    ?>   
    </p>
    <div class="text-center">
        <a href="productos.php" class="btn btn-danger">Ver Factura</a>
    </div>
</div>
<script>
    paypal.Button.render({
        env: 'sandbox', // sandbox | production
        style: {
            label: 'checkout',  // checkout | credit | pay | buynow | generic
            size:  'responsive', // small | medium | large | responsive
            shape: 'pill',   // pill | rect
            color: 'gold'   // gold | blue | silver | black
        },
 

 
        client: {
            sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
            production: ''
        },
 
        // Wait for the PayPal button to be clicked
 
        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '<?php echo $total ?>', currency: 'EUR' },
                        
                        }
                    ]
                }
            });
        },
 
        // Wait for the payment to be authorized by the customer
 
        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                console.log(data);
                window.location="verificador.php?paymentToken="+data.paymentToken+"&paymentID="+data.paymentID;
            });
        }
   
    }, '#paypal-button-container');
 
</script>

<?php
include 'templates/pie.php';
?>
<?php
ob_end_flush();
?>
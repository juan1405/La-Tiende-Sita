<!--Es el index de los usuarios invitados-->
<?php

include 'global/config.php';
include 'global/conexion.php';
include 'global/carrito.php';
include 'templates/cabecera.php';

?>

<header class="masthead">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12 text-center text-white">
                                <h1 class="font-weight-light">Página oficial de Mercedes-Benz</h1>
                                <p class="lead">Esta página está diseñada para saber sobre la historia de Mercedes. Hemos implementado en los últimos meses una página de compra online en la cuál se podrán ver los productos que hay disponibles online y para resaltar los
                                    coches más visitados de este último año 2019</p>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="row mt-3">
                    <div class="col-md-6 pt-2">
                        <div class="embed-responsive embed-responsive-4by3">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/T5pw0vLpJgw" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mt-3">
                            <div class="col-6">
                                <figure class="figure">
                                    <img src="img/p5.jpg" class="img-fluid rounded">
                                    <figcaption class="figure-caption text-center text-danger">MODELO CLASE A</figcaption>
                                </figure>
                            </div>
                            <div class="col">
                                <figure class="figure">
                                    <img src="img/p4.jpg" class="img-fluid rounded">
                                    <figcaption class="figure-caption text-center text-danger">MODELO GLE</figcaption>
                                </figure>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <figure class="figure">
                                    <img src="img/2.jpg" class="img-fluid rounded">
                                    <figcaption class="figure-caption text-center text-danger">MODELO CLA</figcaption>
                                </figure>
                            </div>
                            <div class="col">
                                <figure class="figure">
                                    <img src="img/3.jpg" class="img-fluid rounded">
                                    <figcaption class="figure-caption text-center text-danger">MODELO VITO</figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

                <p class=" bg-dark text-white text-center display-4"><strong>Coches más vistos</strong></p>

                <div class="row text-center">
                    <div class="col">
                        <div class=" row justify-content-around bg-light rounded p-3 m-3 ">
                            <div class="col-lg-3  col-sm-6 col-xs-12 position-relative ">
                                <img src="img/blackseries.jpg " class="img-fluid rounded " style="width: 85%;">
                                <h4><i>C-63 COUPE AMG BLACK SERIES</i></h4>
                                <p class="text-center ">Disponible solo en el estilo de carrocería Coupé, la serie C 63 AMG Black incluye una versión modificada del motor C 63 AMG M156 V8 que ahora genera una potencia máxima de 517 PS (380 kW; 510 CV) a 6,800 rpm y 620 N⋅m (457
                                    lb ⋅ft) de torque a 5,000 rpm. Las cifras de rendimiento incluyen un tiempo de aceleración de 0-100 km / h (62 mph) de 4.2 segundos y una velocidad máxima de 300 km / h (186 mph). </p>
                                <audio controls="controls">
                                        <source src="audio/1.mp3" type="audio/mpeg" />
                                        Your browser does not support the audio element.
                                     </audio>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-xs-12 position-relative ">
                                <img src="img/gt.jpg " class="img-fluid rounded ">
                                <h4><i>MERCEDES BENZ AMG GT R</i></h4>
                                <p class="text-center ">El Mercedes Benz AMG GT R es la versión más extrema y potente del AMG GT para calle. Tiene un motor de 4.0 L con 585 CV (430 kilovatios) a 6250 RPM , una velocidad máxima de 318 km/h (198 millas por hora) acelerando de
                                    0 a 100 km/h (62 millas por hora) en 3,5 segundos. Cuando se lanzó , el AMG GT R tuvo varias modificaciones exteriores, como un pequeño cambio en la parrilla, un alerón trasero fijo entre otros.</p>
                                <audio controls="controls">
                                        <source src="audio/2.mp3" type="audio/mpeg" />
                                        Your browser does not support the audio element.
                                </audio>
                            </div>
                            <div class="col-lg-3  col-sm-6 col-xs-12 position-relative ">
                                <img src="img/g63.jpg " class="img-fluid rounded " style="width: 79%;">
                                <h4><i>G-63 AMG V8</i></h4>
                                <p class="text-center ">El V8 sobrealimentado de 5.4 litros fue reemplazado por el nuevo V8 biturbo de 5.5 litros para 2012 para un mejor consumo de combustible y menos emisiones. AMG hizo algunos cambios más en el exterior para darle a G 63 AMG
                                    una apariencia más "pelea": aleta horizontal única con bordes de cromo gemelos en el centro de la parrilla del radiador con un adorno de estrella de tres puntos más prominente en el medio</p>
                                <audio controls="controls">
                                        <source src="audio/3.mp3" type="audio/mpeg" />
                                        Your browser does not support the audio element.
                                     </audio>
                            </div>
                            <div class="col-lg-3  col-sm-6 col-xs-12 position-relative ">
                                <img src="img/a.jpg " class="img-fluid rounded" alt=" ">
                                <h4><i>CLASE A</i></h4>
                                <p class="text-center ">La tercera generación (W176) fue presentada como prototipo en el Salón del Automóvil de Shanghái de 2011 y en su versión final en el Salón del Automóvil de Ginebra de 2012. En la tercera generación el Clase A pasó a ser
                                    un hatchback del segmento C y dejó de ser un monovolumen del segmento B.2​ El modelo se ofrece también en versión sedán de cuatro puertas, llamada Clase CLA.</p>
                                <audio controls="controls">
                                        <source src="audio/4.mp3" type="audio/mpeg" />
                                        Your browser does not support the audio element.
                                     </audio>
                            </div>
                        </div>
                    </div>
                </div>
    <br>
 
    <div class="row">

    <?php
    // Hace una consulta preparada para que devuelva todos los productos de la BD y lo convierte en un array que luego imprimiremos para mostrar el contenido.
        $sentencia=$pdo->prepare("SELECT * FROM tblproductos");
        $sentencia->execute();
        $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    ?>

<?php foreach($listaProductos as $producto){ ?>
            <div class="col-lg-3  col-sm-6 col-xs-12 position-relative">
                <div class="card">
                    <img class="card-img-top" title="<?php echo $producto['Nombre']  ?>" src="<?php echo $producto['Imagen']  ?>" alt="<?php echo $producto['Nombre']  ?>" data-toggle="popover"  data-trigger="hover" data-content="<?php echo $producto['Descripcion']  ?>" alt="<?php echo $producto['Nombre']  ?>" height="317px" >
                    <div class="card-body">
                        <span><?php  echo $producto['Nombre']  ?></span>
                        <h5 class="card-title"><?php echo number_format($producto['Precio'],2)  ?>€</h5>
                        <p class="card-text"><?php echo $producto['Descripcion']  ?></p>   

                        <form action="" method="post">
    <!--Encripta los valores de los productos y los manda a carrito.php mediante la accion Agregar-->
                        <input type="hidden" name="id" id="id" value="<?php  echo openssl_encrypt(  $producto['ID'], COD, KEY);  ?>">
                        <input type="hidden" name="nombre" id="nombre" value="<?php  echo openssl_encrypt(  $producto['Nombre'], COD, KEY);  ?>">
                        <input type="hidden" name="precio" id="precio" value="<?php  echo openssl_encrypt(  $producto['Precio'], COD, KEY);  ?>">
                        <input type="hidden" name="cantidad" id="cantidad" value="<?php  echo openssl_encrypt(  1, COD, KEY);  ?>">
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                        </form>

                    </div>
                </div>
            </div>
<?php } ?>     

    </div>
</div>


<?php
include 'templates/pie.php';
?>
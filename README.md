# Tienda
Tienda online con PHP, MySQLY BOOTSTRAP.

Se ha avanzado con lo siguiente.
Se han creado perfiles de usuario y de administrador, seguidamente se ha creado el usuario admin el cual deberá iniciar sesión como el resto, pero será reedirigido a su propia página por la cual podra agregar, borrar, modificar y listar los productos de la base de datos. Ha dado bastantes problemas pero se han podido solventar de la mejor manera posible. Se ha utilizado programación orientada a objetos en las opciones del administrador ya que resultaba más rápido.
Se ha configurado que no puedan existir dos usuarios con el mismo correo para evitar confusiones.

Se han estructurado los directorios de la manera más ordenada posible. 
admin-> dentro están los ficheros a los que solo tiene acceso el administrador y por los cuales se van a poder agregar, borrar, listar y modificar los productos de nuestra base de datos.
audio-> es meramente visual y auditivo. Contiene pruebas de sonido de algunos de nuestros productos.
css-> son las fuentes que se han utilizado.
estilo-> está el estilo de la página web.
font-> es una ampliación de las fuentes.
global-> aquí están los archivos de configuración globales para toda la página.
img-> visual. Contiene las imágenes de la página web.
templates-> contiene las plantillas que se han utlizado para cada archivo según sea usuario invitado, comprador o administrador.
validaciones-> este directorio contiene las comprobaciones que hace el código para saber si está o no registrado, que tipo de usuario es, etc.
Los ficheros:
admin.php-> es el index de nuestro usuario administrador.
cierre.php-> cierra la sesión de los usuarios.
index.php-> es el index de los usuarios invitados, que no tienen acceso a comprar los productos de la web.
index2.php-> contiene el index de los usuarios compradores, que si tienen acceso a lo anterior.
login.php-> es el inicio de sesión de los usuarios.
mostrarCarrito.php-> muestra el carro con los productos seleccionados para los usuarios invitados.
mostrarCarrito2.php-> lo mismo pero para los usuarios compradores.
pagar.php-> Contiene la factura de lo que hemos comprado y próximamente se añadirá el uso de PayPal o tarjeta de crédito. Y se implementará la descarga de dicha factura usando una librería llamada FPDF.
registro.php-> Contiene el registro de los usuarios en la base de datos.

Los últimos cambios que se han introducido ha sido es uso de la libreía FPDF que contiene la factura con el nombre el precio y el total de los productos comprados por el usuario.
También se ha implementado un botón de pago con paypal.
Y algunos cambios a nivel visual.

En resumen la tienda tiene lo siguiente.
A un nivel de vista hacia el usuario, la página está realizada con diseño sencillo y personalizado utilizando Bootstrap 4 y varios de sus componentes. Tendrá varias cards o tarjetas las cuales contendrán los productos de la base de datos y un botón para agregar al carro. En las cabeceras contendrán un nav con un enlace hacia el inicio de la página y otro enlaze como un icono hacia el carrito de la compra.
Una vez en la página del carrito contendrá una tabla la cual tendrá los productos seleccionados anteriormente el precio y su total, también contendrá a la derecha un botón para elimiar los productos del carrito y un botón para proceder a pagar con un correo de contacto en caso de emergencia. La página de pagar contendrá un jumbotron con el total de la compra, un botón para pagar con PayPal y otro para ver y descargar la factura. Las páginas de registro y de inicio de sesión tendrán formularios simples para que al usuario no le cueste registrase e iniciar sesión.

En un modelo más de controlador tendremos lo siguiente:
Tiene tres tipos de usuarios:
El invitado que es con el que el usuario sin haber iniciado sesión entra a la página y puede ver los productos de la base de datos y agregarlos al carrito el cual tiene la opción de pagar pero no está habilitada a menos que incise sesión.
EL comprador que es el que tiene los mismos privilegios que el anterior, pero con la opción de poder pagar los productos, lo que conlleva acceso a la página de pago con la opción de PayPal y poder ver la factura. Esto está hecho de la siguiente manera; cuando me inicia sesión se comprueba que el usuario existe y que no es administrador, una vez comprobado creo la sesión del usuario y en caso de ser el administrador me crea otra para el admin.
Claramente los usuarios al registrarse no pueden poner la opción de registrarse como administrador, ya que el propio administrador de la BD es el encargado de realizar este proceso o de borrar un usuario, producto, etc.

Se crea una sesión para el carro para que se pueda guardar la información del carro durante un tiempo determinado y seguidamente se hace un bucle para poder mostrar esos productos del carro teniendo en cuenta que los productos tienen que guardarse como un array.
Para mostrar un producto antes hay que darle a agregar al carrito un producto. Una vez se le pulsa el botón, se evalua la condición con un switch. Si es caso es agregar los productos encriptados se desencriptan y se guardan en una variable. 
Aquí se evalua si la sesion carrito existe y si no la crea. También se ponen los productos en un array para mostrarlos en la página. Por supuesto se evalua que si un producto está en la base de datos no se puede volver a añadir.
Una vez mostrados en la página para mostrar el carrito hay un botón para elimiar los productos. Esto se evalua en otra parte del código, se recorren los productos con un bucle y se selecciona el id del producto y con unset se puede borrar el producto.

El usuario administrador que tiene acceso a un menú para poder ver, modificar, añadir y listar los productos de la base de datos. Esto para que sea mas entendible en el código esta realizado con un CRUD(Create, Read, Update, Delete) el cual consiste en una serie de funciones que hacen que realizar este proceso se más efectivo y fácil a nivel de utilizar programación orientada a objetos.

Un usuario al darle al botón de pagar se evalua si la sesión está iniciada, en el caso de no estar incidada te mandará al login y si está iniciada te llevará a la página de pagar a la que sólo tienen acceso los usuarios registrados en la base de datos y han iniciado sesión. Lo que hace esta página es meter en la base de datos los datos de la venta de los productos con sentencias preparadas y conexión a la base de datos con pdo.
Contiene además un botón de PayPal el cual te lleva a la página de PayPal para validar la venta y un botón para realizar una factura implementando la librería fpdf, que lo único que hace es recuperar lo que tiene la sesión del usuario con su total.

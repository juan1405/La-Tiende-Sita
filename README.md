# La-Tiende-Sita
Tienda online con php MySQL

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

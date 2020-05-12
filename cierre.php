<!--Recupera la sesión del usuario o administrador y la cierra-->
<?php

session_start();
session_destroy();
header("location:index.php");

?>
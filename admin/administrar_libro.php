<?php
//incluye la clase Libro y CrudLibro
require_once('crud_libro.php');
require_once('libro.php');
 
$crud= new CrudLibro();
$libro= new Libro();
 
	// si el elemento insertar no viene nulo llama al crud e inserta un libro
	if (isset($_POST['insertar'])) {
		if (isset($_POST["nombre"])) {
			$nombre = $_POST["nombre"];
			if (preg_match("/[a-zA-Z]/", $nombre)) {
				if (isset($_POST["descripcion"])) {
					$descripcion = $_POST["descripcion"];
					if (preg_match("/[a-zA-Z1-9]/", $descripcion)) {
							$libro->setNombre($_POST['nombre']);
							$libro->setDescripcion($_POST['descripcion']);
							$libro->setPrecio($_POST['precio']);
							$libro->setImagen($_POST['imagen']);
							$crud->insertar($libro);
							header('Location: paginsertar.php');
					}else {
						print "Introduce un autor válido";
					}

				}
			}else {
				print "Introduce un nombre válido";
			}
		}
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el libro
	}elseif(isset($_POST['actualizar'])){
		$libro->setId($_POST['ID']);
		$libro->setNombre($_POST['nombre']);
		$libro->setDescripcion($_POST['descripcion']);
		$libro->setPrecio($_POST['precio']);
		$libro->setImagen($_POST['imagen']);
		$crud->actualizar($libro);
		header('Location: pagupdate.php');
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un libro
	}elseif ($_GET['accion']=='e') {
		$crud->eliminar($_GET['ID']);
		header('Location: pagborrar.php');	
	// si la variable accion enviada por GET es == 'a', envía a la página actualizar.php 
	}elseif($_GET['accion']=='a'){
		header('Location: update.php');
	}
?>

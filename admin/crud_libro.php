<!--Esta parte contiene las funciones del CRUD -->

<?php
// incluye la clase Db
require_once('conexion.php');

	class CrudLibro{
		// constructor de la clase
		public function __construct(){}

		// método para insertar un producto, recibe como parámetro un objeto de tipo libro
		public function insertar($libro){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO tblproductos (Nombre, Descripcion, Precio, Imagen) values( :nombre, :descripcion, :precio, :imagen)');
			$insert->bindValue('nombre',$libro->getNombre());
			$insert->bindValue('descripcion',$libro->getDescripcion());
			$insert->bindValue('precio',$libro->getPrecio());
			$insert->bindValue('imagen',$libro->getImagen());
			$insert->execute();

		}

		// método para mostrar todos los productos
		public function mostrar(){
			$db=Db::conectar();
			$listaLibros=[];
			$select=$db->query('SELECT * FROM tblproductos');
			

			foreach($select->fetchAll() as $libro){
				$myLibro= new Libro();
				$myLibro->setId($libro['ID']);
				$myLibro->setNombre($libro['Nombre']);
				$myLibro->setDescripcion($libro['Descripcion']);
				$myLibro->setPrecio($libro['Precio']);
				$myLibro->setImagen($libro['Imagen']);
				$listaLibros[]=$myLibro;
			}
			return $listaLibros;
		}

		// método para eliminar un libro, recibe como parámetro el id del producto
		public function eliminar($ID){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM tblproductos WHERE ID=:id');
			$eliminar->bindValue('id',$ID);
			$eliminar->execute();
		}


		public function obtenerLibro2($ID){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM tblproductos WHERE ID=:id');
			$select->bindValue('id',$ID);
			$select->execute();
			$libro=$select->fetch();
			$myLibro= new Libro();
			$myLibro->setId($libro['ID']);
			$myLibro->setNombre($libro['Nombre']);
			$myLibro->setDescripcion($libro['Descripcion']);
			$myLibro->setPrecio($libro['Precio']);
			$myLibro->setImagen($libro['Imagen']);
			return $myLibro;
		}

		// método para actualizar un producto, recibe como parámetro el libro
		public function actualizar($libro){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE tblproductos SET Nombre=:nombre, Descripcion=:descripcion, Precio=:precio, Imagen=:imagen WHERE ID=:id');
			$actualizar->bindValue('id',$libro->getId());
			$actualizar->bindValue('nombre',$libro->getNombre());
			$actualizar->bindValue('descripcion',$libro->getDescripcion());
			$actualizar->bindValue('precio',$libro->getPrecio());
			$actualizar->bindValue('imagen',$libro->getImagen());
			$actualizar->execute();
		}
				
	}
?>
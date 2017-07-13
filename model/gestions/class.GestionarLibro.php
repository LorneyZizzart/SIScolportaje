<?php

	class GestionarLibro
	{
		private $Conexion;

		function __construct()
		{
			$this->Conexion =  new Conexion();
		}

		public function ListarLibro()
		{
			//Para obtener todos los datos de los Libros
			$consulta= $this->Conexion->prepare('SELECT *
																																		FROM libro
																																		ORDER BY titulo');

			$consulta->execute();
			$listaLibro= $consulta->fetchAll();
			///////THE END

			$listaArray = array();
			$i = 0;

			foreach ($listaLibro as $value) {
				$libro = new Libro();
				$libro->setIdLibro($value['idLibro']);
				$libro->setTitulo($value['titulo']);
				$libro->setResumen($value['resumen']);
				$libro->setPrecioOficial($value['precioOficial']);
				$libro->setPrecioVenta($value['precioVenta']);

				$listaArray[$i] = $libro;
				$i++;
			}
			return $listaArray;
		}
	}
 ?>

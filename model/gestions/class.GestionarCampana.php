<?php

	class GestionarCampana
	{
		private $Conexion;

		function __construct()
		{
			$this->Conexion =  new Conexion();
		}

		public function GuardarCampana($mision, $persona, $campana)
		{
			/*1*/$idCampana= null;
			/*2*/$idMision = $mision->getIdMision();
			/*3*/$idTipoCampana=  $campana->getIdTipoCampana();
			/*4*/$idPersona = $persona->getIdPersona();
			/*5*/$nombre =  $campana->getNombreCampana();
			/*6*/$fechaInicio = $campana->getFechaInicio();
			/*7*/$fechaFinal = $campana->getFechaFinal();
			/*8*/$gestion =  $campana->getGestion();
			/*9*/$estado  = $campana->getEstado();

			try {
				$insertCampana = 'INSERT INTO campana (idCampana,
																																	idMision,
																																	idTipoCampana,
																																	idPersona,
																																	nombre,
																																	fechaInicio,
																																	fechaFinal,
																																	gestion,
																																	estado)
												VALUES (:idCampana,
																			 :idMision,
																			 :idTipoCampana,
																			 :idPersona,
																			 :nombre,
																			 :fechaInicio,
																			 :fechaFinal,
																			 :gestion,
																			 :estado)';

			$atribCampana = $this->Conexion->prepare($insertCampana);

			$atribCampana->bindParam(':idCampana', $idCampana);
			$atribCampana->bindParam(':idMision', $idMision);
			$atribCampana->bindParam(':idTipoCampana', $idTipoCampana);
			$atribCampana->bindParam(':idPersona', $idPersona);
			$atribCampana->bindParam(':nombre', $nombre);
			$atribCampana->bindParam(':fechaInicio', $fechaInicio);
			$atribCampana->bindParam(':fechaFinal', $fechaFinal);
			$atribCampana->bindParam(':gestion', $gestion);
			$atribCampana->bindParam(':estado', $estado);

			$atribCampana->execute();

			return TRUE;

			} catch (PDOException $e)
			{
				echo 'ERROR: No se logro realizar la insercion de Campana - '.$e->getMesage();
				exit();
				return FALSE;
			}
		}

		public function BuscarCampana($nombreCampana)
		{
			$consulta = $this->Conexion->prepare('SELECT nombre FROM campana WHERE nombre = :nombre');
			$consulta->bindParam(':nombre', $nombreCampana);
			$consulta->execute();
			$registro = $consulta->fetchAll();

			if ($registro) {
				foreach ($registro as $datos) {
					if ($datos['nombre'] == $nombreCampana) {
						return $existe = TRUE;
					}else {
						return $existe = FALSE;
					}
				}
			}else {
				return $existe = FALSE;
			}
		}

		public function ListarCampana()
		{
			$consulta= $this->Conexion->prepare('SELECT idCampana, idMision, idTipoCampana, idPersona, nombre, fechaInicio, fechaFinal, gestion, estado
																																	 FROM campana
																																	 ORDER BY nombre');

			$consulta->execute();
			$listaCampana = $consulta->fetchAll();

			$listaArray = array();
			$i = 0;

			foreach ($listaCampana as $value) {
				$campana = new Campana();
				$campana->setIdCampana($value['idCampana']);
				$campana->setNombreCampana($value['nombre']);
				$campana->setFechaInicio($value['fechaInicio']);
				$campana->setFechaFinal($value['fechaFinal']);
				$campana->setGestion($value['gestion']);
				$campana->setEstado($value['estado']);

				$listaArray[$i] = $campana;
				$i++;
			}
			return $listaArray;
		}

		public function AsignarLibroCampana($campana, $libro)
		{
			/*1*/$idLibroCampana= null;
			/*2*/$idLibro = $libro->getIdLibro();
			/*3*/$idCampana=  $campana->getIdCampana();
			/*4*/$cantidad = $libro->getCantidad();
			/*5*/$fecha=  $libro->getFechaAsignacion();
			try {
				$insertAsignacion = 'INSERT INTO libroCampana (idLibroCampana,
																																	idLibro,
																																	idCampana,
																																	cantidad,
																																	fecha)
												VALUES (:idLibroCampana,
																			 :idLibro,
																			 :idCampana,
																			 :cantidad,
																			 :fecha)';

				$atribAsignacion = $this->Conexion->prepare($insertAsignacion);

				$atribAsignacion->bindParam(':idLibroCampana', $idLibroCampana);
				$atribAsignacion->bindParam(':idLibro', $idLibro);
				$atribAsignacion->bindParam(':idCampana', $idCampana);
				$atribAsignacion->bindParam(':cantidad', $cantidad);
				$atribAsignacion->bindParam(':fecha', $fecha);

				$atribAsignacion->execute();

				return TRUE;

			} catch (PDOException $e) {
				echo 'ERROR: No se logro realizar la insercion de Campana - '.$e->getMesage();
				exit();
				return FALSE;
			}


		}
	}
 ?>

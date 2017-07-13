<?php

	class GestionarUsuario
	{
		private $Conexion;

		function __construct()
		{
			$this->Conexion =  new Conexion();
		}

		public function ObtenerUsuario($usuario)
		{
			$cmd = $this->Conexion->prepare('SELECT u.idUsuario, r.idRol,  r.nombrerol, u.usuario, u.contrasena, u.estado, p.primerNombre, p.segundoNombre, p.primerApellido, p.segundoApellido, p.celular
																								FROM usuario u , rolusuario r, persona p
																							  WHERE u.idRol = r.idRol
																								AND u.idPersona = p.idPersona
																								AND u.usuario = :usuario');
			$cmd->bindParam(':usuario', $usuario);
			$cmd->execute();
			$registro = $cmd->fetch();
			return $registro;
		}

		//FALTA COMPLEMENTAR ESTA FUNCION  ERROR RARO AL REGISTRAR[05-06-2017 13:37]
		public function GuardarUsuario($usuario)
		{
			/*1*/$idUser = null;
			/*2*/$idRol = $usuario->getIdRol();
			/*3*/$idPersona =$usuario->getIdPersona();
			/*4*/$user = $usuario->getUser();
			/*5*/$password = $usuario->getPassword();
			/*6*/$estado =$usuario->getEstado();

			try {
				$insertUser = 'INSERT INTO usuario (idUsuario, idRol, idPersona, usuario, contrasena, estado)
																 									 VALUES (?, ?, ?, ?, ?, ?)';

				$atribUser = $this->Conexion->prepare($insertUser);

				$atribUser->bindParam(1, $idUser);
				$atribUser->bindParam(2, $idRol);
				$atribUser->bindParam(3, $idPersona);
				$atribUser->bindParam(4, $user);
				$atribUser->bindParam(5, $password);
				$atribUser->bindParam(6, $estado);

				$atribUser->execute();
				//$filas = $atribUser->rowCount();
				//echo "". $atribUser->execute();
				//echo "". $filas;
				echo "asdasdsdf";
				return TRUE;

			} catch (Exception $e) {
				echo 'ERROR: No se logro registrar al nuevo Usuario Lider- '.$e->getMesage();
				exit();
				return FALSE;
			}

		}

		public function ListarLider()
		{
			//Para obtener todos los datos de los Lideres
			$consultaLideres = $this->Conexion->prepare('SELECT p.idPersona, p.primerNombre, p.segundoNombre, p.primerApellido, p.segundoApellido, p.ci, p.lugarExpedicionCI, p.sexo, p.fechaNac, p.lugarNac, p.pais, p.ciudad, p.gradoAcademico, p.universidad, p.facultad, p.carrera, p.celular
																																		FROM persona p, usuario u
																																		WHERE u.idPersona = p.idPersona
																																		AND u.idRol = 2');

			$consultaLideres->execute();
			$listaLider = $consultaLideres->fetchAll();
			///////THE END

			$listaArray = array();
			$i = 0;

			foreach ($listaLider as $listaL) {
				$lider = new User();
				$lider->setIdPersona($listaL['idPersona']);
				$lider->setPrimerNombre($listaL['primerNombre']);
				$lider->setSegundoNombre($listaL['segundoNombre']);
				$lider->setPrimerApellido($listaL['primerApellido']);
				$lider->setSegundoApellido($listaL['segundoApellido']);
				$lider->setCi($listaL['ci']);
				$lider->setLugarExpedicionCI($listaL['lugarExpedicionCI']);
				$lider->setSexo($listaL['sexo']);
				$lider->setPais($listaL['pais']);
				$lider->setCiudad($listaL['ciudad']);

				$listaArray[$i] = $lider;
				$i++;
			}
			return $listaArray;
		}

		/////GRUPO PERSONA esto sera para los COLPORTORES/////////////////
		public function GuardarAsignacionLider($colportor, $grupo)
		{
			/*1*/$idAsignacion= null;
			/*2*/$idGrupo = $grupo->getIdGrupo();
			/*3*/$idLider =$lider->getIdPersona();

			try {
				$insertGrupoLider = 'INSERT INTO grupoPersona (idGrupoPersona, idGrupo, idPersona)
																 									 VALUES (?, ?, ?)';
				$atribGrupPers= $this->Conexion->prepare($insertGrupoLider);

				$atribGrupPers->bindParam(1, $idAsignacion);
				$atribGrupPers->bindParam(2, $idGrupo);
				$atribGrupPers->bindParam(3, $idLider);

				$atribGrupPers->execute();

				return TRUE;

			} catch (PDOException $e)
			{
				echo 'ERROR: No se logro Asignar al Lider  a un Grupo - '.$e->getMesage();
				exit();
				return FALSE;
			}

		}
	}
 ?>

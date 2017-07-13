<?php
  /**
   *
   */
  class GestionarGrupo
  {
    private $Conexion;

    function __construct()
    {
      $this->Conexion =  new Conexion();
    }
    //////////////GRUPO((((((((((((()))))))))))))
    public function GuardarGrupoVacio($campana, $zona, $lider)
    {
      /*1*/$idGrupo= null;
      /*2*/$idZona= $zona->getIdZona();
      /*3*/$idCampana =$campana->getIdCampana();
      /*4*/$idPersona =$lider->getIdPersona();
      /*5*/$nombre = null;
      /*6*/$direccion = null;
      /*7*/$descripcion = null;

      try {
        $insertGrupo = 'INSERT INTO grupo (idGrupo, idZona, idCampana, idPersona, nombre, direccion, descripcion)
                                                   VALUES (?, ?, ?, ?, ?, ?)';

        $atribGrupo= $this->Conexion->prepare($insertGrupo);

        $atribGrupo->bindParam(1, $idGrupo);
        $atribGrupo->bindParam(2, $idZona);
        $atribGrupo->bindParam(3, $idCampana);
        $atribGrupo->bindParam(4, $idPersona);
        $atribGrupo->bindParam(5, $nombre);
        $atribGrupo->bindParam(6, $direccion);
        $atribGrupo->bindParam(7, $descripcion);

        $atribGrupo->execute();

        return TRUE;

      } catch (PDOException $e)
      {
        echo 'ERROR: No se logro Crear un nuevo Grupo - '.$e->getMesage();
        exit();
        return FALSE;
      }
    }
  }

 ?>

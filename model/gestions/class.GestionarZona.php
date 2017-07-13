<?php
  /**
   *
   */
  class GestionarZona
  {
    private $Conexion;
    function __construct()
    {
      $this->Conexion = new Conexion();
    }

    public function ListarZona()
    {
      $consulta= $this->Conexion->prepare('SELECT *
																																	 FROM zona
																																	 ORDER BY nombre');
      $consulta->execute();
      $listaCampana = $consulta->fetchAll();

      $listaArray = array();
			$i = 0;

      foreach ($listaCampana as $key => $value) {
        $zona = new Zona();
        $zona->setIdZona($value['idZona']);
        $zona->setNombre($value['nombre']);
        $zona->setNroVivienda($value['nroViviendas']);
        $zona->setCroquis($value['croquis']);

        $listaArray[$i] = $zona;
        $i++;
      }

      return $listaArray;

    }
  }

 ?>

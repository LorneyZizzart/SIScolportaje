<?php
/**
 * En esta clase asignamos a los lideres colportores
 */
class GrupoPersona
{
  public $IdGrupoPersona;

  function __construct()
  {
  }

  public function setIdGrupoPersona($id){$this->IdGrupoPersona = $id;}
  public function getIdGrupoPersona(){return $this->IdGrupoPersona;}
}
/**
 *
 */
class Grupo extends GrupoPersona
{
  public $IdGrupo;
  public $Nombre;
  public $Direccion;
  public $AsignacionLibro;
  public $Descripcion;

  function __construct()
  {
  }
  public function setIdGrupo($idGrupo){$this->IdGrupo = $idGrupo;}
  public function setNombre($nombre){$this->Nombre =  $nombre;}
  public function setDireccion($direccion){$this->Direccion =  $direccion;}
  public function setAsignacionLibro($asigLibro){$this->AsignacionLibro =  $asigLibro;}
  public function setDescripcion($descripcion){$this->Descripcion = $descripcion;}

  public function getIdGrupo(){return $this->IdGrupo;}
  public function getNombre(){return $this->Nombre;}
  public function getDireccion(){return $this->Direccion;}
  public function getAsignacionLibro(){return $this->AsignacionLibro;}
  public function getDescripcion(){return $this->Descripcion;}
}

 ?>

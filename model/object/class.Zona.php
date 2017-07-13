<?php
/**
 *
 */
class Zona
{

  public $IdZona;
  public $Nombre;
  public $NroVivienda;
  public $Croquis;

  function __construct()
  {
  }

  public function setIdZona($idZona){$this->IdZona = $idZona;}
  public function setNombre($nombre){$this->Nombre = $nombre;}
  public function setNroVivienda($nroZona){$this->NroZona = $nroZona;}
  public function setCroquis($croquis){$this->Croquis = $croquis;}

  public function getIdZona(){return $this->IdZona;}
  public function getNombre(){return $this->Nombre;}
  public function getNroVivienda(){return $this->NroVivienda;}
  public function getCroquis(){return $this->Croquis;}
}

 ?>

<?php

/**
 * ASIGNAR LIBRO A LA CAMPAÑA
 */
class AsignacionLibro
{

  public $IdAsignacionLibro;
  public $Cantidad;
  public $FechaAsignacion;

  function __construct()
  {
  }

  public function setIdAsignacionLibro($idAsignacion){$this->IdAsignacionLibro = $idAsignacion;}
  public function setCantidad($cantidad){$this->Cantidad = $cantidad;}
  public function setFechaAsignacion($fecha){$this->FechaAsignacion = $fecha;}

  public function getIdAsignacionLibro(){return $this->IdAsignacionLibro;}
  public function getCantidad(){return $this->Cantidad;}
  public function getFechaAsignacion(){return $this->FechaAsignacion;}
}
/**
 *CATEGORIAS DE LOS LIBROS
 */
 class Categoria extends AsignacionLibro
 {

   public $IdCategoria;
   public $NombreCategoria;

   function __construct()
   {
   }

   public function setIdCategoria($idCategoria){$this->IdCategoria = $idCategoria;}
   public function setNombreCategoria($nombre){$this->NombreCategoria = $nombre;}

   public function getIdCategoria(){return $this->IdCategoria;}
   public function getNombreCategoria(){return $this->NombreCategoria;}
 }

class Libro extends Categoria
{

  public $IdLibro;
  public $Titulo;
  public $Resumen;
  public  $PrecioOficial;
  public $PrecioVenta;
  public $Imagen;

  function __construct()
  {
  }

  public function setIdLibro($idLibro){$this->IdLibro = $idLibro;}
  public function setTitulo($titulo){$this->Titulo = $titulo;}
  public function setResumen($resumen){$this->Resumen = $resumen;}
  public function setPrecioOficial($precioOficial){$this->PrecioOficial = $precioOficial;}
  public function setPrecioVenta($precioVenta){$this->PrecioVenta = $precioVenta;}
  public function setImagen($imagen){$this->Imagen = $imagen;}

  public function getIdLibro(){return $this->IdLibro;}
  public function getTitulo(){return $this->Titulo;}
  public function getResumen(){return $this->Resumen;}
  public function getPrecioOficial(){return $this->PrecioOficial;}
  public function getPrecioVenta(){return $this->PrecioVenta;}
  public function getImagen(){return $this->Imagen;}

}
 ?>

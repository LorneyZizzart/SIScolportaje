<?php
/**
 *
 */
class Manejador
{
  private $Modo;
  function __construct($modo)
  {
    $this->Modo = $modo;
  }
//PARA CONTROLAR EL LOGIN
  public function MenuIndex()
  {
    switch ($this->Modo) {
    case 'CamposLlenos':

      include 'model/conexion/class.session.php';
      include 'model/object/class.Persona.php';
      include 'model/object/class.User.php';
      include 'model/gestions/class.GestionarUsuario.php';
      include 'model/conexion/class.conexion.php';
      include 'ctrl.ManejadorLogin.php';
      include 'ctrl.MenuUsuario.php';

      $usuario  = new User();
      $usuario->setUser($_POST['user']);
      $usuario->setPassword($_POST['password']);
      $manejadorLogin =  new ManejadorLogin();
      $manejadorLogin->Autentificacion($usuario);
    break;
    case 'ErrorPassword':
        include 'view/headerLogin.html';
          ?>
          <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡ERROR!</strong> <p>Error en la contraseña</p>
          </div>
          <?php
          include 'view/bodyLogin.html';
          include 'view/footerLogin.html';
    break;
    case 'AccesoDenegado':
        include 'view/headerLogin.html';
        ?>
        <p class="login-box-msg">Inicia tu sesión</p>
        <div class="alert alert-warning alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>¡ERROR!</strong> <p>Acceso Denegado</p>
        </div>
        <?php
        include 'view/bodyLogin.html';
        include 'view/footerLogin.html';
    break;
    case 'UsuarioInexistente':
        include 'view/headerLogin.html';
        ?>
        <div class="alert alert-warning alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡ERROR!</strong> <p>Usuario Inexistente</p>
        </div>
        <?php
        include 'view/bodyLogin.html';
        include 'view/footerLogin.html';
    break;
    default:
        include 'view/headerLogin.html';
        include 'view/bodyLogin.html';
        include 'view/footerLogin.html';
    break;
    }
  }
//PARA INISIAR SESSION DE CADA USUARIO
  public function MenuUsuario()
  {
    switch ($this->Modo) {
    case 'COORDINADOR':
      //echo "Hola COORDINADOR";
     include '../view/headerCoordinador.php';
     include '../view/bodyCoordinador.html';
     include '../view/footerCoordinador.html';
    break;
    case 'LIDER':
      include '../view/headerLider.php';
      include '../view/bodyLider.html';
      include '../view/footerLider.html';
      break;
    case 'COLPORTOR':
          include '../view/headerColportor.php';
          include '../view/bodyColportor.html';
          include '../view/footerColportor.html';
    break;
    case 'CerrarSession':
      session_start();
      session_destroy();
      header("Location: ../index.php");
    break;
    default:
      include '../view/headerLogin.html';
      include '../view/bodyLogin.html';
      include '../view/footerLogin.html';
    break;
    }
  }

  public function ConvertUser($primerNombre, $primerApellido)
  {
    $indiceOne = strtoupper($primerNombre);
    $indiceTwo = $indiceOne[0];
    $cuerpo = strtolower($primerApellido);
    $usuario = $indiceTwo . $cuerpo;
    return $usuario;
  }

  public function MenuCoordinador()
  {
    switch ($this->Modo) {

              /*CRUD DE LIDER*/
    case 'ViewRegistrarLider':
        include '../view/headerCoordinador.php';
        include '../view/bodyRegistroLider.php';
        include '../view/footerCoordinador.html';
    break;
    case 'InsertLider':

        require('../model/object/class.Persona.php');
        require('../model/object/class.User.php');
        require('../model/gestions/class.GestionarPersona.php');
        require('../model/gestions/class.GestionarUsuario.php');
        require_once('../model/conexion/class.conexion.php');

        $persona = new User();
        $gestionarPersona =  new GestionarPersona();
        $gestionarUsuario = new GestionarUsuario();

        //BUSCAMOS CI
        $existeCI = $gestionarPersona->BuscarCI($_POST['ci']);
        if ($existeCI == TRUE) {
          header('Location: menuCoordinador.php?modo=ciExistenteLider');
        }else {

          //REGISTRO DE PERSONA
                 $persona-> setPrimerNombre($_POST['primerNombre']);
                 $persona-> setSegundoNombre($_POST['segundoNombre']);
                 $persona-> setPrimerApellido($_POST['primerApellido']);
                 $persona-> setSegundoApellido($_POST['segundoApellido']);
                 $persona-> setCi($_POST['ci']);
                 $persona-> setSexo($_POST['sexo']);
                 $persona-> setLugarExpedicionCI($_POST['expedicionCI']);
                 $persona-> setFechaNacimiento($_POST['fechaNacimiento']);
                 $persona-> setLugarNacimiento($_POST['lugarNacimiento']);
                 $persona-> setPais($_POST['pais']);
                 $persona-> setCiudad($_POST['ciudad']);
                 $persona-> setGradoAcademico($_POST['gradoAcademico']);
                 $persona-> setUniversidad($_POST['universidad']);
                 $persona-> setFacultad($_POST['facultad']);
                 $persona-> setCarrera($_POST['carrera']);
                 $persona-> setCelular($_POST['celular']);

                 $verificarRegistro = $gestionarPersona->GuardarPersona($persona);
                 //$verificarRegistro = TRUE;

                 if ($verificarRegistro) {

                   //OBTENER DEL ULTIMO INSERT EL "ID"
                   $ultimoId = $gestionarPersona->ObtenerUltimoId();
                  //echo $ultimoId['id'];

                  //CONVERTIR NOMBRE Y APELLIDO PARA EL name User
                  $user = $this->ConvertUser($_POST['primerNombre'], $_POST['primerApellido']);
                  //echo "". $user;

                   //REGISTRO USER
                    $persona->setIdRol(2);
                    $persona->setIdPersona($ultimoId['id']);
                    $persona->setUser($user);
                    $persona->setPassword($_POST['ci']);
                    $persona->setEstado($_POST['estado']);

                   $verificarUser = $gestionarUsuario->GuardarUsuario($persona);
                   if ($verificarUser == TRUE) {
                     header('Location: menuCoordinador.php?modo=RegistroLiderExitoso');
                   }else {
                   header('Location: menuCoordinador.php?modo=RegistroLiderError');
                 }
        }
      }
    break;
    case 'RegistroLiderExitoso':
      include '../view/headerCoordinador.php';
      ?>
        <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><i class="fa fa-check-circle"></i>¡Felicidadades!</strong> <p>El registro se realizo exitosamente</p>
        </div>
      <?php
      include '../view/bodyRegistroLider.php';
      include '../view/footerCoordinador.html';
    break;
    case 'RegistroLiderError':
       include '../view/headerCoordinador.php';
       ?>
         <div class="alert alert-warning alert-dismissable">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>¡ERROR!</strong> <p>Error al registrar al Lider</p>
         </div>
        <?php
       include '../view/bodyRegistroLider.php';
       include '../view/footerCoordinador.html';
    break;
    case 'ciExistenteLider':
      include '../view/headerCoordinador.php';
      ?>
        <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡ERROR!</strong> <p>Se encontro una persona con la  misma Cedula de Identidad registrada</p>
        </div>
      <?php
      include '../view/bodyRegistroLider.php';
      include '../view/footerCoordinador.html';
    break;
    case 'VerLider':
      include '../view/headerCoordinador.php';
      require ('../model/conexion/class.conexion.php');
      require ('../model/object/class.Persona.php');
      require ('../model/object/class.User.php');
      require ('../model/gestions/class.GestionarUsuario.php');
      include '../view/bodyListarLiderDetalles.php';
      //include '../view/bodyListarLider.php';
      include '../view/footerCoordinador.html';
    break;
    case 'AsignarZonaLider':
      include '../view/headerCoordinador.php';
      require ('../model/conexion/class.conexion.php');
      require ('../model/object/class.Persona.php');
      require ('../model/object/class.User.php');
      require ('../model/object/class.Zona.php');
      include '../model/object/class.Campana.php';
      include '../model/gestions/class.GestionarCampana.php';
      require ('../model/gestions/class.GestionarUsuario.php');
      require ('../model/gestions/class.GestionarZona.php');
      include '../view/bodyAsignarZonaLider.php';
      include '../view/footerCoordinador.html';
    break;
    case 'InsertLiderZona':
      require ('../model/conexion/class.conexion.php');
      require ('../model/object/class.Persona.php');
      require ('../model/object/class.Campana.php');
      require ('../model/object/class.User.php');
      require ('../model/object/class.Zona.php');
      require ('../model/gestions/class.GestionarGrupo.php');

      $zona =  new Zona();
      $lider = new User();
      $campana = new Campana();
      $gestionarGrupo =  new GestionarGrupo();

      ///PRIMERO CREAMOS EL GRUPO VACIO

      $campana->setIdCampana($_POST['campana']);
      $zona->setIdZona($_POST['zona']);
      $lider->setIdPersona($_POST['lider']);

      $verificacionInsert = $gestionarGrupo->GuardarGrupoVacio($campana, $zona, $lider);
      if ($verificacionInsert == TRUE) {
        header('Location: menuCoordinador.php?modo=AsignacionLiderZonaExitosa');
      }else {
      header('Location: menuCoordinador.php?modo=AsignacionLiderZonaError');
    }
    break;
    case 'AsignacionLiderZonaExitosa':
      include '../view/headerCoordinador.php';
      require ('../model/conexion/class.conexion.php');
      require ('../model/object/class.Persona.php');
      require ('../model/object/class.User.php');
      require ('../model/object/class.Zona.php');
      include '../model/object/class.Campana.php';
      include '../model/gestions/class.GestionarCampana.php';
      require ('../model/gestions/class.GestionarUsuario.php');
      require ('../model/gestions/class.GestionarZona.php');
      ?>
        <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><i class="fa fa-check-circle"></i>¡Felicidadades!</strong> <p>El Lider fue asigando a una Zona Correctamente</p>
        </div>
      <?php
      include '../view/bodyAsignarZonaLider.php';
      include '../view/footerCoordinador.html';
    break;
    case 'AsignacionLiderZonaError':
      include '../view/headerCoordinador.php';
      require ('../model/conexion/class.conexion.php');
      require ('../model/object/class.Persona.php');
      require ('../model/object/class.User.php');
      require ('../model/object/class.Zona.php');
      include '../model/object/class.Campana.php';
      include '../model/gestions/class.GestionarCampana.php';
      require ('../model/gestions/class.GestionarUsuario.php');
      require ('../model/gestions/class.GestionarZona.php');
      ?>
        <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡ERROR!</strong> <p>Error al asignar una Zona al Lider</p>
        </div>
       <?php
      include '../view/bodyAsignarZonaLider.php';
      include '../view/footerCoordinador.html';
    break;
    case 'DetallesLideres':
      include '../view/headerCoordinador.php';
      require ('../model/conexion/class.conexion.php');
      require ('../model/object/class.Persona.php');
      require ('../model/object/class.User.php');
      require ('../model/gestions/class.GestionarUsuario.php');
      include '../view/bodyListarLiderDetalles.php';
      include '../view/footerCoordinador.html';
    break;

              /*CRUD COLPORTOR*/
      case 'ViewRegistrarColportor':
        include '../view/headerCoordinador.php';
        include '../view/bodyRegistroColportor.php';
        include '../view/footerCoordinador.html';
      break;
      case 'InserColportor':
        require('../model/object/class.Persona.php');
        require('../model/gestions/class.GestionarLider.php');
        require_once('../model/conexion/class.conexion.php');

        $colportor = new Persona();
        $gestionarColportor =  new GestionarLider();

        $colportor-> setPrimerNombre($_POST['primerNombre']);
        $colportor-> setSegundoNombre($_POST['primerNombre']);
        $colportor-> setPrimerApellido($_POST['primerNombre']);
        $colportor-> setSegundoApellido($_POST['primerNombre']);
        $colportor-> setCi($_POST['primerNombre']);
        $colportor-> setSexo($_POST['primerNombre']);
        $colportor-> setLugarExpedicionCI($_POST['primerNombre']);
        $colportor-> setFechaNacimiento($_POST['primerNombre']);
        $colportor-> setLugarNacimiento($_POST['primerNombre']);
        $colportor-> setPais($_POST['primerNombre']);
        $colportor-> setCiudad($_POST['primerNombre']);
        $colportor-> setGradoAcademico($_POST['primerNombre']);
        $colportor-> setUniversidad($_POST['primerNombre']);
        $colportor-> setFacultad($_POST['primerNombre']);
        $colportor-> setCarrera($_POST['primerNombre']);
        $colportor-> setCelular($_POST['primerNombre']);

        $verificarRegistro = $gestionarColportor->GuardarColportor($colportor);

        if ($verificarRegistro == TRUE) {
          header('Location: menuCoordinador.php?modo=RegistroColportorExitoso');
        }else {
          header('Location: menuCoordinador.php?modo=RegistroColportorError');
        }
      break;
      case 'RegistroColportorExitoso':
          include '../view/headerCoordinador.php';
          ?>
            <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><i class="fa fa-check-circle"></i>¡Felicidadades!</strong> <p>El registro se realizo exitosamente</p>
            </div>
          <?php
          include '../view/bodyRegistroLider.php';
          include '../view/footerCoordinador.html';
      break;
      case 'RegistroColportorError':
          include '../view/headerCoordinador.php';
          ?>
            <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡ERROR!</strong> <p>Error al registrar al Lidet</p>
            </div>
          <?php
          include '../view/bodyRegistroLider.php';
          include '../view/footerCoordinador.html';
      break;

              /*CRUD CAMPAÑA*/
      case 'ViewRegistrarCampana':
        include '../view/headerCoordinador.php';
        include '../view/bodyRegistroCampana.php';
        include '../view/footerCoordinador.html';
      break;
      case 'InsertCampana':
        require_once('../model/conexion/class.conexion.php');
        require('../model/object/class.Union.php');
        require('../model/object/class.Mision.php');
        require('../model/object/class.Campana.php');
        require('../model/object/class.Persona.php');
        require('../model/gestions/class.GestionarCampana.php');

        $mision = new Mision();
        $campana = new Campana();
        $persona = new Persona();
        $gestionarCampana  = new GestionarCampana();
        //Buscar el nombre de la campaña antes de registrar
        $buscarNomCamp = $gestionarCampana->BuscarCampana($_POST['name']);
        if ($buscarNomCamp == TRUE) {
          header('Location: menuCoordinador.php?modo=CampanaExistente');
        }
        else {
          //ATRIBUTOS DE CAMPAÑA
                 $mision-> setIdMision($_POST['mision']);
                 $campana-> setIdTipoCampana($_POST['tipoCamapana']);
                 $persona-> setIdPersona($_POST['coordinador']);
                 $campana-> setNombreCampana($_POST['name']);
                 $campana-> setFechaInicio($_POST['finicio']);
                 $campana-> setFechaFinal($_POST['ffinal']);
                 $campana-> setGestion($_POST['gestion']);
                 $campana-> setEstado($_POST['estado']);

                 $verificarRegistro = $gestionarCampana->GuardarCampana($mision, $persona, $campana);
                 if ($verificarRegistro == TRUE) {
                   header('Location: menuCoordinador.php?modo=RegistroCampanaExitoso');
                 }else {
                 header('Location: menuCoordinador.php?modo=RegistroCampanaError');
               }
        }
      break;
      case 'CampanaExistente':
        include '../view/headerCoordinador.php';
        ?>
          <div class="alert alert-warning alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>¡ERROR!</strong> <p>Ya se encuentra registrado el nombre de la Campaña</p>
          </div>
        <?php
        include '../view/bodyRegistroCampana.php';
        include '../view/footerCoordinador.html';
      break;
      case 'RegistroCampanaExitoso':
        include '../view/headerCoordinador.php';
        ?>
          <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><i class="fa fa-check-circle"></i>¡Felicidadades!</strong> <p>El registro se realizo exitosamente</p>
          </div>
        <?php
        include '../view/bodyRegistroCampana.php';
        include '../view/footerCoordinador.html';
      break;
      case 'RegistroCampanaError':
        include '../view/headerCoordinador.php';
        ?>
          <div class="alert alert-warning alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>¡ERROR!</strong> <p>Error al registrar al Lider</p>
          </div>
         <?php
        include '../view/bodyRegistroCampana.php';
        include '../view/footerCoordinador.html';
      break;
      case 'AsignarLibroCampana':/* VIEW Para asignar libros a la campaña*/
        include '../view/headerCoordinador.php';
        require_once('../model/conexion/class.conexion.php');
        include '../model/object/class.Campana.php';
        include '../model/object/class.Libro.php';
        include '../model/gestions/class.GestionarCampana.php';
        include '../model/gestions/class.GestionarLibro.php';
        include '../view/bodyAsignarLibroCampana.php';
        include '../view/footerCoordinador.html';
      break;
      case 'ListarCampanas':
        include '../view/headerCoordinador.php';
        require ('../model/conexion/class.conexion.php');
        require ('../model/object/class.Campana.php');
        require ('../model/gestions/class.GestionarCampana.php');
        include '../view/bodyListarCampana.php';
        include '../view/footerCoordinador.html';
      break;
      case 'InsertAsignarLibro':/*Para Realizar el Insert de la asignacion del Libro*/
        require ('../model/conexion/class.conexion.php');
        include '../model/object/class.Libro.php';
        include '../model/object/class.Campana.php';
        include '../model/gestions/class.GestionarCampana.php';

        $libro = new Libro();
        $campana =  new Campana();
        $gestionarCampana =  new GestionarCampana();

        $libro->setIdLibro($_POST['libro']);
        $campana->setIdCampana($_POST['campana']);
        $libro->setCantidad($_POST['cantidad']);
        $libro->setFechaAsignacion($_POST['fecha']);

        $verificarAsignacion = $gestionarCampana->AsignarLibroCampana($campana, $libro);
        if ($verificarAsignacion) {
          header('Location: menuCoordinador.php?modo=AsignacionLibroCampanaExitoso');
        }else {
        header('Location: menuCoordinador.php?modo=AsignacionLibroCampanaError');
      }
      break;
      case 'AsignacionLibroCampanaExitoso':
        include '../view/headerCoordinador.php';
        require_once('../model/conexion/class.conexion.php');
        include '../model/object/class.Campana.php';
        include '../model/object/class.Libro.php';
        include '../model/gestions/class.GestionarCampana.php';
        include '../model/gestions/class.GestionarLibro.php';
        ?>
          <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><i class="fa fa-check-circle"></i>¡Felicidadades!</strong> <p>La asigancion del Libro fue exitosamente</p>
          </div>
        <?php
        include '../view/bodyAsignarLibroCampana.php';
        include '../view/footerCoordinador.html';
      break;
      case 'AsignacionLibroCampanaError':
        include '../view/headerCoordinador.php';
        require_once('../model/conexion/class.conexion.php');
        include '../model/object/class.Campana.php';
        include '../model/object/class.Libro.php';
        include '../model/gestions/class.GestionarCampana.php';
        include '../model/gestions/class.GestionarLibro.php';
        ?>
          <div class="alert alert-warning alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>¡ERROR!</strong> <p>Error al asignar Libro a la Campaña</p>
          </div>
         <?php
        include '../view/bodyAsignarLibroCampana.php';
        include '../view/footerCoordinador.html';
      break;

      /*CRUD LIBRO*/
      case 'ListarLibros':/*Para ver en una tabla los libros*/
        include '../view/headerCoordinador.php';
        require ('../model/conexion/class.conexion.php');
        include '../model/object/class.Libro.php';
        require ('../model/gestions/class.GestionarLibro.php');
        include '../view/bodyListarLibros.php';
        include '../view/footerCoordinador.html';
      break;

      default:
        # code...
      break;
    }
  }

  public function MenuLider()
  {
    switch ($this->Modo) {
      case 'ViewRegistrarColportor':
        include '../view/headerCoordinador.php';
        include '../view/bodyRegistroColportor.php';
        include '../view/footerCoordinador.html';
      break;
      case 'InsertLider':
          require('../model/object/class.Persona.php');
          require('../model/gestions/class.GestionarPersona.php');
          require_once('../model/conexion/class.conexion.php');

          $persona = new Persona();
          $gestionarPersona =  new GestionarPersona();

          //BUSCAMOS CI
          $existeCI = $gestionarPersona->BuscarCI($_POST['ci']);
          if ($existeCI == TRUE) {
            header('Location: menuCoordinador.php?modo=ciExistenteLider');
          }else {
            //REGISTRO DE PERSONA
                   $persona-> setPrimerNombre($_POST['primerNombre']);
                   $persona-> setSegundoNombre($_POST['segundoNombre']);
                   $persona-> setPrimerApellido($_POST['primerApellido']);
                   $persona-> setSegundoApellido($_POST['segundoApellido']);
                   $persona-> setCi($_POST['ci']);
                   $persona-> setSexo($_POST['sexo']);
                   $persona-> setLugarExpedicionCI($_POST['expedicionCI']);
                   $persona-> setFechaNacimiento($_POST['fechaNacimiento']);
                   $persona-> setLugarNacimiento($_POST['lugarNacimiento']);
                   $persona-> setPais($_POST['pais']);
                   $persona-> setCiudad($_POST['ciudad']);
                   $persona-> setGradoAcademico($_POST['gradoAcademico']);
                   $persona-> setUniversidad($_POST['universidad']);
                   $persona-> setFacultad($_POST['facultad']);
                   $persona-> setCarrera($_POST['carrera']);
                   $personas-> setCelular($_POST['celular']);

                   $verificarRegistro = $gestionarPersona->GuardarPersona($persona);

                   if ($verificarRegistro == TRUE) {
                     header('Location: menuLider.php?modo=RegistroColportorExitoso');
                     //$sms = new Manejador($_POST['RegistroLiderExitoso']);
                     //$sms->MenuCoordinador();
                   }else {
                     header('Location: menuLider.php?modo=RegistroColportorError');
                     //$sms = new Manejador($_GET['RegistroLiderError']);
                     //$sms->MenuCoordinador();
                   }
          }
          //echo "" . $lider->getPrimerNombre();
          //echo ''. $_POST['lugarNacimiento'] . '<br>' . $_POST['pais'];
      break;
      default:
        # code...
        break;
    }
  }
  public function MenuColportor()
  {
    switch ($this->Modo) {
      case 'ViewRegistrarCliente':
        # code...
        break;

      default:
        # code...
        break;
    }
  }
}

 ?>

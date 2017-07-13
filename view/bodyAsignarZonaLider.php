<?php
  $gestionarZona = new GestionarZona();
  $gestionarUsuario = new GestionarUsuario();
  $gestionarCampana = new GestionarCampana();
  $listaZona = $gestionarZona->ListarZona();
  $listaUser = $gestionarUsuario->ListarLider();
  $listaCamp = $gestionarCampana->ListarCampana();
 ?>
    <section class="content">
            <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="well well-sm">
                        <form class="form-horizontal" action="menuCoordinador.php?modo=InsertLiderZona" method="POST">
                            <fieldset>
                                <legend class="text-center header">Asignar Zona</legend>

                                <div class="form-group">
                                  <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-building   bigicon"></i></span>
                                  <div class="col-md-8">
                                    <select id="campana" name="campana" class="form-control">
                                    <option >Seleccionar Campaña...</option>
                                    <?php foreach ($listaCamp as $key => $value): ?>
                                      <option value="<?php echo $value->getIdCampana(); ?>"><?php echo $value->getNombreCampana(); ?></option>
                                    <?php endforeach; ?>
                                  </select>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-home bigicon"></i></span>
                                  <div class="col-md-8">
                                    <select id="zona" name="zona" class="form-control">
                                    <option >Seleccionar Zona...</option>
                                    <?php foreach ($listaZona as $key => $value): ?>
                                      <option value="<?php echo $value->getIdZona(); ?>"><?php echo $value->getNombre(); ?></option>
                                    <?php endforeach; ?>
                                  </select>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                  <div class="col-md-8">
                                    <select id="lider" name="lider" class="form-control">
                                    <option >Seleccionar Lider...</option>
                                    <?php foreach ($listaUser as $key => $value): ?>
                                      <option value="<?php echo $value->getIdPersona(); ?>"><?php echo $value->getPrimerNombre() .' '. $value->getSegundoNombre() .' '. $value->getPrimerApellido() .' '. $value->getSegundoApellido();?></option>
                                    <?php endforeach; ?>
                                  </select>
                                  </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-lg">Asignar</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                        <!--fin form-->
                    </div>
                </div>
            </div>
          </div>
      </section>

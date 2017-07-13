<?php
  $gestionarCampana = new GestionarCampana();
  $gestionarLibro =  new GestionarLibro();
  $listaLib = $gestionarLibro->ListarLibro();
  $listaCamp = $gestionarCampana->ListarCampana();
 ?>
    <section class="content">
            <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="well well-sm">
                        <form class="form-horizontal" action="menuCoordinador.php?modo=InsertAsignarLibro" method="POST">
                            <fieldset>
                                <legend class="text-center header">Asignación de Libro</legend>

                                <div class="form-group">
                                  <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-users bigicon"></i></span>
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
                                  <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-book bigicon"></i></span>
                                  <div class="col-md-8">
                                    <select id="libro" name="libro" class="form-control">
                                    <option >Seleccionar Libro...</option>
                                    <?php foreach ($listaLib as $key => $value):?>
                                        <option value="<?php echo $value->getIdLibro(); ?>"><?php echo $value->getTitulo(); ?></option>
                                    <?php endforeach; ?>
                                  </select>
                                  </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-unsorted bigicon"></i></span>
                                    <div class="col-md-8">
                                        <input id="cantidad" name="cantidad" type="text" placeholder="Cantidad" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
                                    <div class="col-md-8">
                                      <select id="fecha" name="fecha"class="form-control" disabled>
                                                    <option><?php
                                                      echo strftime("%Y") .'-'.strftime("%m"). '-'. strftime("%d");
                                                     ?></option>
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

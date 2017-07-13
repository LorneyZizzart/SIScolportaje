    <section class="content">
            <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="well well-sm">
                        <form class="form-horizontal"  action="menuCoordinador.php?modo=InsertCampana" method="POST">
                            <fieldset>
                                <legend class="text-center header">Registrar Campaña</legend>

                                <div class="form-group">
                                  <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-institution bigicon"></i></span>
                                  <div class="col-md-8">
                                    <select id="mision" name="mision" class="form-control">
                                    <option >Seleccionar Misión...</option>
                                    <option value="1">Misión Boliviana Occidental</option>
                                    <option value="2">Misión Boliviana Central</option>
                                    <option value="3">Misión Oriente Boliviano</option>
                                  </select>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                  <div class="col-md-8">
                                    <select id="coordinador" name="coordinador" class="form-control">
                                    <option >Seleccionar Coordinador...</option>
                                    <option value="1">Luis Fernando Gutierrez Villca</option>
                                  </select>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-bookmark   bigicon"></i></span>
                                  <div class="col-md-8">
                                    <select id="tipoCamapana" name="tipoCamapana" class="form-control">
                                    <option >Tipo de Campaña...</option>
                                    <option value="1">Verano</option>
                                    <option value="2">Invierno</option>
                                  </select>
                                  </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-users bigicon"></i></span>
                                    <div class="col-md-8">
                                        <input id="name" name="name" type="text" placeholder="Nombre" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
                                    <div class="col-md-8">
                                        <input id="finicio" name="finicio" type="text" placeholder="Fecha de Inicio" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
                                    <div class="col-md-8">
                                        <input id="ffinal" name="ffinal" type="text" placeholder="Fecha Final" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
                                    <div class="col-md-8">
                                        <input id="gestion" name="gestion" type="text" placeholder="Gestión" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                  <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-check-square  bigicon"></i></span>
                                  <div class="col-md-8">
                                    <select id="estado" name="estado" class="form-control">
                                    <option >Seleccione estado...</option>
                                    <option value="TRUE">Activo</option>
                                    <option value="FALSE">Inactivo</option>
                                  </select>
                                  </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
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

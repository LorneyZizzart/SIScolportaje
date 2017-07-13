<?php
  $gestionarCampana = new GestionarCampana();
  $listaCampana  = $gestionarCampana->ListarCampana();
 ?>
<section class="content">
        <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="well well-sm">
                    <form class="form-horizontal" method="post">
                        <fieldset>
                            <legend class="text-center header">Lista de Campañas</legend>

                            <div class="panel panel-primary">
                              <div class="panel-heading">
                                <div class="pull-right">
                                  <span class="clickable filter btn btn-info" data-toggle="tooltip" title="Click aqui para buscar un Producto" data-container="body">
                                    <i class="fa fa-search"></i>
                                  </span>
                                </div><br><br>
                                <div class="table-responsive">
                                  <table class="table">
                                    <thead class="desk">
                                      <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Fecha de Inicio</th>
                                        <th class="text-center">Fecha Final</th>
                                        <th class="text-center">Gestion</th>
                                        <th class="text-center">Estado</th>
                                      </tr>
                                    </thead>
                                  </table>
                                </div>

                              </div>
                              <div class="panel-body" style="display: none">
                                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Buscar Proveedores" />
                              </div>
                              <div class="table-responsive" style="height:350px;overflow-y:scroll;;">
                                <table class="table table-hover" id="dev-table" >

                                  <tbody class="text">

                                    <?php
                                      $i = 1;

                                      //for ($listaL=0; $listaL < count($listarLider) ; $listaL++) :
                                          foreach ($listaCampana as $listaC): ?>
                                      <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $listaC->getNombreCampana();?></td>
                                        <td><?php echo $listaC->getFechaInicio();?></td>
                                        <td><?php echo $listaC->getFechaFinal();?></td>
                                        <td><?php echo $listaC->getGestion();?></td>
                                        <td><?php
                                        if ($listaC->getEstado() == 1) {
                                          $estado = "Activo";
                                        }else {
                                          $estado = "Inactivo";
                                        }
                                        echo $estado;
                                        ?></td>
                                      </tr>
                                    <?php
                                      $i++;
                                      endforeach;
                                    ?>

                                  </tbody>
                                </table>
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

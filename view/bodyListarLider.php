<?php
  $gestionarUsuario = new GestionarUsuario();
  $listarLider  = $gestionarUsuario->ListarLider();
 ?>
<section class="content">
        <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="well well-sm">
                    <form class="form-horizontal" method="post">
                        <fieldset>
                            <legend class="text-center header">Lista de Lideres</legend>

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
                                        <th class="text-center">Nombre Completo</th>
                                        <th class="text-center">Cedula de Identidad</th>
                                        <th class="text-center">Sexo</th>
                                        <th class="text-center">País</th>
                                        <th class="text-center">Ciudad</th>
                                        <th class="text-center">Detalles</th>
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
                                          foreach ($listarLider as $listaL): ?>
                                      <tr>
                                        <td><?php echo ""; ?></td>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo ""; ?></td>
                                        <td><?php echo ""; ?></td>
                                        <!--<td><?php//echo $listarLider[$listaL]->getPrimerNombre(); ?></td>-->
                                        <td><?php echo $listaL->getPrimerNombre() .' '. $listaL->getSegundoNombre() .' '. $listaL->getPrimerApellido() .' '. $listaL->getSegundoApellido();?></td>
                                        <td><?php echo $listaL->getCi() . ' ' . $listaL->getLugarExpedicionCI();?></td>
                                        <td><?php echo $listaL->getSexo();?></td>
                                        <td><?php echo $listaL->getPais();?></td>
                                        <td><?php echo $listaL->getCiudad();?></td>
                                        <td><a href="#editar" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus-circle"></i></a></td>
                                      </tr>
                                    <?php
                                      //echo $i;
                                      $i++;
                                      endforeach;
                                      //endfor;
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
  <section>

  </section>

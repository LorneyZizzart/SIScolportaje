<?php
  $gestionarLibro = new GestionarLibro();
  $listaLibro  = $gestionarLibro->ListarLibro();
 ?>
<section class="content">
        <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="well well-sm">
                    <form class="form-horizontal" method="post">
                        <fieldset>
                            <legend class="text-center header">Lista de Libros</legend>

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
                                        <th class="text-center">Título</th>
                                        <th class="text-center">Resumen</th>
                                        <th class="text-center">Precio Oficial</th>
                                        <th class="text-center">Precio Venta</th>
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
                                          foreach ($listaLibro as $listaL): ?>
                                      <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $listaL->getTitulo();?></td>
                                        <td><?php echo $listaL->getResumen();?></td>
                                        <td><?php echo $listaL->getPrecioOficial();?></td>
                                        <td><?php echo $listaL->getPrecioVenta();?></td>
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

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
                                        <td><a href="#editar<?php echo ""; ?>" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus-circle"></i></a></td>
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
  <section class="content">
          <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <div class="well well-sm">

                    <div class="col-md-3">
                      <div class="mag1">
                        <img data-toggle="magnify" src="multimedia/images/jhonny.jpg" class="img-responsive img-rounded center-block" alt="">
                      </div>
                    </div>
                    <h2 class="wprm-recipe-name" itemprop="name">Jhonny Gutierrez Villca</h2>
                          <div class="wprm-recipe-summary" itemprop="description">
                          Ingredientes y preparación paso a paso de una sopa con verduras saludable y deliciosa. </div><br>
                          <div class="wprm-recipe-details-container wprm-recipe-tags-container">
                          <div class="wprm-recipe-course-container">
                          <span class="wprm-recipe-details-icon"><i class="fa fa-flag bigicon"></i></span>
                          <span class="wprm-recipe-details-name wprm-recipe-course-name"><strong>Campaña: </strong></span>
                          <span class="wprm-recipe-course" itemprop="recipeCategory">
                          Sopas </span>
                          </div>
                          <div class="wprm-recipe-course-container">
                          <span class="wprm-recipe-details-icon"><i class="fa fa-building bigicon"></i></span>
                          <span class="wprm-recipe-details-name wprm-recipe-course-name"><strong>Zona: </strong></span>
                          <span class="wprm-recipe-course" itemprop="recipeCategory">
                          Sopas </span>
                          </div>
                          <div class="wprm-recipe-course-container">
                          <span class="wprm-recipe-details-icon"><i class="fa fa-users bigicon"></i></span>
                          <span class="wprm-recipe-details-name wprm-recipe-course-name"><strong>Nombre del grupo: </strong></span>
                          <span class="wprm-recipe-course" itemprop="recipeCategory">
                          Sopas </span>
                          </div>
                          <div class="wprm-recipe-course-container">
                          <span class="wprm-recipe-details-icon"><i class="fa fa-send bigicon"></i></span>
                          <span class="wprm-recipe-details-name wprm-recipe-course-name"><strong>Dirección: </strong></span>
                          <span class="wprm-recipe-course" itemprop="recipeCategory">
                          Sopas </span>
                          </div>
                          <div class="wprm-recipe-course-container">
                          <span class="wprm-recipe-details-icon"><i class="fa fa-comment bigicon"></i></span>
                          <span class="wprm-recipe-details-name wprm-recipe-course-name"><strong>Descripcion: </strong></span>
                          <span class="wprm-recipe-course" itemprop="recipeCategory">
                          Sopas </span>
                          </div>
                    </div>
                    <!---DETALLES FIN-->
                  </div>
              </div>
          </div>
        </div>
    </section>

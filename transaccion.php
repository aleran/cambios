<?php include("conexion/conexion.php"); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Dream</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <?php include("menu.html") ?>
       
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Transacciones <small>Transferencias D'Una (Cucuta)</small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
				 
				
			<div class="row">

			  <div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
				 Realizar transacción
				</div>        
							  
							<div class="panel-body"> 
								<form role="form" method="POST" action="reg_trans.php">
                    <div class="row">
                      <center><h3>Tipo de Moneda</h3></center><br>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="moneda1">Monedas a convertir</label>
                                <select id="moneda1" name="moneda1" class="form-control">
                                  <option value="">Seleccione</option>
                                    <?php 
                                        $sql_m1="SELECT m.id, m.monedas_cambio FROM monedas m JOIN agencias_monedas am ON m.id=am.id_moneda JOIN agencias a ON am.id_agencia=a.id WHERE a.id='3'";
                                        $rs_m1=mysqli_query($mysqli, $sql_m1) or die(mysqli_error());
                                          while ($row_m1=mysqli_fetch_array($rs_m1)) {
                                              echo "<option value='".$row_m1["id"]."'>";
                                              echo $row_m1["monedas_cambio"];
                                              echo "</option>";
                                          }
                                      ?>
                                                    
                                  </select>
                                  <input id="tasa_cal" type="hidden" name="tasa">
                          </div>
    							     </div>
                                        
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="cantidad">Cantidad</label>
                              <input class="form-control" id="cantidad" name="cantidad1" type="text" placeholder="">
                            </div>  
                        </div>
                      </div>

                      <div class="row">
                                         
                          <div class="col-sm-6">
                            <div class="form-group">
                                    <label for="resultado">Resultado</label>
                                    <input class="form-control" id="resultado" type="text" placeholder="" disabled="">
                                    <input type="hidden" id="cantidad2" name="cantidad2">
                                </div>  
                          </div>
                      </div>

                      <div class="row">
                          <center><h3>Metodos de Pago</h3></center><br>
                          <div class="col-sm-6">
                             <div class="form-group">
                                <label for="metodo">Metodo de pago</label>
                                <select id="metodo" name="metodo" class="form-control">
                                  <option value="">Seleccione</option>
                                    <?php 
                                        $sql_m1="SELECT m.id, m.metodo_pago FROM metodos_pago m JOIN agencias_metodos am ON m.id= am.id_metodo WHERE am.id_agencia='3'";
                                        $rs_m1=mysqli_query($mysqli, $sql_m1) or die(mysqli_error());
                                        while ($row_m1=mysqli_fetch_array($rs_m1)) {
                                            echo "<option value='".$row_m1["id"]."'>";
                                                echo $row_m1["metodo_pago"];
                                            echo "</option>";
                                        }
                                    ?>
                                                    
                                </select>
                              </div>
                          </div>
                      </div>

                      <div class="row hidden" id="banco">
                          <center><h3>Banco de Origen</h3></center><br>
                          <div class="col-sm-6">
                            <div class="form-group">
                                <label for="banco_origen">Banco Origen</label>
                                <select id="banco_origen" name="banco_origen" class="form-control">
                                  <option value="">Seleccione</option>
                                  <?php 
                                    $sql_m1="SELECT id, banco FROM bancos";
                                    $rs_m1=mysqli_query($mysqli, $sql_m1) or die(mysqli_error());
                                    while ($row_m1=mysqli_fetch_array($rs_m1)) {
                                      echo "<option value='".$row_m1["id"]."'>";
                                          echo $row_m1["banco"];
                                      echo "</option>";
                                    }
                                  ?>
                                                    
                                </select>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                                <label for="referencia">Referencia</label>
                                <input class="form-control" id="referencia" name="referencia" type="text" placeholder="">
                            </div>  
                          </div>
                      </div>
                      <div class="row hidden" id="otro">
                            <center><h3>Giros</h3></center><br>
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="referencia">Referencia</label>
                                  <input class="form-control" id="referencia" name="referencia" type="text" placeholder="">
                              </div>  
                            </div>                 
                      </div>

                      <div class="row">
                            <center><h3>Banco Destino</h3></center><br>
                            <div class="col-sm-4">
                              <div class="form-group">
                                  <label for="banco_destino">Banco</label>
                                  <select id="banco_destino" name="banco_destino" class="form-control">
                                    <option value="">Seleccione</option>
                                      <?php 
                                          $sql_m1="SELECT b.id as idbanco, banco FROM bancos b
                                          JOIN bancos_agencias a ON b.id=a.id_banco
                                          WHERE a.id_agencia=3";
                                          $rs_m1=mysqli_query($mysqli, $sql_m1) or die(mysqli_error());
                                          while ($row_m1=mysqli_fetch_array($rs_m1)) {
                                              echo "<option value='".$row_m1["idbanco"]."'>";
                                                  echo $row_m1["banco"];
                                              echo "</option>";
                                          }
                                      ?>
                                                    
                                    </select>
                                </div>
                              </div>
                              <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="tipo_cuenta_destino">Tipo cuenta</label>
                                    <select id="tipo_cuenta_destino" name="tipo_cuenta_destino" class="form-control">
                                      <option value="">Seleccione</option>
                                      <option value="Ahorro">Ahorro</option>
                                      <option value="Corriente">Corriente</option>     
                                    </select>
                                </div>
                              </div>
                              <div class="col-sm-4">
                                <div class="form-group">
                                  <label for="nro_cuenta_destino">N° cuenta</label>
                                  <input class="form-control" id="nro_cuenta_destino" name="nro_cuenta_destino" type="text" placeholder="">
                                </div>  
                              </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="n_doc_destino">Nro Documento</label>
                              <input class="form-control" id="n_doc_destino" name="n_doc_destino" type="text" placeholder="">
                            </div>  
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="nombres_destino">Nombres</label>
                              <input class="form-control" id="nombres_destino" name="nombres_destino" type="text" placeholder="">
                            </div>  
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="apellidos_destino">Apellidos</label>
                              <input class="form-control" id="apellidos_destino" name="apellidos_destino" type="text" placeholder="">
                            </div>  
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="correo_destino">Correo</label>
                              <input class="form-control" id="correo_destino" name="correo_destino" type="text" placeholder="">
                            </div>  
                          </div>
                        </div>

                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="comentarios">Comentarios</label>
                                  <textarea class="form-control" id="comentarios" name="comentarios" rows="3"></textarea>
                                </div>  
                              </div>

                            </div>
                            <center><button class="btn btn-primary">Registrar Transacción</button></center>
              </form>                      
            </div>
								
								 			
									
				  <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Simple Progress Bars 
                        </div>
                       
                        <div class="panel-body">
                       <div class="progress">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
    <span class="sr-only">40% Complete (success)</span>
  </div>
</div>
<div class="progress">
  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
    <span class="sr-only">20% Complete</span>
  </div>
</div>
<div class="progress">
  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
    <span class="sr-only">60% Complete (warning)</span>
  </div>
</div>
<div class="progress">
  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
    <span class="sr-only">80% Complete</span>
  </div>
</div>
                            </div>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Progress Bars 
                        </div>
                       
                        <div class="panel-body">
                       <div class="progress progress-striped">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
    <span class="sr-only">40% Complete (success)</span>
  </div>
</div>
<div class="progress progress-striped">
  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
    <span class="sr-only">20% Complete</span>
  </div>
</div>
<div class="progress progress-striped">
  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
    <span class="sr-only">60% Complete (warning)</span>
  </div>
</div>
<div class="progress progress-striped">
  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
    <span class="sr-only">80% Complete</span>
  </div>
</div>
                            </div>
                            </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
				 	<div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Animated Progress Bars 
                        </div>
                       
                        <div class="panel-body">
                       <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
    <span class="sr-only">40% Complete (success)</span>
  </div>
</div>
                            </div>
                            </div>
                    </div>
                      <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Stacked Progress Bars 
                        </div>
                       
                        <div class="panel-body">
                       <div class="progress">
  <div class="progress-bar progress-bar-success" style="width: 35%">
    <span class="sr-only">35% Complete (success)</span>
  </div>
  <div class="progress-bar progress-bar-warning" style="width: 20%">
    <span class="sr-only">20% Complete (warning)</span>
  </div>
  <div class="progress-bar progress-bar-danger" style="width: 10%">
    <span class="sr-only">10% Complete (danger)</span>
  </div>
</div>
                            </div>
                            </div>
                    </div>
                </div>				
                 <div class="row">
                    
                      <div class="col-md-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         Simple Buttons Examples
                        </div>        
                                      
                                    <div class="panel-body"> 

                    <h4>Default Button</h4>
                    <a href="#" class="btn btn-default">default</a>
                    <a href="#" class="btn btn-primary">primary</a>
                    <a href="#" class="btn btn-danger">danger</a>
                    <a href="#" class="btn btn-success">success</a>
                    <a href="#" class="btn btn-info">info</a>
                    <a href="#" class="btn btn-warning">warning</a>

                  
                    <h4>Small Button</h4>
                    <a href="#" class="btn btn-default btn-sm">default</a>
                    <a href="#" class="btn btn-primary btn-sm">primary</a>
                    <a href="#" class="btn btn-danger btn-sm">danger</a>
                    <a href="#" class="btn btn-success btn-sm">success</a>
                    <a href="#" class="btn btn-info btn-sm">info</a>
                    <a href="#" class="btn btn-warning btn-sm">warning</a>

                   
                    <h4>Large Button</h4>

                    <a href="#" class="btn btn-default btn-lg">default</a>
                    <a href="#" class="btn btn-primary btn-lg">primary</a>
                    <a href="#" class="btn btn-danger btn-lg">danger</a>
                    <a href="#" class="btn btn-success btn-lg">success</a>
                    <a href="#" class="btn btn-info btn-lg">info</a>

                   
                </div>
            </div>
                          </div>
                     <div class="col-md-5">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                           Button Dropdowns
                        </div>        
                                      
                                    <div class="panel-body"> 
                                          <h4>Simple Button Dropdown Examples </h4>  
                                       <div style="margin-top: 10px;">
											
											<div class="btn-group">
											  <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Action <span class="caret"></span></button>
											  <ul class="dropdown-menu">
												<li><a href="#">Action</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li class="divider"></li>
												<li><a href="#">Separated link</a></li>
											  </ul>
											</div>
											<div style="margin:5px;" class="btn-group">
											  <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Danger <span class="caret"></span></button>
											  <ul class="dropdown-menu">
												<li><a href="#">Action</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li class="divider"></li>
												<li><a href="#">Separated link</a></li>
											  </ul>
											</div>
                                           <div style="margin:5px;" class="btn-group">
											  <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Danger <span class="caret"></span></button>
											  <ul class="dropdown-menu">
												<li><a href="#">Action</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li class="divider"></li>
												<li><a href="#">Separated link</a></li>
											  </ul>
											</div>
										 
                                               
                                              	<div class="btn-group">
											  <button data-toggle="dropdown" class="btn btn-success dropdown-toggle">Success <span class="caret"></span></button>
											  <ul class="dropdown-menu">
												<li><a href="#">Action</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li class="divider"></li>
												<li><a href="#">Separated link</a></li>
											  </ul>
											</div>
											<div class="btn-group">
											  <button data-toggle="dropdown" class="btn btn-info dropdown-toggle">Info <span class="caret"></span></button>
											  <ul class="dropdown-menu">
												<li><a href="#">Action</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li class="divider"></li>
												<li><a href="#">Separated link</a></li>
											  </ul>
											</div>
											<div class="btn-group">
											  <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">Default <span class="caret"></span></button>
											  <ul class="dropdown-menu">
												<li><a href="#">Action</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li class="divider"></li>
												<li><a href="#">Separated link</a></li>
											  </ul>
											</div>
										  </div>
                                       
                                       <h4>Split Button Dropdown Examples </h4>
                                      
                                       <div style="margin:5px;" class="btn-toolbar">
										
										<div class="btn-group">
										  <button class="btn btn-primary">Action</button>
										  <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></button>
										  <ul class="dropdown-menu">
											<li><a href="#">Action</a></li>
											<li><a href="#">Another action</a></li>
											<li><a href="#">Something else here</a></li>
											<li class="divider"></li>
											<li><a href="#">Separated link</a></li>
										  </ul>
										</div>
										<div class="btn-group">
										  <button class="btn btn-danger">Danger</button>
										  <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle"><span class="caret"></span></button>
										  <ul class="dropdown-menu">
											<li><a href="#">Action</a></li>
											<li><a href="#">Another action</a></li>
											<li><a href="#">Something else here</a></li>
											<li class="divider"></li>
											<li><a href="#">Separated link</a></li>
										  </ul>
										</div>
                                           <div class="btn-group">
										  <button class="btn btn-warning">Warning</button>
										  <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle"><span class="caret"></span></button>
										  <ul class="dropdown-menu">
											<li><a href="#">Action</a></li>
											<li><a href="#">Another action</a></li>
											<li><a href="#">Something else here</a></li>
											<li class="divider"></li>
											<li><a href="#">Separated link</a></li>
										  </ul>
										</div>
									 
										<div class="btn-group">
										  <button class="btn btn-success">Success</button>
										  <button data-toggle="dropdown" class="btn btn-success dropdown-toggle"><span class="caret"></span></button>
										  <ul class="dropdown-menu">
											<li><a href="#">Action</a></li>
											<li><a href="#">Another action</a></li>
											<li><a href="#">Something else here</a></li>
											<li class="divider"></li>
											<li><a href="#">Separated link</a></li>
										  </ul>
										</div>
										<div class="btn-group">
										  <button class="btn btn-info">Info</button>
										  <button data-toggle="dropdown" class="btn btn-info dropdown-toggle"><span class="caret"></span></button>
										  <ul class="dropdown-menu">
											<li><a href="#">Action</a></li>
											<li><a href="#">Another action</a></li>
											<li><a href="#">Something else here</a></li>
											<li class="divider"></li>
											<li><a href="#">Separated link</a></li>
										  </ul>
										</div>
									   
									  </div>
                                       

                                       <h4>Buttons With Icons</h4>                                       
										
											<button class="btn btn-default"><i class=" fa fa-refresh "></i> Update</button>
											<button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
											<button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
										
															
									

                                        </div>
                                    </div>
                    </div>
                    </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Circle Icon Buttons 
                        </div>
                       
                        <div class="panel-body">
                             <br /> <br />
                            <button type="button" class="btn btn-default btn-circle"><i class="fa fa-check"></i>
                            </button>
                            <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i>
                            </button>
                            <button type="button" class="btn btn-success btn-circle"><i class="fa fa-link"></i>
                            </button>
                            <button type="button" class="btn btn-info btn-circle"><i class="fa fa-check"></i>
                            </button>
                            <button type="button" class="btn btn-warning btn-circle"><i class="fa fa-money"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-heart"></i>
                            </button>
                           <br />
                             <p>
                        Get more components at official bootstrap website i.e getbootstrap.com or <a href="http://getbootstrap.com/components/" target="_blank">click here</a> .  
                        </p>
                        </div>
                        
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Icons Examples : 
                        </div>
                       
                        <div class="panel-body">
                            <br />  
                            <i class="fa fa-flask "></i>
                            
                             <i class="fa fa-flask fa-2x"></i>
                              <i class="fa fa-flask fa-3x"></i>
                              <i class="fa fa-flask fa-4x"></i>
                              <i class="fa fa-flask fa-5x"></i>
                              <br />
                              <p>
                        Get more Icons at official fortawesome website   <a href="http://fortawesome.github.io/Font-Awesome/" target="_blank" >Click here</a> . 
                        </p>
                        </div>
                        
                    </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                
                <div class="row">
                    <div class="col-md-6">
                       
                     <!--  Modals-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Modals Example
                        </div>
                        <div class="panel-body">
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                              Click  Launch Demo Modal
                            </button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Modal title Here</h4>
                                        </div>
                                        <div class="modal-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- End Modals-->
                
                    </div>
                     <div class="col-md-6">
                          <div class="panel panel-default">
                        <div class="panel-heading">
                            Sample Text
                        </div>
                        <div class="panel-body">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreullamco laboris nisi ut aliquip ex ea commodo
                           
                             </div>
                              </div>
                     </div>
                </div>
                <!-- /. ROW  -->
				<footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
				</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

    <script>
     
        $('#moneda1').on('change',function(){
            var valor = $(this).val();
             alert(valor);
            var dataString = 'moneda='+valor;
            $("#cantidad").val("");
            $("#resultado").val("");
            $("#cantidad2").val("");
            $.ajax({

                url: "ajax/tasa.php",
                type: "POST",
                data: dataString,
                success: function (resp) {
               
                    $("#tasa_cal").val(resp);                        
                    console.log(resp);
                },
                error: function (jqXHR,estado,error){
                    alert("error");
                    console.log(estado);
                    console.log(error);
                },
                complete: function (jqXHR,estado){
                    console.log(estado);
                }

                        
            })
                
        });

        $("#cantidad").keyup(function(){
            if ($("#moneda1").val()==1) {
                var conversion=$("#cantidad").val() / $("#tasa_cal").val();
                $("#resultado").val(conversion);
                $("#cantidad2").val(conversion);
            }

            if ($("#moneda1").val()==2) {
                var conversion=$("#cantidad").val() * $("#tasa_cal").val();
                $("#resultado").val(conversion);
                $("#cantidad2").val(conversion);
            }
        });

        $('#metodo').on('change',function(){
            var valor = $(this).val();
            alert(valor);
            if (valor== 1) {
              $("#otro").removeClass("hidden");
              $("#banco").addClass("hidden");
            }

            else {
              $("#banco").removeClass("hidden");
              $("#otro").addClass("hidden");
            }
           
                
        });
        
        
      
    </script>
 
</body>
</html>

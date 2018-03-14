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
				 Consulta
			</div>        
							  
			<div class="panel-body"> 
				<?php
					include("conexion/conexion.php");

					$sql_trans="SELECT t.codigo,t.cantidad1,t.cantidad2,t.moneda, t.id_usuario, t.id_metodo,t.tasa,t.referencia, t.banco_origen, t.banco_destino,t.n_doc_destino,CONCAT (t.nombres_destino, ' ',t.apellidos_destino)as nombre_destino,t.correo_destino,t.banco_destino,t.tipo_cuenta_destino,t.nro_cuenta_destino, e.fecha, e.hora  FROM transacciones t JOIN trans_estados e ON t.codigo=e.cod_trans WHERE t.codigo='".$_GET["codigo"]."'";
					$rs_trans=mysqli_query($mysqli,$sql_trans) or die(mysqli_error());
					$row_trans=mysqli_fetch_array($rs_trans);

					$sql_m="SELECT monedas_cambio FROM monedas WHERE id='".$row_trans["moneda"]."'";
					$rs_m=mysqli_query($mysqli,$sql_m) or die(mysqli_error());
                    $row_m=mysqli_fetch_array($rs_m);

                    $sql_u="SELECT n_doc, CONCAT(nombres, ' ', apellidos) as nombre, correo, telefono FROM usuarios WHERE id='".$row_trans["id_usuario"]."'";
					$rs_u=mysqli_query($mysqli,$sql_u) or die(mysqli_error());
					$row_u=mysqli_fetch_array($rs_u);

					$sql_metodo="SELECT metodo_pago FROM metodos_pago WHERE id='".$row_trans["id_metodo"]."'";
					$rs_metodo=mysqli_query($mysqli,$sql_metodo) or die(mysqli_error());
					$row_metodo=mysqli_fetch_array($rs_metodo);

					$sql_banco_destino="SELECT banco FROM bancos WHERE id='".$row_trans["banco_destino"]."'";
					$rs_banco_destino=mysqli_query($mysqli,$sql_banco_destino) or die(mysqli_error());
					$row_banco_destino=mysqli_fetch_array($rs_banco_destino);


					if ($row_trans["id_metodo"] !=1) {
						$sql_banco_origen="SELECT banco FROM bancos WHERE id='".$row_trans["banco_origen"]."'";
						$rs_banco_origen=mysqli_query($mysqli,$sql_banco_origen) or die(mysqli_error());
						$row_banco_origen=mysqli_fetch_array($rs_banco_origen);
					}
				?>
				<h4>Fecha y Hora de Transacción: <?php echo $row_trans["fecha"]." ".$row_trans["hora"]."</h4>"; ?>
				<div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    	<thead>
                        	<tr class="info">
                            	<th>Datos Usuario</th>
                            	<th>Datos Transacción</th>
                        	</tr>
                    	</thead>
                    	<tbody>
                    		<tr>
                    			<td><b>N. Documento:</b> <?php echo $row_u["n_doc"];?></td>
                    			<td><b>Codigo:</b> <?php echo $_GET["codigo"];?></td>
                    		</tr>
                    		<tr>
                    			<td><b>Nombre Completo:</b> <?php echo $row_u["nombre"];?></td>
                    			<td><b>Moneda:</b> <?php echo $row_m["monedas_cambio"];?></td>
                    		</tr>
                    		<tr>
                    			<td><b>Correo:</b> <?php echo $row_u["correo"];?></td>
                    			<td><b>Pago:</b> <?php echo $row_trans["cantidad1"];?></td>
                    		</tr>
                    		<tr>
                    			<td><b>Telefono:</b> <?php echo $row_u["telefono"];?></td>
                    			<td><b>Cambio:</b> <?php echo $row_trans["cantidad2"];?></td>
                    		</tr>
                    		<tr>
                    			<td>-------------------------------------</td>
                    			<td><b>Tasa:</b> <?php echo $row_trans["tasa"];?></td>
                    		</tr>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    	<thead>
                        	<tr class="success">
                            	<th>Datos Origen</th>
                            	<th>Datos Destino</th>
                        	</tr>
                    	</thead>
                    	<tbody>
                    		<tr>
                    			<td><b>Metodo:</b> <?php echo $row_metodo["metodo_pago"];?></td>
                    			<td><b>Banco:</b> <?php echo $row_banco_destino["banco"];?></td>
                    		</tr>
                    		<tr>
                    			<td><b>Referencia:</b> <?php echo $row_trans["referencia"];?></td>
                    			<td><b>Tipo de Cuenta:</b> <?php echo $row_trans["tipo_cuenta_destino"];?></td>
                    		</tr>
                    		<tr>
                    			<?php
                    				if ($row_trans["id_metodo"] !=1) {
                    			?>
                    				<td><b>Banco:</b> <?php echo $row_banco_origen["banco"];?></td>
                    			<?php } else {?>
                    				<td>-------------------------------------</td>
                    			<?php } ?>
                    			
                    			
                    			<td><b>N. Cuenta:</b> <?php echo $row_trans["nro_cuenta_destino"];?></td>
                    		</tr>
                    		<tr>
                    			<td>-------------------------------------</td>
                    			<td><b>N. Doc destino:</b> <?php echo $row_trans["n_doc_destino"];?></td>
                    			
                    		</tr>
                    		<tr>
                    			<td>-------------------------------------</td>
                    			<td><b>Nombre Completo:</b> <?php echo $row_trans["nombre_destino"];?></td>
                    		</tr>
                    		<tr>
                    			<td>-------------------------------------</td>
                    			<td><b>Correo:</b> <?php echo $row_trans["correo_destino"];?></td>
                    		</tr>
                    </table>
                </div>
                <center><a href="" class="btn btn-success">Procesar</a>
                <a href="" class="btn btn-danger">Anular</a></center>
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

 
</body>
</html>

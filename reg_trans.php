<?php 
	include("conexion/conexion.php");
	do {
         $caracteres = "1234567890"; //posibles caracteres a usar
         $numerodeletras=11; //numero de letras para generar el texto
         $codigo=""; //variable para almacenar la cadena generada
         for($i=0;$i<$numerodeletras;$i++)
         {
            $codigo.=substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
            entre el rango 0 a Numero de letras que tiene la cadena */
         }
         $sql3="SELECT codigo FROM transacciones";
         $rs3=mysqli_query($mysqli,$sql3) or die(mysqli_error());
         while (($row3=mysqli_fetch_array($rs3)) && ($codigo !="")) {
            if (($row3["codigo"]===$codigo)) $codigo="";
                  
         }
   
      } while ($codigo=="");

	$sql="INSERT INTO transacciones(codigo,id_agencia,id_usuario,moneda,cantidad1,cantidad2,tasa,id_metodo,banco_origen, referencia, n_doc_destino, nombres_destino, apellidos_destino,correo_destino,banco_destino,tipo_cuenta_destino,nro_cuenta_destino,comentarios)
	VALUES('".$codigo."','3','1','".$_POST["moneda1"]."','".$_POST["cantidad1"]."','".$_POST["cantidad2"]."','".$_POST["tasa"]."','".$_POST["metodo"]."','".$_POST["banco_origen"]."', '".$_POST["referencia"]."', '".$_POST["n_doc_destino"]."', '".$_POST["nombres_destino"]."', '".$_POST["apellidos_destino"]."', '".$_POST["correo_destino"]."', '".$_POST["banco_destino"]."', '".$_POST["tipo_cuenta_destino"]."', '".$_POST["nro_cuenta_destino"]."','".$_POST["comentarios"]."')";
	$rs=mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
	
	$sql2="INSERT INTO trans_estados(cod_trans,id_estado,fecha,hora)
		VALUES('".$codigo."','1','".date("Y-m-d")."', '".date("H:i:s")."')";
	$rs2=mysqli_query($mysqli,$sql2) or die(mysqli_error($mysqli));

	echo "<script>alert('Transaccion Registrada');window.location='transaccion.php';</script>";
?>
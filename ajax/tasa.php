<?php
	include("../conexion/conexion.php"); 
    $sql_tasa="SELECT tasa FROM tasas WHERE id_agencia='3' AND moneda_cambio='".$_POST["moneda"]."'";
    $rs_tasa=mysqli_query($mysqli,$sql_tasa) or die(mysqli_error($mysqli));
    $row_tasa=mysqli_fetch_array($rs_tasa);
    echo $row_tasa["tasa"];

?>
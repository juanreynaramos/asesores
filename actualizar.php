<?php
require "bd.php";
$idSolicitante = $_POST["idSolicitante"];
//// Actualizar solicitante 
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$edad = $_POST["edad"];
$sexo = $_POST["sexo"];
$updateSolicitante = $mysqli->prepare("UPDATE solicitante SET nombre=?, apellidos=? ,edad=?, sexo=? WHERE idSolicitante=? ");
$updateSolicitante->bind_param('ssisi', $nombre, $apellidos, $edad, $sexo,$idSolicitante);
$updateSolicitante->execute();
/// Guardar domicilio
$cp = $_POST["cp"];
$ciudad = $_POST["ciudad"];
$estado = $_POST["estado"];
$municipio = $_POST["municipio"];
$calle = $_POST["calle"];
$notas = $_POST["notas"];
$updateDom = $mysqli->prepare('UPDATE domicilio SET cp=?, ciudad=?,estado=?,municipio=?,calle=?,notas=? WHERE idSolicitante=? ');
$updateDom->bind_param('ssssssi', $cp, $ciudad, $estado, $municipio, $calle, $notas, $idSolicitante);
$updateDom->execute();
// Guardar en BD el Ingreso
$num = $_POST["num"];

for($i=1; $i<=$num; $i++)
{
	if(!isset( $_POST["idIngreso".$i] ))
	{
		// Si existen mas ingresos
    $fecha_actual = microtime(true);
    $comprobanteIngreso = $fecha_actual."_".$_FILES['comprobanteIngreso'.$i]['name'];
		$nombreEmpresa = trim($_POST["nombreEmpresa".$i]);
		$salarioBrutoMensual = str_replace(',', '',$_POST["salarioBrutoMensual".$i]);
		$salarioNetoMensual = str_replace(',', '',$_POST["salarioNetoMensual".$i]);
		$tipoEmpleo = $_POST["tipoEmpleo".$i];
		$fechaInicio = $_POST["fechaInicio".$i];
            move_uploaded_file($_FILES['comprobanteIngreso'.$i]['tmp_name'],  "archivosGuarados/".$comprobanteIngreso);
		$insIngreso = $mysqli->prepare('INSERT INTO ingreso( idSolicitante, nombreEmpresa, comprobanteIngreso, salarioBrutoMensual, salarioNetoMensual, tipoEmpleo, fechaInicio) VALUES (?,?,?,?,?,?,?)');
		$insIngreso->bind_param('issddss', $idSolicitante, $nombreEmpresa, $comprobanteIngreso, $salarioBrutoMensual, $salarioNetoMensual, $tipoEmpleo, $fechaInicio);
		$insIngreso->execute();
	}else{
		$nombreEmpresa = trim($_POST["nombreEmpresa".$i]);
		$salarioBrutoMensual = str_replace(',', '',$_POST["salarioBrutoMensual".$i]);
		$salarioNetoMensual = str_replace(',', '',$_POST["salarioNetoMensual".$i]);
		$tipoEmpleo = $_POST["tipoEmpleo".$i];
		$idIngreso = $_POST["idIngreso".$i];
		$updateIngreso1 = $mysqli->prepare('UPDATE ingreso SET salarioBrutoMensual=? ,salarioNetoMensual=? ,tipoEmpleo=? WHERE idIngreso=? ');
		$updateIngreso1->bind_param('ddsi', $salarioBrutoMensual, $salarioNetoMensual, $tipoEmpleo, $idIngreso);
		$updateIngreso1->execute();
	}
	
}
$plazo = $_POST["plazo"];
$updatePedido = $mysqli->prepare('UPDATE pedido SET plazo=? WHERE idPedido=? ');
$updatePedido->bind_param('ii', $plazo, $_POST["idPedido"]);
$updatePedido->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Página web</title>
	<meta charset="utf-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
		/*TIPOGRAFÍAS*/
		@import url('https://fonts.googleapis.com/css?family=Noto+Sans');
		/*INICIALIZACIÓN DE ESTILOS*/
		*{
			margin:0;
			padding:0;
			box-sizing:border-box;
		}
		body{background-color:#f6f6f6;}
		/*PERSONALIZACIÓN DE MENU*/
		.menu{
			width:80%;
			padding:10px;
            margin: 3% 10%;
			border-radius:20px;
			background-color:#fff;
            text-align: center;
			top:50%;
			left:50%;
		}
		.menu h1, .menu h2, .menu p{
			font-family:"noto sans", sans-serif;
		}

		.menu h1{
			font-size:3em;
			text-align:center;
			padding:16px;
		}
		.menu h2{
			font-size:2em;
			font-style:italic;
		}
		.menu p{
			margin:16px 0;
			line-height:1.5em;
		}

        .menu .centrar{
			text-align:center;
		}
        
		.menu .centrar img{
            max-width: 400px;
		}
		a:link, a:visited, a:active {
            text-decoration:none;
			color: #000;
        }
	</style>
</head>
<body>
	<div class="menu">
        <h1><a href='solicitud.php'>SOLICITUD PEDIDO</a></h1><br>		
		<h1><a href='pedidoTabla.php'>PEDIDOS</a></h1><br>
        <h2>Se ha actualizado correctamente</h2>
    </div>
</body>
</html>
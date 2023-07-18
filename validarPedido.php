<?php
require "bd.php";
$idSolicitante = $_POST["idSolicitante"];
$varError = "";
if($idSolicitante == 0)
{
    $correo = $_POST["correo"];
    $stmt = $mysqli->prepare('SELECT * FROM solicitante WHERE correo= ?');
    $stmt->bind_param('s', $correo);
    $stmt->execute();    
    $result = $stmt->get_result();
    $contar = $stmt->num_rows;

    if($contar>0){
        $varError = "Este correo ya fue utilizado por otro CURP";
    }else
    {
        // Guardar en BD el solicitante
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $edad = $_POST["edad"];
        $fechaNacimiento = $_POST["fechaNacimiento"];
        $sexo = $_POST["sexo"];
        $curp = $_POST["curp"];

        $insSol = $mysqli->prepare('INSERT INTO solicitante(nombre, apellidos, edad, fechaNacimiento, sexo, curp, correo)VALUES (?, ?, ?, ?, ?, ?, ?)');
        $insSol->bind_param('ssissss', $nombre, $apellidos, $edad, $fechaNacimiento, $sexo, $curp, $correo);
        $insSol->execute();

        // obtener id del solicitante
        $idResp = mysqli_insert_id($mysqli);
        
        // Guardar en BD el domicilio
        $cp = $_POST["cp"];
        $ciudad = $_POST["ciudad"];
        $estado = $_POST["estado"];
        $municipio = $_POST["municipio"];
        $calle = $_POST["calle"];
        $notas = $_POST["notas"];
        $insDom = $mysqli->prepare('INSERT INTO domicilio(idSolicitante, cp, ciudad, estado, municipio, calle, notas) VALUES (?,?,?,?,?,?,?)');
        $insDom->bind_param('issssss', $idResp, $cp, $ciudad, $estado, $municipio, $calle, $notas);
        $insDom->execute();
        
        // Guardar en BD el Ingreso
        $num = $_POST["num"];

        for($i=1; $i<=$num; $i++)
        {
            $fecha_actual = microtime(true);
            $comprobanteIngreso = $fecha_actual."_".$_FILES['comprobanteIngreso'.$i]['name'];
            $tipo_archivo = $_FILES['comprobanteIngreso'.$i]['type'];
            $tamano_archivo = $_FILES['comprobanteIngreso'.$i]['size'];
            $nombreEmpresa = $_POST["nombreEmpresa".$i];
            $salarioBrutoMensual = str_replace(',', '',$_POST["salarioBrutoMensual".$i]);
            $salarioNetoMensual = str_replace(',', '',$_POST["salarioNetoMensual".$i]);
            $tipoEmpleo = $_POST["tipoEmpleo".$i];
            $fechaInicio = $_POST["fechaInicio".$i];
            move_uploaded_file($_FILES['comprobanteIngreso'.$i]['tmp_name'],  "archivosGuarados/".$comprobanteIngreso);
            $insIngreso = $mysqli->prepare('INSERT INTO ingreso( idSolicitante, nombreEmpresa, comprobanteIngreso, salarioBrutoMensual, salarioNetoMensual, tipoEmpleo, fechaInicio) VALUES (?,?,?,?,?,?,?)');
            $insIngreso->bind_param('issddss', $idResp, $nombreEmpresa, $comprobanteIngreso, $salarioBrutoMensual, $salarioNetoMensual, $tipoEmpleo, $fechaInicio);
            $insIngreso->execute();
        }
        // despues de insertar todo se guarda el pedido
        $destino = $_POST["destino"];
        $montoSolicitado = str_replace(',', '',$_POST["montoSolicitado"]);
        $plazo = $_POST["plazo"];
        $insPedido = $mysqli->prepare('INSERT INTO pedido(idSolicitante, destino, montoSolicitado, plazo) VALUES (?,?,?,?)');
        $insPedido->bind_param('isds', $idResp, $destino, $montoSolicitado, $plazo);
        $insPedido->execute();
        // obtener id del solicitante
        $idPed = mysqli_insert_id($mysqli);
        $varResp = "El numero de pedido es: PEDNUM_". $idPed;
    }
    
}else{
    // despues de insertar todo se guarda el pedido
    $idSolicitante = $_POST["idSolicitante"];
    $destino = $_POST["destino"];
    $montoSolicitado = $_POST["montoSolicitado"];
    /// validar que no exista un record anterior
    $pedido = $mysqli->prepare('SELECT * FROM pedido WHERE idSolicitante= ? and  destino=?');
    $pedido->bind_param('is', $idSolicitante,$destino);
    $pedido->execute();    
    $result = $pedido->get_result();
    $contarPed = $result->num_rows;
    if($contarPed>0)
    {
        $idError = "";
        while ($myrow =  $result->fetch_assoc())
        {
            $idError = "PEDNUM_".$myrow['idPedido'];
        }
        $varError = "Este solicitante ya tiene un pedido con este identificador: ".$idError;
    }else{
        $plazo = $_POST["plazo"];
        $insPedido = $mysqli->prepare('INSERT INTO pedido(idSolicitante, destino, montoSolicitado, plazo) VALUES (?,?,?,?)');
        $insPedido->bind_param('isds', $idSolicitante, $destino, $montoSolicitado, $plazo);
        $insPedido->execute();
        // obtener id del solicitante
        $idPed = mysqli_insert_id($mysqli);
        $varResp = "El numero de pedido es: PEDNUM_". $idPed;
    }
    mysqli_close($mysqli);
}
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
        
        <?php
        if(strlen($varError) >2)
        {
            echo "<h2>".$varError."</h2>";
        }else{
            echo "<h2>".$varResp."</h2>";
        }
        ?>
        <br><br>
        <h1><a href='solicitud.php'>SOLICITUD PEDIDO</a></h1><br>		
		<h1><a href='pedidoTabla.php'>PEDIDOS</a></h1><br>
	</div>
</body>
</html>
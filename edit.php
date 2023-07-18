<?php
require "bd.php";
$id=$_GET["id"];
$rst = "SELECT p.*,nombre,apellidos,edad,fechaNacimiento,sexo,curp,correo, cp, ciudad, estado, municipio, calle,notas FROM `pedido` p inner JOIN solicitante s ON p.idSolicitante=s.idSolicitante inner join domicilio d on p.idSolicitante=d.idSolicitante WHERE idPedido=$id ";
$resultado=$mysqli->query($rst)or die ($mysqli->error. " en la línea ".(__LINE__-1));
$myrow = $resultado->fetch_array(MYSQLI_ASSOC);

$ingresos = "SELECT * FROM `ingreso` WHERE idSolicitante=".$myrow['idSolicitante']."";
$resultIng=$mysqli->query($ingresos)or die ($mysqli->error. " en la línea ".(__LINE__-1));
$contar = $resultIng->num_rows;
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
    <script>
        var num = 0; 
const crearDiv = () => {
    const numDivs = document.getElementsByClassName("item").length;
    num = numDivs;
    if(numDivs < 5){
        num ++;
        id= num;
        var contadorDivs = document.getElementById("num");
        contadorDivs.value = num;
        const contenedor = document.getElementById("contenedor-divs");
        let nuevoDiv = `<hr class="solid large"><div class="row item">
            <div class="col-sm-4"> 
                <div class="form-group">
                    <label class="control-label">Nombre de la empresa</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="nombreEmpresa`+id+`" name="nombreEmpresa`+id+`" required>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"> 
                <div class="form-group">
                    <label class="control-label">Comprobante de Ingreso </label>
                    <div class="input-group">
                        <input type="file" class="form-control" id="comprobanteIngreso`+id+`" name="comprobanteIngreso`+id+`" required>
                    </div>                                                
                </div>
            </div>    
            <div class="col-sm-4"> 
                <div class="form-group">
                    <label class="control-label">Salario Bruto Mensual</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="salarioBrutoMensual`+id+`" name="salarioBrutoMensual`+id+`" required>
                    </div>
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-4"> 
                <div class="form-group">
                    <label class="control-label">Salario Neto Mensual</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="salarioNetoMensual`+id+`" name="salarioNetoMensual`+id+`" required>
                    </div>                                                
                </div>
            </div>
            <div class="col-sm-4"> 
                <div class="form-group">
                    <label class="control-label">Tipo de empleo </label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="tipoEmpleo`+id+`"  name="tipoEmpleo`+id+`" required>
                    </div>                                                
                </div>
            </div>   
            <div class="col-sm-4"> 
                <div class="form-group">
                    <label class="control-label">Fecha Inicio</label>
                    <div class="input-group">
                        <input type="date" name="fechaInicio`+id+`" id="fechaInicio`+id+`" class="form-control" required >
                    </div>                                                
                </div>
            </div>
        </div>`;
        contenedor.insertAdjacentHTML("beforeend", nuevoDiv);
    }else{
        alert('Solo puedes agregar 5 ingresos.');
    }
}

const idDiv = () => {
    for(var i = 1; i <= 5; i++){
        if(document.getElementById("div"+i) === null){
            return "div"+i;
        }
    }
}

const eliminarDiv = (obj) => {
    const div = obj.parentElement;
    div.remove();
}
    </script>
</head>
<body>
	<div class="menu">

    <form id="validar" name="validar" method="post" enctype="multipart/form-data" action="actualizar.php" >
            
<hr class="solid large">
<div class="row"><div class="col-sm-12"><h4>D A T O S</h4></div></div>
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Nombre</label>
            <div class="input-group">
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo($myrow['nombre'] );?>" required>
                <input type="hidden" class="form-control" id="idSolicitante" name="idSolicitante" value="<?php echo($myrow['idSolicitante'] );?>">
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Apellidos </label>
            <div class="input-group">
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo($myrow['apellidos'] );?>" required>
            </div>                                                
        </div>
    </div>    
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Sexo</label>
            <div class="input-group">
                <select class="form-control" id="sexo" name="sexo" >
                <option value="HOMBRE" <?php if($myrow['sexo'] == "HOMBRE") echo "selected"; ?> >Hombre</option>
                <option value="MUJER" <?php if($myrow['sexo'] == "MUJER") echo "selected"; ?> >Mujer</option>
                <option value="OTRO" <?php if($myrow['sexo'] == "OTRO") echo "selected"; ?> >Otro</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label class="control-label">Correo Electrónico</label>
            <div class="input-group">
                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo($myrow['correo'] );?>" readonly>
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="curp">CURP</label>
            <input type="text" class="form-control" id="curp" name="curp" readonly value="<?php echo($myrow['curp'] );?>">
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Edad</label>
            <div class="input-group">
                <input type="number" class="form-control" id="edad" name="edad" min="18" max="100" value="<?php echo($myrow['edad'] );?>" required>
            </div>                                                
        </div>
    </div>
</div>
<hr class="solid large">
<div class="row"><div class="col-sm-12"><h4>D O M I C I L I O</h4></div></div>
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Código Postal</label>
            <div class="input-group">
                <input type="text" class="form-control" id="cp" name="cp" value="<?php echo($myrow['cp'] );?>"  required>
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Ciudad </label>
            <div class="input-group">
                <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo($myrow['ciudad'] );?>" >
            </div>                                                
        </div>
    </div>    
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Estado</label>
            <div class="input-group">
                <input type="text" class="form-control" id="estado" name="estado" value="<?php echo($myrow['estado'] );?>" >
            </div>
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Municipio</label>
            <div class="input-group">
                <input type="text" class="form-control" id="municipio" name="municipio" value="<?php echo($myrow['municipio'] );?>" >
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Calle </label>
            <div class="input-group">
                <input type="text" class="form-control" id="calle" name="calle" value="<?php echo($myrow['calle'] );?>" >
            </div>                                                
        </div>
    </div>    
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Notas</label>
            <div class="input-group">
            <textarea class="form-control" id="notas" name="notas" rows="3" value="<?php echo($myrow['notas'] );?>" ></textarea>
            </div>
        </div>
    </div>
</div>
<hr class="solid large">
<div class="row"><div class="col-sm-12"><h4>I N G R E S O</h4></div></div>
<input type="hidden"  id="num" name="num" value="<?php echo($contar );?>">
<?php
$cad = "";
$conta = 1;
while ($row = $resultIng->fetch_array(MYSQLI_ASSOC))
{
        $cad = "".$conta;
        
    ?>
<hr class="solid large">
    <div class="row item">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Nombre de la empresa</label>
            <div class="input-group">
                <input type="text" class="form-control" id="nombreEmpresa<?php echo($cad );?>" name="nombreEmpresa<?php echo($cad );?>"  value="<?php echo($row['nombreEmpresa'] );?>" readonly>
                <input type="hidden" class="form-control" id="idIngreso<?php echo($cad );?>" name="idIngreso<?php echo($cad );?>" value="<?php echo($row['idIngreso'] );?>" >
            </div>
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Comprobante de Ingreso </label>
            <div class="input-group">
                <input type="text" class="form-control" id="comprobanteIngreso"  value="<?php echo($row['comprobanteIngreso'] );?>" readonly>
            </div>                                                
        </div>
    </div>    
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Salario Bruto Mensual</label>
            <div class="input-group">
                <input type="text" class="form-control" id="salarioBrutoMensual<?php echo($cad );?>" name="salarioBrutoMensual<?php echo($cad );?>" value="<?php echo($row['salarioBrutoMensual'] );?>" >
            </div>
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Salario Neto Mensual</label>
            <div class="input-group">
                <input type="text" class="form-control" id="salarioNetoMensual<?php echo($cad );?>" name="salarioNetoMensual<?php echo($cad );?>" value="<?php echo($row['salarioNetoMensual'] );?>" >
                
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Tipo de empleo </label>
            <div class="input-group">
                <input type="text" class="form-control" id="tipoEmpleo<?php echo($cad );?>" name="tipoEmpleo<?php echo($cad );?>" value="<?php echo($row['tipoEmpleo'] );?>" >
            </div>                                                
        </div>
    </div>   
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Fecha Inicio</label>
            <div class="input-group">
                <input type="date" name="fechaInicio" id="fechaInicio" class="form-control" value="<?php echo($row['fechaInicio'] );?>" readonly>
            </div>                                                
        </div>
    </div>
</div>
<?php
$conta ++;
}
?>
<div id="contenedor-divs"></div>
<input type="button" class="btn btn-secondary" value="Nuevo Ingreso" onclick="crearDiv()">
<hr class="solid large">
<div class="row"><div class="col-sm-12"><h4>P E D I D O</h4></div></div>
<div class="row">
<div class="col-sm-4"> 
    <div class="form-group">
        <label class="control-label">Destino</label>
        <div class="input-group">            
            <select class="form-control" id="destino" name="destino" readonly>
            <?php if($myrow['destino'] == "AUTO") {?>
                <option value="AUTO" selected >Auto</option>
                <?php } 
                if($myrow['destino'] == "CASA") { ?>
                <option value="CASA" selected>Casa</option>
                <?php }  if($myrow['destino'] == "TARJETA CREDITO") { ?>
                <option value="TARJETA CREDITO" selected>Tarjeta Crédito</option>
                <?php }  if($myrow['destino'] == "PRESTAMO") { ?>
                <option value="PRESTAMO" selected>Préstamo</option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>
<div class="col-sm-4"> 
    <div class="form-group">
        <label class="control-label">Monto Solicitado </label>
        <div class="input-group">
            <input type="text" class="form-control" id="montoSolicitado" name="montoSolicitado" value="<?php echo($myrow['montoSolicitado'] );?>" readonly>
        </div>
    </div>
</div>
<div class="col-sm-4"> 
    <div class="form-group">
        <label class="control-label">Plazo (en años)</label>
        <div class="input-group">           
            <input type="number" class="form-control" id="plazo" name="plazo" min="1" max="10" value="1" value="<?php echo($myrow['plazo'] );?>" required>
            <input type="hidden" class="form-control" id="idPedido" name="idPedido" value="<?php echo($myrow['idPedido'] );?>">
        </div>
    </div>
</div>
</div>
<button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
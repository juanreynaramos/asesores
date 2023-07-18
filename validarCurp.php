<?php 
require "bd.php";
$curp = $_POST["curp"];
$stmt = $mysqli->prepare('SELECT s.*, cp, ciudad, estado, municipio, calle, notas FROM solicitante s inner join domicilio d on s.idSolicitante=d.idSolicitante WHERE curp= ?');
$stmt->bind_param('s', $curp);
$stmt->execute();
$var = null;
$result = $stmt->get_result();
$contar = $result->num_rows;
while ($row = $result->fetch_assoc()){
    $var = $row;
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
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
    #contenedor-divs{
    margin-top:10px;
    width:100%;
    }
    #contenedor-divs .item{
        height:auto;
        margin-bottom:5px;
        margin-top:5px;
    }
</style>
<script>
var num = 0; 
const crearDiv = () => {
    const numDivs = document.getElementsByClassName("item").length;
    if(numDivs < 5){
        num ++;
        id= num;
        var contadorDivs = document.getElementById("num");
        contadorDivs.value = num;
        const contenedor = document.getElementById("contenedor-divs");
        let nuevoDiv = `<div class="row item">
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
        </div>
        <hr class="solid large">`;
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
function validateForm() {
    var suma = 0;
    if(document.forms["validar"]["idSolicitante"].value == 0)
    {
        const numDivs = document.getElementsByClassName("item").length;
        for(var i = 1; i <= numDivs; i++)
        {
            var x = document.forms["validar"]["salarioNetoMensual"+i].value.replace(",", "");
            suma += parseFloat(x);
        }
    }else{
        suma = document.forms["validar"]["salarioNetoMensual"].value.replace(",", "");
    }
    
    var montoSolicitado = document.forms["validar"]["montoSolicitado"].value.replace(",", "");
    var destino = document.forms["validar"]["destino"].value;
    switch (destino) {
        case "AUTO":
            if(parseFloat(montoSolicitado)>100000){
                alert("Monto máximo de prestamo es de $100,000");
                return false;
            }                    
            if(parseFloat(suma)<30000){
                alert("Monto mínimo de ingreso es de $30,000");
                return false;
            }
            break;
        case "CASA":              
            if(parseFloat(montoSolicitado)>200000){
                alert("Monto máximo de prestamo es de $200,000");
                return false;
            }                    
            if(parseFloat(suma)<50000){
                alert("Monto mínimo de ingreso es de $50,000");
                return false;
            }
            break;
        case "TARJETA CREDITO":
            if(parseFloat(montoSolicitado)>20000){
                alert("Monto máximo de prestamo es de $20,000");
                return false;
            }                    
            if(parseFloat(suma)<20000){
                alert("Monto mínimo de ingreso es de $20,000");
                return false;
            }
            break;
        case "PRESTAMO":
            if(parseFloat(montoSolicitado)>50000){
                alert("Monto máximo de prestamo es de $50,000");
                return false;
            }                    
            if(parseFloat(suma)<20000){
                alert("Monto mínimo de ingreso es de $20,000");
                return false;
            }
            break;
    }
}
</script>
</head>
<body>
	<div class="menu">
        <form id="validar" name="validar" method="post" action="validarPedido.php" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="row">
                <div class="col-sm-4"> 
                    <div class="form-group"></div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="curp">CURP</label>
                        <input type="text" class="form-control" id="curp" name="curp" readonly value="<?php echo($curp);?>">
                    </div>
                </div>
            </div>
            <?php
            if($contar>0)
            {
                include 'formFull.php';
                ?>
                <hr class="solid large">
                <div class="row"><div class="col-sm-12"><h4>I N G R E S O</h4></div></div>
                 <?php
                    $montoNeto = 0;
                 $ingreso = $mysqli->prepare('SELECT * FROM ingreso WHERE idSolicitante=?');
                 $ingreso->bind_param('i', $var['idSolicitante']);
                 $ingreso->execute();
                 $resultIng = $ingreso->get_result();
                 $contarResult = $resultIng->num_rows;
                 if($contarResult>0){                    
                    while ($row = $resultIng->fetch_assoc()){
                        ?>
                        <hr class="solid large">
                        <?php
                        $montoNeto += $row['salarioNetoMensual'];
                        include 'ingresos.php';
                    }
                }      
                ?>
                <input type="hidden" class="form-control" name="salarioNetoMensual" id="salarioNetoMensual" value="<?php echo($montoNeto );?>">
                <?php
            }else
            {
                include 'form.php';

            }
            include 'pedido.php';
            mysqli_close($mysqli);
            ?>
        <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
	</div>
</body>
</html>
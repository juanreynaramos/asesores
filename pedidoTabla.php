<?php
require "bd.php";
$rst = "SELECT p.*,nombre,apellidos FROM `pedido` p inner JOIN solicitante s ON p.idSolicitante=s.idSolicitante WHERE 1 order by fechaPedido ASC  ";
$resultado=$mysqli->query($rst)or die ($mysqli->error. " en la línea ".(__LINE__-1));
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
		<hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Folio</th>
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Fecha Registro</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while ($myrow = $resultado->fetch_array(MYSQLI_ASSOC))
                {
                    ?>
                    <tr>
                        <td>
                        PEDNUM_<?php echo "".$myrow['idPedido']; ?>
                        </td>
                        <td>
                        <?php echo $myrow['nombre']." ".$myrow['apellidos']; ?>
                        </td>
                        <td>
                        <?php echo $myrow['destino'].""; ?>
                        </td>
                        <td>
                        <?php echo $myrow['fechaPedido'].""; ?>
                        </td>
                        <td>
                        <a href="edit.php?id=<?php echo $myrow['idPedido'].""; ?>" class="btn btn-secondary">Edit</a>
                        </td>
                    </tr>
                    <?php
                
                }
            ?>
            </tbody>
        </table>
	</div>
</body>
</html>
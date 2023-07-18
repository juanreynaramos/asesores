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
			width:600px;
			height:400px;
			padding:32px;
			border-radius:40px;
			margin-top:-200px;
			margin-left:-300px;
			background-color:#fff;
            text-align: center;
			position:fixed;
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
        <form id="validar" name="validar" method="post" action="validarCurp.php">
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="curp">CURP</label>
					<input type="text" class="form-control" id="curp" name="curp" required>
				</div>
			</div>
		</div>
            <button name="boton" id="boton" type="submit" class="btn btn-primary">Validar</button>
        </form>
	</div>
</body>
</html>
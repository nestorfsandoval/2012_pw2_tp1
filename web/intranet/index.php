<?php
session_start();
session_regenerate_id();
require_once '../funciones/conectar.php';

if(isset($_SESSION['user_interno'])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
	<head>
		<title>Pochola's Music - INTRANET </title>
                <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
                <link type="text/css" href="estilo.css" rel="stylesheet"/>
                <link type="text/css" href="css/smoothness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />	
		<script type="text/javascript" language="JavaScript" src="../js/jquery-1.6.2.js"></script>
		<script type="text/javascript" language="JavaScript" src="../js/jquery-ui-1.8.16.custom.js"></script>
                <script type="text/javascript" language="JavaScript" src="../js/verUsuario.js"></script> 
                <script type="text/javascript" language="Javascript" src="js/fnIntranet.js"></script>
<?php
            if(isset($_GET['op'])){              
                        
                switch($_GET['op']){
                    case 2: $contenido="usuarios.php";
                        break;
                    case 3: $contenido="stock.php";
                        break;
                    case 4: $contenido="compras.php";
                        break;
                    case 5: $contenido="ventas.php";
                        break;
                }
            }else{
                $contenido="bienvenido.php";
            }
?>
	</head>
	<body>
            <br />
		<div class="encabezado">
			<div class="izquierda">
				<img src="../img/logo.png" />
			</div>
			<div class="derecha">
				Bienvenido <?php echo $_SESSION['user_interno']?> | <a class="sesion" href="../index.php?logout=on">Desconectar</a>
			</div>
		</div>	
		<div class="menu">
			<a href="index.php">Inicio </a>|
			<a href="?op=2"> Usuarios </a>|
			<a href="?op=3"> Stock </a>|
			<a href="?op=4"> Compras </a>|
			<a href="?op=5"> Ventas</a>
		</div>
		<hr width="1080px"/>
		<!-- CUERPO -->
                <?php require_once $contenido?>
		
        </body>
</html>
 <?php
}else{
    echo 'Usted no tiene permisos para ingresar a esta secci&oacute;n, y sera redirigido a la P?gina Principal de Pocholas Music';
    header ( "Refresh: 5; ../index.php");

}

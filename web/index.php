<?php
session_start();
session_regenerate_id();
 require_once 'funciones/conectar.php';
 require_once 'funciones/login.php';
 if(isset($_GET['acc'])){              
                        
                switch($_GET['acc']){
                    case 2: $contenido="quienesSomos.php";
                        break;
                    case 3: $contenido="catalogo.php";
                        break;
                    case 4: $contenido="comoComprar.php";
                        break;
                    case 5: $contenido="contactos.php";
                        break;
                }
            }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--INICIA EL HTML-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <!--INICIA EL HEAD-->
    <head>
        <!--TITULO DE LA PAGINA-->
        <title>Pochola's Music - inicio</title>
        <!--METADATO-->
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
        <!--ENLACE AL ARCHIVO CON EL ESTILO DE JQUERY UI-->
        <link type="text/css" href="estilo.css" rel="stylesheet"/>
        <link type="text/css" href="css/custom-theme/jquery-ui-1.8.16.custom.css" rel="stylesheet"/>       
        <!--SCRIPTS INCLUIDOS: JQUERY, JQUERY UI, SE INCLUYE VALFORMS QUE TIENE LAS FUNCIONES DE VALIDACION-->
        <script type="text/javascript" language="javascript" src="js/jquery-1.6.2.js"></script>
        <script type="text/javascript" language="javascript" src="js/jquery-ui-1.8.16.custom.js"></script>
        <script type="text/javascript" language="javascript" src="js/valForms.js"></script>
        <script></script>
    </head>
    <!--FINALIZA EL HEAD-->
    <!--INICIA EL BODY-->
    <body>
    	 <!--DIV QUE CONTIENE EL ENCABEZADO-->
    <div id="todo">
    <div id="encabezado">
            <!--DIV QUE CONTIENE EL LOGO-->
        <div class="izquierda">
            <img src="img/logo.png" />
        </div>
        <div id="menu">
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="?acc=2">Quienes somos</a></li>
                        <li><a href="?acc=3">Catalogo</a></li>
                        <li><a href="?acc=4">Como comprar</a></li>
                        <li><a href="?acc=5">Contactos</a></li>
                    </ul>
            
                    <?php
                    if(isset($_SESSION['user_public'])){
                        echo 'Bienvenido'.$_SESSION['user_public'].' | <a class="sesion" href="../index.php?logout=on">Desconectar</a>';
                    }else{
                    echo '<form action="index.php" method="POST" id="login">
                            <label>Usuario:</label>
                            <input name="user" value="" type="text" id="user"/>
                            <label>Contrase&ntildea:</label>
                            <input name="pass" value="" type="password" id="pass"/>
                            <button><i class="loguear"></i></button>
                          </form>';
                    }
                        ?>
        </div>
        <div id="mensajeSesion"><?php echo $mensajeLogin?></div>    
    </div>
    <!--COMIENZA CUERPO DE PAGINA-->        
    <div id="cuerpo">
        <?php include $contenido;?> 
    </div>
    <div id="pie">
                 
    </div>
    </div>
    </body>
    <!--FINALIZA EL BODY-->
</html>
<!--FINALIZA EL HTML-->

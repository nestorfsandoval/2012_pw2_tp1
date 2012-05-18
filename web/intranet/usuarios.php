<?php 
    //SI ESTA SETEADO DESHABILITAR 
    if(isset($_POST['deshabilitar'])){
        //SI SI EL ID DEL USUARIO LOGUEADO ES IGUAL AL ID A DESHABILITAR LANZA UN ALERTA
        if($_SESSION['iduser'] == $_POST['deshabilitar']){
            $mensajeAlerta="Usted no pude deshabilitar su usuario mientras lo esta usando.";
        }else{
            //SI EL NIVEL DE PRIVILEGIOS ES MAYOR O IGUAL A QUE DESEO BORRAR LANZA UN ALERTA
            //NIVEL 0 = SUPERUSUARIO
            //NIVEL 1 = ADMIN
            //NIVEL 2 = USUARIO
            if($_SESSION['nivel'] >= $_POST['privi']){
                $mensajeAlerta="Usted no pude deshabilitar un Usuario de mayor o igual privilegio.";
            }else{
                //SINO DESHABILITA EL USUARIO
                $sql = 'UPDATE empleado SET habilitado=0 WHERE id_emp=? ';
                $stmt = $conectar->prepare($sql);
                $stmt->bindParam(1, $_POST['deshabilitar'],PDO::PARAM_INT);

                try{
                    $stmt->execute();
                }catch (PDOException $e){
                    $mensajeAlerta='Error, no se pudo deshabitar el Usuario.Intentelo otro d&iacute;a';
                }
            }
        }
        
    }

 //SI ESTA SETEADO nCiud ,PREGUNTO SI YA EXISTE, DE ACUERDO A ESTO ,AGREGO NUEVO ARTISTA O NO
    if (isset($_GET['nCiud']) && ($_GET['nCiud']!='')){
        $ciudad=$_GET['nCiud'];
        $prov=$_GET['prov'];
        $cp=$_GET['cp'];
        $qry="SELECT * FROM ciudad WHERE nomCiudad='$ciudad' AND id_provincia='$prov'";     
        
        //si no existe ciudad la cargo
        if(!existenDato($qry, $conectar))
        {
            $sqlArt="INSERT INTO ciudad (id_provincia,nomCiudad,cp) values(?,?,?)";
            $stmt = $conectar->prepare($sqlArt);
            $stmt->bindParam(1, $prov,PDO::PARAM_INT);
            $stmt->bindParam(2, $ciudad,PDO::PARAM_STR);
            $stmt->bindParam(3, $cp,PDO::PARAM_STR);
            
            try{
            $stmt->execute();
            }catch (PDOException $e){
                $mensajeAlerta='Error, no se pudo cargar la Ciudad.Intentelo Otro D&iacute;a';
            }
        }
        
    }

//SI ESTA SETEADO USER  SE TRATA DE AGREGAR USUARIO
if(isset($_POST['user'])){
    //DESARMO LA CADENA QUE VIENE EN $_POST['ciudad'], ya que contiene codigo de ciudad y de prov
        $city=explode(',', $_POST['ciudad']);

        //si si esta seteado acc y es igual a 'nuevo', sql=insert
        if(($_POST['acc']=='nuevo')){
            $pass=md5($_POST['pass']);
            $sql = 'INSERT INTO empleado (apellido,nombre,user,pass,mail,id_ciudad,id_prov,idprivilegio) values(?,?,?,?,?,?,?,?)';
            //PREPARA LA SENTENCIA SQL
        $stmt = $conectar->prepare($sql);
        $stmt->bindParam(1, $_POST['apellido'],PDO::PARAM_STR);
        $stmt->bindParam(2, $_POST['nombre'],PDO::PARAM_STR);
        $stmt->bindParam(3, $_POST['user'],PDO::PARAM_STR);
        $stmt->bindParam(4, $pass,PDO::PARAM_STR);
        $stmt->bindParam(5, $_POST['mail'], PDO::PARAM_STR);
        $stmt->bindParam(6, $city[0], PDO::PARAM_INT);
        $stmt->bindParam(7, $city[1], PDO::PARAM_INT);
        $stmt->bindParam(8, $_POST['privi'], PDO::PARAM_INT);
        }
        //si si esta seteado acc y es igual a 'editar', sql=update
        if($_POST['acc']=='editar'){
            
            $sql = 'UPDATE empleado SET nombre=?, apellido=?, mail=?, id_ciudad=?, id_prov=?, idprivilegio=? WHERE id_emp=?';
            $stmt = $conectar->prepare($sql);
            $stmt->bindParam(1, $_POST['nombre'],PDO::PARAM_STR);
            $stmt->bindParam(2, $_POST['apellido'],PDO::PARAM_STR);
            $stmt->bindParam(3, $_POST['mail'], PDO::PARAM_STR);
            $stmt->bindParam(4, $city[0], PDO::PARAM_INT);
            $stmt->bindParam(5, $city[1], PDO::PARAM_INT);
            $stmt->bindParam(6, $_POST['privi'], PDO::PARAM_INT);
            $stmt->bindParam(7, $_POST['empleado'], PDO::PARAM_INT);
            
            
        }
        
        
       try{
            $stmt->execute();
        }catch (PDOException $e){
            $mensajeAlerta='Lo sentimos, no se pudo cargar el usuario.Intentelo Otro D&iacute;a';
        }
   }    
   
//CONSULTA DE LISTAR PRIVILEGIOS
$consulta="SELECT * FROM privilegios";
$privilegios= consultar($consulta,$conectar);

//CONSULTA DEL LISTADO DE USUARIOS
if(isset($_GET['buscaUser'])){
    $buscado=$_GET['buscaUser'];
    $complemento="WHERE concat(apellido,',',nombre) LIKE '%$buscado%' OR user LIKE '%$buscado%'";
}else{
    $complemento='WHERE habilitado=1';
}
$consulta="SELECT 
                id_emp,
                CONCAT(apellido,',',nombre)AS nombreAp,
                user,apellido,nombre,mail,habilitado,
                CONCAT(id_ciudad,',',id_prov) AS codCiudad ,
                idprivilegio,
                CONCAT(nomCiudad,',',provincia) AS vive,
                descripcion AS privi
            FROM empleado e
            JOIN ciudad c ON e.id_ciudad=c.idciudad
            JOIN provincia p ON e.id_prov=p.idprovincia
            JOIN privilegios n ON e.idprivilegio=n.idprivilegios $complemento";

$listUser=  consultar($consulta, $conectar);

//CONSULTAS PARA LISTAR PROVINCIAS
$consulta="SELECT * FROM provincia";
$provincias= consultar($consulta,$conectar);
//CONSULTAS PARA LISTAR ciudades
$consulta="SELECT idciudad,id_provincia,concat(nomCiudad,',',provincia)AS ciudad 
            FROM ciudad c
            JOIN provincia p ON c.id_provincia = p.idprovincia";
$ciudades= consultar($consulta,$conectar);
?>
<div id="Alerta"><?php echo $mensajeAlerta?></div>
<!--CUERPO-->
<div class="cuerpo">
	<!-- CONTENEDOR -->
    <div class="contenedor">
	<fieldset>
            <legend>Usuarios de Sistema</legend>
            <form class="left"  action="index.php" method="GET">     
                <input type="hidden" name="op" value="2">
                <input class="busqueda" type="text" name="buscaUser" placeholder="Buscar Usuario..." />
                <input type="image" name="buscar" src="img/lupa.png"/>
            </form>
            <?php
        //SI EL NIVEL DE SESSION ES 0(SUPERSUSUARIO) HABILITO QUE SE PUEDA CARGAR NUEVOS USUARIOS
            if($_SESSION['nivel']== 0){
            ?>
            <input id="newUser" type="button" name="add_user" value="Nuevo Usuario"/>
            <?php
            }
            ?>
                
            <hr/>    
		<table>
		<tr class="titulos">
			<td>Nombre</td>
                        <td>Usuario</td>
                        <td>Rango</td>
                        <td>Direccion</td>
                        <?php
                        if($_SESSION['nivel']<=1){
                        ?>
                        <td>Acciones</td>
                        <?php
                        }
                        ?>
		</tr>
                 <?php
                foreach($listUser as $id => $user):
                    if($user['habilitado']== 1){
                        $claseListado="listado";
                    }else{
                        $claseListado="listado-deshabilitado";
                    }
                ?>
		<tr class="<?php echo $claseListado?>">
			<td><?php echo $user['nombreAp']?></td>
                        <td><?php echo $user['user']?></td>
                        <td><?php echo $user['privi']?></td>
                        <td><?php echo $user['vive']?></td>
                        <?php
                        if($_SESSION['nivel']<=1){
                        ?>
                        <td>
                            <button data-form="form-editar-user-<?php echo $user['id_emp']?>" class="editarUsuario" title="Editar Usuario"></button>
                            <button data-form="form-deshabilitar-user-<?php echo $user['id_emp']?>" class="borrarUsuario" title="Borrar Usuario"></button>
                            <?php require 'usuarios/modificarUser.php';?>
                        </td>
                        <?php
                        }
                        ?>
		</tr>
                <?php
                endforeach;
                ?>
		</table>
	</fieldset>
    </div>
    <?php
        require 'usuarios/nuevoUser.php';
        require 'usuarios/modificarUser.php';
    ?>
</div>
<?php
    require 'usuarios/funcionesExtras.php';
?>
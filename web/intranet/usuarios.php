<?php 

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
                echo 'Error, no se pudo cargar el artista.';
            }
        }
        
    }

//SI ESTA SETEADO USER  SE TRATA DE AGREGAR USUARIO
if(isset($_POST['user'])){
    //foreach para desarmar la cadena que le paso a $_POST['ciudad'], ya que contiene codigo de ciudad y de prov
        $city=explode(',', $_POST['ciudad']);

        //si si esta seteado acc y es igual a 'nuevo', sql=insert
        if(($_POST['acc']=='nuevo')){
            $pass=md5($_POST['pass']);
            $sql = 'INSERT INTO empleado (apellido,nombre,user,pass,mail,id_ciudad,id_prov,idprivilegio) values(?,?,?,?,?,?,?,?)';
        }
        //si si esta seteado acc y es igual a 'editar', sql=update
        if($_POST['acc']=='editar'){
            //$sql = 'UPDATE producto SET titulo=?, idartista=?, idgenero=?, anio=?, stock=?, precio=? WHERE idproducto=?';$stmt = $conectar->prepare($sql);
        }
        
        $stmt = $conectar->prepare($sql);
        $stmt->bindParam(1, $_POST['apellido'],PDO::PARAM_STR);
        $stmt->bindParam(2, $_POST['nombre'],PDO::PARAM_STR);
        $stmt->bindParam(3, $_POST['user'],PDO::PARAM_STR);
        $stmt->bindParam(4, $pass,PDO::PARAM_STR);
        $stmt->bindParam(5, $_POST['mail'], PDO::PARAM_STR);
        $stmt->bindParam(6, $city[0], PDO::PARAM_INT);
        $stmt->bindParam(7, $city[1], PDO::PARAM_INT);
        $stmt->bindParam(8, $_POST['privi'], PDO::PARAM_INT);
        
       try{
            $stmt->execute();
        }catch (PDOException $e){
            echo 'Lo sentimos, no se pudo cargar el usuario'.$e->getMessage();
        }
   }    
   
//CONSULTA DE LISTAR PRIVILEGIOS
$consulta="SELECT * FROM privilegios";
$privilegios= consultar($consulta,$conectar);


$consulta="SELECT id_emp,concat(apellido,',',nombre)AS nombre,user,mail,concat(nomCiudad,',',provincia) AS vive,descripcion AS privi
            FROM empleado e
            JOIN ciudad c ON e.id_ciudad=c.idciudad
            JOIN provincia p ON e.id_prov=p.idprovincia
            JOIN privilegios n ON e.idprivilegio=n.idprivilegios";
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

<!--CUERPO-->
<div class="cuerpo">
	<!-- CONTENEDOR -->
    <div class="contenedor">
	<fieldset>
		<legend>Usuarios de Sistema</legend>
		<table>
		<tr class="titulos">
			<td>Nombre</td>
                        <td>Usuario</td>
                        <td>Rango</td>
                        <td>Direccion</td>
                        <td>Acciones</td>
		</tr>
                 <?php
                foreach($listUser as $id => $user):
                ?>
		<tr class="listado">
			<td><?php echo $user['nombre']?></td>
                        <td><?php echo $user['user']?></td>
                        <td><?php echo $user['privi']?></td>
                        <td><?php echo $user['vive']?></td>
                        <td><button data-form="form-editar-user-<?php echo $user['id_emp']?>" class="editar" title="Editar Usuario"></button><button class="borrar" title="Borrar Usuario"></button></td>
		</tr>
                <?php
                endforeach;
                ?>
		</table>
	</fieldset>
    </div>
    <!-- PANEL -->
    <div class="panel">
        
        <?php
        if($_SESSION['nivel']== 0){
        ?>
	<fieldset>
            <legend>Gesti&oacute;n de Usuarios</legend>
            <input id="newUser" type="button" name="add_user" value="Nuevo Usuario"/>
            <input id="modUser" type="button" name="del_user" value="Editar Usuario"/>
	</fieldset>
        <?php
        }
        ?>
    </div>
    <?php
        require 'usuarios/nuevoUser.php';
        require 'usuarios/modificarUser.php';
    ?>
</div>
<?php
    require 'usuarios/funcionesExtras.php';
?>
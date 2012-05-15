<?php 

if(isset($_POST['user'])){
        
        //si si esta seteado acc y es igual a 'nuevo', sql=insert
        if(($_POST['acc']=='nuevo')){
            $pass=md5($_POST['pass']);
            $sql = 'INSERT INTO empleado (apellido,nombre,user,pass,mail,id_ciudad,id_prov) values(?,?,?,?,?,?,?)';
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
        $stmt->bindParam(6, $_POST['ciudad'], PDO::PARAM_INT);
        $stmt->bindParam(7, $_POST['prov'], PDO::PARAM_INT);
        
       try{
            $stmt->execute();
        }catch (PDOException $e){
            echo 'Lo sentimos, no se pudo cargar el usuario'.$e->getMessage();
        }
   }    
   
?>

<!--CUERPO-->
<div class="cuerpo">
	<!-- CONTENEDOR -->
    <div class="contenedor">
	<fieldset>
		<legend>Usuarios en D&eacute;ficit</legend>
		<table>
		<tr class="titulos">
			<td>NOMBRE Y APELLIDO</td><td>APODO</td><td>TELEFONO</td><td>DOMICILIO</td>
		</tr>
		<tr class="listado">
			<td>Luis Torres</td><td>El Mala Leche</td><td>2965-15367899</td><td>Playa Union-Chubut</td>
		</tr>
		<tr class="listado">
			<td>Luis Arrix</td><td>El Pirata</td><td>2965-15534277</td><td>Rawson-Chubut</td>
		</tr>
		<tr class="listado">
			<td>Leonardo Quiroga</td><td>Leo y lso del Fuego</td><td>2965-15662733</td><td>Rawson-Chubut</td>
		</tr>
		<tr class="listado">
			<td>Enzo Ana</td><td>El Rojo Nunca Gana</td><td>2965-15747462</td><td>Trelew-Chubut</td>
		</tr>
		<tr class="listado">
			<td>Florencia Morado</td><td>FlopiSubmarino</td><td>2965-15663739</td><td>Playa Union-Chubut</td>
		</tr>
		<tr class="listado">
			<td>Arnaldo Ardiles</td><td>TristeHinchaDeUnion</td><td>2965-15674453</td><td>Trelew-Chubut</td>
		</tr>
		<tr class="listado">
			<td>Viviana Jarra</td><td>Vivi</td><td>2965-15453434</td><td>Trelew-Chubut</td>
		</tr>
		</table>
	</fieldset>
    </div>
    <!-- PANEL -->
    <div class="panel">
	<fieldset>
		<legend>Gesti&oacute;n de Usuarios</legend>
			<input id="newUser" type="button" name="add_user" value="Nuevo Usuario"/>
			<input id="delUser" type="button" name="del_user" value="Borrar / Editar"/>
	</fieldset>
    </div>
    <?php
        require 'usuarios/nuevoUser.php';
    ?>
			
    <!-- FORMULARIO PARA AGREGAR O EDITAR USUARIOS -->
    <div id="delUsuario" title="Borrar / Editar">
        	<p>Seleccione Usuario</p>
		<form action="" method="POST">
			<select id="selecccion">
				<option value="1">Stock-Pepe</option>
				<option value="2">Compras-Pepa</option>
				<option value="3">Ventas-Mario</option>
				<option value="4">Admin-Jose</option>
			</select>
		</form>
			
		<div id="modUsuario" title="Modificar Usuario">
			<form class="panelUser" action="mod_user.html" method="GET">
				<label class="formulario">Nombre:</label>
				<input type="text" name="nombre" value="Sapo Pepe"><br/>
				<label class="formulario">Usuario:</label>
				<input type="text" name="user" value="Stock-Pepe"><br/>
				<label class="formulario">Contrase&ntilde;a:</label>
				<input type="text" name="pass" value="536355"><br/>
			</form>	
		</div>
    </div>
</div>
<?php
    echo 'prueba de coneccion';
    $query="select * from provincia";
    try{
    $statement= $pdo->query($query);
    }  catch (PDOException $e){
        echo 'Error en la consulta:'.$e->getMessage();
    }
    $resultado=$statement->fetch(PDO::FETCH_ASSOC);    
    
    foreach($resultado as $codigo=>$prov):
        echo $codigo['idprovincia'].' = '.$prov['provincia'];
    endforeach;
?>
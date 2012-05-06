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
    <!-- FORMULARIO PARA AGREGAR USUARIOS -->
    <div id="newUsuario" title="Nuevo Usuario">
		<p id="titAlert" class="validateTips">Rellene todos los campos</p>
                <form id="addUser" action="../Usuario" method="POST">
			<label class="formulario">Nombre:</label>
			<input id="name" type="text" name="nombre" class="text ui-widget-content ui-corner-all"><br/>	
			<label class="formulario">Usuario:</label>
			<input id="user" type="text" name="user" class="text ui-widget-content ui-corner-all"><br/>
			<label class="formulario">Contrase&ntilde;a:</label>
			<input id="password" type="password" name="pass" class="text ui-widget-content ui-corner-all"><br/>
		</form>
    </div>
			
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
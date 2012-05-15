 <!-- FORMULARIO PARA AGREGAR USUARIOS -->
    <div id="newUsuario" title="Nuevo Usuario">
	<p id="titAlert" class="validateTips">Rellene todos los campos</p>
        <form id="addUser" action="index.php?op=2" method="POST">
            <input type="hidden" name="acc" value="nuevo">
            <label>Nombre:</label>
            <input id="name" type="text" name="nombre"><br/>	
            <label>Apellido:</label>
            <input id="apellido" type="text" name="apellido"><br/>	
            <label>Usuario:</label>
            <input id="user" type="text" name="user"><br/>
            <label>Contrase&ntilde;a:</label>
            <input id="password" type="password" name="pass"><br/>
            <label>Correo Electr&oacute;nico:</label>
            <input id="user" type="email" name="mail"><br/>
            <label>Ciudad:</label>
            <input id="user" type="text" name="ciudad"><br/>
            <label>Provincia:</label>
            <input id="user" type="text" name="prov"><br/>
	</form>
    </div>

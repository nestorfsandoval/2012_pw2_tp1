		<div class="cuerpo">
			<fieldset>
				<legend>Control de Stock</legend>
				<form class="left" action="" method="get">
					<input  class="busqueda" type="text" name="busqueda" value="Ingrese Busqueda..." size="50" />
					<input type="image" name="buscar" src="img/lupa.png"/>
				</form>
				<form class="right">
					<input type="button" id="addProdu" name="nuevodisco" value="Agregar Producto"/>
				</form>
				
				<form id="newProdu" class="panelUser" action="" method="POST" title="Nuevo Disco">
					<p id="titAlert" class="validateTips">Rellene todos los campos</p>
					<label class="formulario">Titulo:</label>
					<input type="text" name="titulo" id="titulo"><br/>
					<label class="formulario">Interprete:</label>
					<input type="text" name="interprete" id="interprete"><br/>
					<label class="formulario">A?o:</label>
					<input type="text" name="anio" id="anio"><br/>
					<label class="formulario">Cant. Inicial:</label>
					<input type="text" name="cant" id="cant"><br/>
					<label class="formulario">Genero:</label>
					<select class="formulario" name="genero" id="genero" >
						<option value="Cumbia">Cumbia</option>
						<option value="Rock">Rock</option>
						<option value="Pop_Internacional">Pop Internacional</option>
						<option value="Folcklore">Folcklore</option>
						<option value="Reggaeton">Reggaeton</option>
						<option value="Reagge">Reagge</option>
					</select>
					
					<label class="formulario">Precio:</label>
					<input type="text" name="genero" id="valor"><br/>
				</form>
				<hr />
				<table id="tablaStock">
				<tr class="titulos">
					<td>CODIGO</td><td>TITULO</td><td>INTERPRETE</td><td>CANTIDAD</td><td>GENERO</td><td>ACCION</td>
				</tr>
				<tr id="disco1" class="listado">
					<td>CUMB006</td><td>Malagata</td><td>Malagata</td><td>4</td><td>Cumbia</td>
					<td>
					<img src="img/add.png" width="15px" title="Agregar" alt="Agregar Stock" class="mas"/>
					<form class="addStock" method="post">
						<input type="text" name="addCant" size="2"/>
						<input type="image" class="ui-icon ui-icon-plusthick" name="agregar"/>
					</form>|
					<img src="img/edit.gif" width="18px" title="Editar" alt="Editar Carga" id="editProdu"/>
					</td>
				</tr>
				<tr id="disco2" class="listado">
					<td>ROCK673</td><td>El Reino Olvidado</td><td>Rata Blanca</td><td>6</td><td>Rock</td>
					<td>
					<img src="img/add.png" width="15px" title="Agregar" alt="Agregar Stock" class="mas"/>
					<form class="addStock" method="post"><input type="text" name="addCant" size="2" /><input type="image" class="ui-icon ui-icon-plusthick" name="agregar"></form>|
					<img src="img/edit.gif" width="18px" title="Editar" alt="Editar Carga" id="editProdu"/>
					</td>
				</tr>
				<tr id="disco3" class="listado">
					<td>POP_345</td><td>Born This Way</td><td>Lady Gaga</td><td>44</td><td>Pop Internacional</td>
					<td>
					<img src="img/add.png" width="15px" title="Agregar" alt="Agregar Stock" class="mas"/>
					<form class="addStock" method="post"><input type="text" name="addCant" size="2" /><input type="image" class="ui-icon ui-icon-plusthick" name="agregar"></form>|
					<img src="img/edit.gif" width="18px" title="Editar" alt="Editar Carga" id="editProdu"/>
					</td>
				</tr>
				<tr id="disco4" class="listado">
					<td>FOLK036</td><td>Signos</td><td>Los Nocheros</td><td>23</td><td>Folcklore</td>
					<td>
					<img src="img/add.png" width="15px" title="Agregar" alt="Agregar Stock" class="mas"/>
					<form class="addStock" method="post"><input type="text" name="addCant" size="2" /><input type="image" class="ui-icon ui-icon-plusthick" name="agregar"></form>|
					<img src="img/edit.gif" width="18px" title="Editar" alt="Editar Carga" id="editProdu"/>
					</td>
				</tr>
				<tr id="disco5" class="listado">
					<td>REGT067</td><td>Taboo</td><td>Don Omar</td><td>12</td><td>Reggaeton</td>
					<td>
					<img src="img/add.png" width="15px" title="Agregar" alt="Agregar Stock" class="mas"/>
					<form class="addStock" method="post"><input type="text" name="addCant" size="2" /><input type="image" class="ui-icon ui-icon-plusthick" name="agregar"></form>|
					<img src="img/edit.gif" width="18px" title="Editar" alt="Editar Carga" id="editProdu"/>
					</td>
				</tr>
				<tr id="disco6" class="listado">
					<td>ROCK054</td><td>Imagine</td><td>Jhon Lennon</td><td>19</td><td>Rock</td>
					<td>
					<img src="img/add.png" width="15px" title="Agregar" alt="Agregar Stock" class="mas"/>
					<form class="addStock" method="post"><input type="text" name="addCant" size="2" /><input type="image" class="ui-icon ui-icon-plusthick" name="agregar"></form>|
					<img src="img/edit.gif" width="18px" title="Editar" alt="Editar Carga" id="editProdu"/>
					</td>
				</tr>
				<tr id="disco7" class="listado">
					<td>REGG349</td><td>Exodus</td><td>Bob Marley</td><td>42</td><td>Reggae</td>
					<td>
					<img src="img/add.png" width="15px" title="Agregar" alt="Agregar Stock" class="mas"/>
					<form class="addStock" method="post"><input type="text" name="addCant" size="2" /><input type="image" class="ui-icon ui-icon-plusthick" name="agregar"></form>|
					<img src="img/edit.gif" width="18px" title="Editar" alt="Editar Carga" id="editProdu"/>
					</td>
				</tr>
				<tr id="disco8" class="listado">
					<td>CUMB052</td><td>Disco de Oro</td><td>Nueva Luna</td><td>7</td><td>Cumbia</td>
					<td>
					<img src="img/add.png" width="15px" title="Agregar" alt="Agregar Stock" class="mas"/>
					<form class="addStock" method="post"><input type="text" name="addCant" size="2" /><input type="image" class="ui-icon ui-icon-plusthick" name="agregar"></form>|
					<img src="img/edit.gif" width="18px" title="Editar" alt="Editar Carga" id="editProdu"/>
					</td>
				</tr>
				<tr id="disco9" class="listado">
					<td>REGG348</td><td>Legend</td><td>Bob Marley</td><td>3</td><td>Reggae</td>
					<td>
					<img src="img/add.png" width="15px" title="Agregar" alt="Agregar Stock" class="mas"/>
					<form class="addStock" method="post"><input type="text" name="addCant" size="2" /><input type="image" class="ui-icon ui-icon-plusthick" name="agregar"></form>|
					<img src="img/edit.gif" width="18px" title="Editar" alt="Editar Carga" id="editProdu"/>
					</td>
				</tr>
				</table>
			</fieldset>	
                </div>	
		<div id="editarDisco" title="Modificar Disco">
			<p id="editAlert" class="validateTips"></p>
			<form action="" method="POST">
			<label class="formulario">Codigo</label>
			<input type="text" name="cod"disabled="true" id="cod" value="CUMB006"><br/>
			<label class="formulario">Titulo</label>
			<input type="text" name="tit" id="tit" value="Malagata" ><br/>
			<label class="formulario">Interprete:</label>
			<input type="text" name="interprete" id="inter" value="Malagata"><br/>
			<label class="formulario">A?o:</label>
			<input type="text" name="anio" id="anual" value="1992"><br/>
			<label class="formulario">Genero:</label>
			<select name="genero" id="gen" >
						<option value="Cumbia" selected="selected">Cumbia</option>
						<option value="Rock">Rock</option>
						<option value="Pop_Internacional">Pop Internacional</option>
						<option value="Folcklore">Folcklore</option>
						<option value="Reggaeton">Reggaeton</option>
						<option value="Reagge">Reagge</option>
			</select>
			<label class="formulario">Cantidad:</label>
			<input type="text" name="cant" id="cantidad" value="4"><br/>
			<label class="formulario">Precio:</label>
			<input type="text" name="genero" id="precio" value="20.00"><br/>
			</form>
                </div>
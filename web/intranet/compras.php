<div class="cuerpo">
	<fieldset>
		<legend>Control de Stock</legend>
                <form class="left" id="frm_btn_list" action="" method="get">
			<input class="busqueda" type="text" name="busqueda" value="Ingrese Busqueda..." />
			<label>Desde:</label>
                        <input class="fecha" id="fechad" type="text" name="desdefecha" MAXLENGTH="10" value="dd/mm/aaaa"/>
                        <label>Hasta:</label>
			<input class="fecha" id="fechah" type="text" name="hastafecha" MAXLENGTH="10" value="dd/mm/aaaa"/><br/>
			<input class="listar" id="btn_list" type="submit" name="listar" value="Listar"/>
		</form>
		<form class="right">
			<input type="button" name="nuevocompra" value="Agregar Compra" id="nuevaCompra" />
		</form>
		<form id="agregaCompra" class="panelUser" action="" method="POST" title="Agregar Compra">
			<p id="titAlert" class="validateTips">Rellene todos los campos</p>
				<label class="formulario">Proveedor:</label>
				<input type="text" name="proveedor" id="proveedor"><br/>
				<label class="formulario">Fecha:</label>
				<input type="text" name="fecha" id="fechaCompra"><br/>
				<label class="formulario">N&deg; Factura</label>
				<input type="text" name="factura" id="factura"><br/>
				<label class="formulario">Monto</label>
				<input type="text" name="monto" id="montoCompra"><br/>
				<label class="formulario">Remito</label>
				<input type="text" name="remito" id="remito"><br/>
		</form>
		<hr/>
		<table>
		<tr class="titulos">
			<td>FECHA</td><td>PROVEEDOR</td><td>N&deg; FACTURA</td><td>MONTO</td><td>REMITO</td><td>EDITAR</td>
		</tr>
		<tr class="listado">
			<td>2011/09/30</td><td>Warner Music</td><td>0070632/11</td><td>$ 123772,00</td><td>6</td>
			<td>
				<img src="img/edit.gif" width="18" title="Editar" alt="Editar Carga" id="editCompra"/>
			</td>
		</tr>
		<tr class="listado">
			<td>2011/09/30</td><td>EMI</td><td>23776-11</td><td>$ 123772,00</td><td>45</td>
			<td>
				<img src="img/edit.gif" width="18" title="Editar" alt="Editar Carga" />
			</td>
		</tr>
		<tr class="listado">
			<td>2011/09/29</td><td>Elefant Records</td><td>001543-11-7</td><td>$ 123772,00</td><td>33</td>
			<td>
				<img src="img/edit.gif" width="18" title="Editar" alt="Editar Carga" />
			</td>
		</tr>
		<tr class="listado">
			<td>2011/09/1</td><td>EMI</td><td>22299-11</td><td>$ 123772,00</td><td>30</td>
			<td>
				<img src="img/edit.gif" width="18" title="Editar" alt="Editar Carga" />
			</td>
		</tr>
		<tr class="listado">
			<td>2011/09/1</td><td>Warner Music</td><td>0063645/11</td><td>$ 123772,00</td><td>26</td>
			<td>
				<img src="img/edit.gif" width="18" title="Editar" alt="Editar Carga" />
			</td>
		</tr>
		<tr class="listado">
			<td>2011/09/1</td><td>Sony Music</td><td>00029265/8</td><td>$ 123772,00</td><td>22</td>
			<td>
				<img src="img/edit.gif" width="18" title="Editar" alt="Editar Carga" />
			</td>
		</tr>
		<tr class="listado">
			<td>2011/08/28</td><td>Elefant Records</td><td>001652-11-8</td><td>$ 123772,00</td><td>20</td>
			<td>
				<img src="img/edit.gif" width="18" title="Editar" alt="Editar Carga" />
			</td>
		</tr>
		<tr class="listado">
			<td>2011/08/28</td><td>EMI</td><td>21821-11</td><td>$ 123772,00</td><td>18</td>
			<td>
				<img src="img/edit.gif" width="18" title="Editar" alt="Editar Carga" />
			</td>
		</tr>
		<tr class="listado">
			<td>2011/08/15</td><td>Warner Music</td><td>0060932/11</td><td>$ 123772,00</td><td>11</td>
			<td>
				<img src="img/edit.gif" width="18" title="Editar" alt="Editar Carga" />
			</td>
		</tr>
		</table>
	</fieldset>
</div>
<div id="editarCompra" title="Editar Compra">
	<p id="titAlert" class="validateTips">Rellene todos los campos</p>
	<form  class="panelUser" action="" method="POST">
		<label class="formulario">Proveedor:</label>
		<input type="text" name="proveedor" value="Warner Music" id="modproveedor"><br/>
		<label class="formulario">Fecha:</label>
		<input type="text" name="fecha" value="30/09/2011" id="modfechaCompra"><br/>
		<label class="formulario">N&deg; Factura</label>
		<input type="text" name="factura" value="0070632-11" id="modfactura"><br/>
		<label class="formulario">Monto</label>
		<input type="text" name="monto" value="123772,00" id="modmontoCompra"><br/>
		<label class="formulario">Remito</label>
		<input type="text" name="remito" value="6" id="modremito"><br/>
	</form>
</div>
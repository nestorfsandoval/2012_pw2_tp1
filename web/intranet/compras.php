<?php
require_once '../funciones/conectar.php';
  if(isset($_GET['listar'])&& ($_GET['listar']== 'Listar'))
  {
    $lafecha = $_GET['desdefecha'];
    preg_match( "/([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{2,4})/", $lafecha, $ftrunc); 
    $fdesde=$ftrunc[3]."-".$ftrunc[2]."-".$ftrunc[1]; 
    
    $lafecha = $_GET['hastafecha'];
    preg_match( "/([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{2,4})/", $lafecha, $ftrunc); 
    $fhasta=$ftrunc[3]."-".$ftrunc[2]."-".$ftrunc[1]; 

    $query = "SELECT * FROM compra WHERE fecha >= '".$fdesde."' AND fecha <='". $fhasta."'" ;
    $resultados = consultar($query,$conectar);

  }else{
   $query = "SELECT * FROM compra" ;
    $resultados = consultar($query,$conectar);
    consultar($query,$conectar);
  }

?>

<div class="cuerpo">
	<fieldset>
		<legend>Control de Stock</legend>
      <form class="left" id="frm_btn_list" action="index.php" method="GET">     
        <input type="hidden" name="op" value="4">
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
    
    <?php foreach($resultados as $fila)
    {
      echo "<tr>";
        foreach($fila as $campito){
          echo "<td>".$campito."</td>";
        }
      echo "</tr>";
    }
    ?>
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
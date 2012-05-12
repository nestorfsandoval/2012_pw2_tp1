<?php
    $consulta="SELECT * FROM genero";
    $genero= consultar($consulta,$conectar);
    
    $consulta="SELECT * FROM artista";
    $artista= consultar($consulta,$conectar);
    
?>
<!--DIV DE LISTADO DE ARTICULOS-->
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
            <label class="formulario">A&ntilde;o:</label>
            <input type="text" name="anio" id="anio"><br/>
            <label class="formulario">Cant. Inicial:</label>
            <input type="text" name="cant" id="cant"><br/>
            <label class="formulario">Genero:</label>
            <select class="formulario" name="genero" id="genero" >
                <?php 
                foreach($genero as $id => $gro):
                    echo '<option value='.$gro['idgenero'].'>'.$gro['tipo'].'</option>';
                endforeach;
                ?>
            </select>
            <label class="formulario">Precio:</label>
            <input type="text" name="genero" id="valor"><br/>
        </form>
        <hr />

        <table id="tablaStock">
            <tr class="titulos">		
                <td>CODIGO</td>
                <td>TITULO</td>
                <td>INTERPRETE</td>
                <td>CANTIDAD</td>
                <td>GENERO</td>
                <td>ACCION</td>
            </tr>		
            <tr id="disco1" class="listado">
                <td>CUMB006</td>
                <td>Malagata</td>
                <td>Malagata</td>
                <td>4</td>
                <td>Cumbia</td>
                <td>
                    <img src="img/add.png" width="15px" title="Agregar" alt="Agregar Stock" class="mas"/>
                    <form class="addStock" method="post">
                        <input type="text" name="addCant" size="2"/>
                        <input type="image" class="ui-icon ui-icon-plusthick" name="agregar"/>
                    </form>|
                    <img src="img/edit.gif" width="18px" title="Editar" alt="Editar Carga" id="editProdu"/>
                </td>
            </tr>
        </table>
    </fieldset>	
</div>	
<!--DIV DE MODIFICACION-->
<div id="editarDisco" title="Modificar Disco">
    <p id="editAlert" class="validateTips"></p>
    <form action="" method="POST">
        <label class="formulario">C&oacute;digo</label>
        <input type="text" name="cod"disabled="true" id="cod" value="CUMB006"><br/>
        <label class="formulario">T&iacute;tulo</label>
        <input type="text" name="tit" id="tit" value="Malagata" ><br/>
        <label class="formulario">Interprete:</label>
        <input type="text" name="interprete" id="inter" value="Malagata"><br/>
        <label class="formulario">A&ntilde;o:</label>
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
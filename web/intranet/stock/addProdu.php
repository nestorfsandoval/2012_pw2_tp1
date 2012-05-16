<form id="newProdu" class="panelUser" action="index.php" method="GET" title="Nuevo Disco">
    <!-- ESTE INPUT OCULTO INDICA A QUE CONTENIDO DEBE MANDARLE LOS VALORES DEL FORMULARIO -->
    <input type="hidden" name="op" value="3">
    <input type="hidden" name="acc" value="nuevo">
    <p id="titAlert" class="validateTips">Rellene todos los campos</p>
    <label class="formulario">Titulo:</label>
    <input type="text" name="titulo" id="titulo"><br/>
    <label class="formulario">Interprete:</label>
    <select class="nartista" name="interprete" id="interprete" >
            <?php 
            foreach($artista as $id => $art):
                echo '<option value='.$art['idartista'].'>'.$art['nombre'].'</option>';
            endforeach;
            ?>
         <option value="nuevo">-->Agregar Artista<--</option>
    </select>
    <label class="formulario">A&ntilde;o:</label>
    <input type="text" name="anio" id="anio"><br/>
    <label class="formulario">Cant. Inicial:</label>
    <input type="text" name="cant" id="cant"><br/>
    <label class="formulario">Genero:</label>
    <select class="ngenero" name="genero" id="genero" >
            <?php
            foreach($genero as $id => $gro):
                echo '<option value='.$gro['idgenero'].'>'.$gro['tipo'].'</option>';
            endforeach;
            ?>
        <option value="nuevo">-->Agregar Genero<--</option>
    </select>
    <label class="formulario">Precio:</label>
    <input type="text" name="valor" id="valor"><br/>
</form>
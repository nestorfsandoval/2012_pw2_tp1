  <form id="form-editar-disco-<?php echo $produ['idproducto']?>" class="editarDisco" title="Modificar Disco" action="index.php" method="GET">
        <p id="editAlert" class="validateTips"></p>
        <input type="hidden" name="op" value="3">
        <input type="hidden" name="acc" value="editar">
        <label class="formulario">C&oacute;digo</label>
        <input type="hidden" name="cod" value="<?echo $produ['idproducto']?>">
        <input type="text" disabled="true" id="cod" value="<?echo $produ['idproducto']?>"/><br/>
        <label class="formulario">T&iacute;tulo</label>
        <input type="text" name="titulo" id="tit" value="<?echo $produ['titulo']?>" ><br/>
        <select class="artista" name="interprete" id="interprete" >
            <?php
            foreach($artista as $id => $art):
                if($art['nombre']==$produ['nombre'])
                    echo '<option value='.$art['idartista'].' selected>'.$art['nombre'].'</option>';
                else
                    echo '<option value='.$art['idartista'].'>'.$art['nombre'].'</option>';
                endforeach;
            ?>
            <option value="nuevo">-->Agregar Artista<--</option>
        </select>
        <label class="formulario">A&ntilde;o:</label>
        <input type="text" name="anio" id="anual" value="<?echo $produ['anio']?>"><br/>
        <label class="formulario">Genero:</label>
        <select class="genero" name="genero" id="genero" >
            <?php 
            foreach($genero as $id => $gro):
                //SI PRODUCTO ES IGUAL OPCION LO DEJO SELECCIONADO
                if($gro['tipo']==$produ['tipo']){
                    echo '<option value='.$gro['idgenero'].' selected>'.$gro['tipo'].'</option>';
                }else{
                    echo '<option value='.$gro['idgenero'].'>'.$gro['tipo'].'</option>';
                }
                endforeach;   
            ?>
            <option value="nuevo">-->Agregar Genero<--</option>
        </select>
        <label class="formulario">Cantidad:</label>
        <input type="text" name="cant" id="cantidad" value="<?echo $produ['stock']?>"><br/>
        <label class="formulario">Precio:</label>
        <input type="text" name="valor" id="precio" value="<?echo $produ['precio']?>"><br/>
    </form>

<div id="editarDisco" title="Modificar Disco">
    <p id="editAlert" class="validateTips"></p>
    <form action="" method="POST">
        <input type="hidden" name="op" value="3">
        <input type="hidden" name="acc" value="editar">                        
        <label class="formulario">C&oacute;digo</label>
        <input type="text" name="cod"disabled="true" id="cod" value="<?echo $produ['idproducto']?>"/><br/>
        <label class="formulario">T&iacute;tulo</label>
        <input type="text" name="tit" id="tit" value="<?echo $produ['titulo']?>" ><br/>
        <select class="formulario" name="interprete" id="interprete" >
            <?php
            foreach($artista as $id => $art):
                if($art['nombre']==$produ['nombre'])
                    echo '<option value='.$art['idartista'].' selected>'.$art['nombre'].'</option>';
                else
                    echo '<option value='.$art['idartista'].'>'.$art['nombre'].'</option>';
                endforeach;
            ?>
        </select>
        <label class="formulario">A&ntilde;o:</label>
        <input type="text" name="anio" id="anual" value="<?echo $produ['anio']?>"><br/>
        <label class="formulario">Genero:</label>
        <select class="formulario" name="genero" id="genero" >
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
        </select>
        <label class="formulario">Cantidad:</label>
        <input type="text" name="cant" id="cantidad" value="<?echo $produ['stock']?>"><br/>
        <label class="formulario">Precio:</label>
        <input type="text" name="genero" id="precio" value="<?echo $produ['precio']?>"><br/>
    </form>
</div>
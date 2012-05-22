<!-- FORMULARIO PARA AGREGAR O EDITAR USUARIOS -->
<form id="form-editar-user-<?php echo $user['id_emp']?>" class="editarUser" action="index.php?op=2" method="POST" title="Modificar Usuario">
        <input type="hidden" name="acc" value="editar">
        <input type="hidden" name="user" value="<?php echo $user['user']?>">        
        <input type="hidden" name="empleado" value="<?php echo $user['id_emp']?>">        
        <label>Nombre:</label>
        <input id="mname" type="text" name="nombre" value="<?php echo $user['nombre']?>"><br/>	
        <label>Apellido:</label>
        <input id="mapellido" type="text" name="apellido" value="<?php echo $user['apellido']?>"><br/>	
        <label>Correo Electr&oacute;nico:</label>
        <input id="memail" type="email" name="mail" value="<?php echo $user['mail']?>"><br/>
        <label>Ciudad:</label>
        <select class="ciudad" name="ciudad" id="mciudad">
            <option value="0">-->Eliga una Ciudad<--</option>
            <?php 
                foreach($ciudades as $id => $city):
                    if($user['codCiudad']==($city['idciudad'].','.$city['id_provincia'])){
                        echo '<option value="'.$city['idciudad'].','.$city['id_provincia'].'" selected>'.$city['ciudad'].'</option>'; 
                    }else{
                        echo '<option value="'.$city['idciudad'].','.$city['id_provincia'].'">'.$city['ciudad'].'</option>';
                    }
                endforeach;
            ?>
            <option value="nueva">-->Nueva Ciudad<--</option>
        </select>
        <label>Privilegios:</label>
        <select name="privi">
            <?php 
            foreach($privilegios as $id => $privi):
                if($user['idprivilegio'] == $privi['idprivilegios']){
                    echo '<option value='.$privi['idprivilegios'].' selected>'.$privi['descripcion'].'</option>';
                }else{
                    echo '<option value='.$privi['idprivilegios'].'>'.$privi['descripcion'].'</option>';
                }
            endforeach;
            ?>
        
        </select>
</form>	

<form id="form-deshabilitar-user-<?php echo $user['id_emp']?>" action="index.php?op=2" method="POST" class="borrarUser" title="Deshabilitar Usuario">
    <p><span class="alert"></span>Seguro desea Deshabilitar este usuario?</p>
    <input type="hidden" name="deshabilitar" value="<?php echo $user['id_emp']?>">
    <input type="hidden" name="privi" value="<?php echo $user['idprivilegio']?>">
</form>
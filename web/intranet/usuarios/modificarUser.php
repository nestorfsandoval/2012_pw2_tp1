<!-- FORMULARIO PARA AGREGAR O EDITAR USUARIOS -->
<form id="form-editar-user-<?php echo $user['id_emp']?>" class="editarUser" action="index.php?op=2" method="POST" title="Modificar Usuario">
        <input type="hidden" name="acc" value="editar">
        <label>Nombre:</label>
        <input id="name" type="text" name="mnombre" value="<?php echo $user['nombre']?>"><br/>	
        <label>Apellido:</label>
        <input id="apellido" type="text" name="mapellido" value="<?php echo $user['apellido']?>"><br/>	
        <label>Correo Electr&oacute;nico:</label>
        <input id="user" type="email" name="mmail" value="<?php echo $user['mail']?>"><br/>
        <label>Ciudad:</label>
        <select class="ciudad" name="mciudad" id="ciudad">
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
        <select name="mprivi">
            <?php 
            foreach($privilegios as $id => $privi):
                echo '<option value='.$privi['idprivilegios'].'>'.$privi['descripcion'].'</option>';
            endforeach;
            ?>
        
        </select>
</form>	

<form id="form-deshabilitar-user-<?php echo $user['id_emp']?>" action="index.php?op=2" method="POST" class="borrarUser" title="Deshabilitar Usuario">
    <p><span class="alert"></span>Seguro desea Deshabilitar este usuario?</p>
    <input type="hidden" name="deshabilitar" value="<?php echo $user['id_emp']?>">
</form>
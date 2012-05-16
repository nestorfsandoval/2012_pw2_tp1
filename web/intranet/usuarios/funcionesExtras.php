<form id="nuevaCiudad" method="get" action="index.php" title="Nuevo Ciudad">	
    <input type="hidden" name="op" value="2" />
    <label>Nombre de Ciudad:</label>
    <input type="text" name="nCiud" id="nCiudad" />
    <label>Provincia:</label>
    <select name="prov">
            <?php 
            foreach($provincias as $id => $prov):
                echo '<option value='.$prov['idprovincia'].'>'.$prov['provincia'].'</option>';
            endforeach;
            ?>
    </select>
    <label>C&oacute;digo Postal:</label>
    <input type="text" name="cp" />
</form>
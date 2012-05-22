<form class="addStock" action="index.php?op=3" method="POST">
    <input type="hidden" name="idProdu" value="<?php echo$produ['idproducto']?>">
    <input type="hidden" name="cant" value="<?php echo$produ['stock']?>">
    <input type="text" name="addCant" size="2"/>                                
    <input type="image" class="ui-icon ui-icon-plusthick" name="agregar"/>
</form>
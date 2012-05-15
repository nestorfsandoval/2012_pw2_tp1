<?php
$consulta="SELECT artista.nombre as nombre, producto.titulo as titulo, genero.tipo as genero 
                          FROM artista JOIN producto 
                          ON 
                          producto.idartista = artista.idartista
                          JOIN genero
                          ON
                          producto.idgenero=genero.idgenero
                          ORDER BY
                          nombre";

$listado= consultar($consulta, $conectar);

?>


<table border = "1">
  
  <?php foreach($listado as $id => $produ):?>
  
        <tr>
        <td><?php echo $produ['nombre']?></td>
        <td><?php echo $produ['titulo']?></td>
        <td><?php echo $produ['genero']?></td>
        </td>
        
  <?php endforeach;?>
 
 </table>

<?php
//Se prepara la consulta a la base de datos con lo que nos interesa mostrar en el catalogo
//y se almacena la consulta en una variable

$consulta="SELECT artista.nombre as nombre, producto.titulo as titulo, genero.tipo as genero 
                          FROM artista JOIN producto 
                          ON 
                          producto.idartista = artista.idartista
                          JOIN genero
                          ON
                          producto.idgenero=genero.idgenero
                          ORDER BY
                          nombre";

//Usando la la funcion se realiza la consulta
$listado= consultar($consulta, $conectar);

?>


<h2 align='center'>Catalogo de Discos [Actualizado al <?php echo date('d/m/Y');?>]</h2>

<table border = "1">
	
		<th> Artista</th>
		<th> Titulo</th>
		<th> Genero</th>
  
  <!-- Se devuelve el contenido del resulset mediante un foreach -->
  <?php foreach($listado as $id => $produ):?>
  
        <tr>
        <td><?php echo $produ['nombre']?></td>
        <td><?php echo $produ['titulo']?></td>
        <td><?php echo $produ['genero']?></td>
        </td>
        
  <?php endforeach;?>
 
 </table>

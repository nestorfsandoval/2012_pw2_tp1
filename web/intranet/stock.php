<?php
//CONSULTAS PARA OPCIONES DE SELECT

    //CONSULTA DE LISTA DE GENEROS DISPONIBLES
    $consulta="SELECT * FROM genero";
    $genero= consultar($consulta,$conectar);
    
    //CONSULTA DE LISTA DE ARTISTAS DISPONIBLES
    $consulta="SELECT * FROM artista";
    $artista= consultar($consulta,$conectar);

    //SI LA ACCION ESTA SETEADA Y ES IGUAL A NUEVO ,CARGO EL PRODUCTO NUEVO
    if(isset($_GET['acc'])&& ($_GET['acc']=='nuevo')){
        $sql = 'INSERT INTO producto (titulo,idartista,idgenero,anio,stock,precio) values(:tit,:art,:gen,:anio,:stock,:precio)';
        $stmt = $conectar->prepare($sql);
        $stmt->bindParam(':tit', $_GET['titulo'],PDO::PARAM_STR);
        $stmt->bindParam(':art', $_GET['interprete'],PDO::PARAM_INT);
        $stmt->bindParam(':gen', $_GET['genero'],PDO::PARAM_INT);
        $stmt->bindParam(':anio', $_GET['anio'],PDO::PARAM_INT);
        $stmt->bindParam(':stock', $_GET['cant'], PDO::PARAM_INT);
        $stmt->bindParam(':precio', $_GET['valor'], PDO::PARAM_STR);
        
       try{
            $stmt->execute();
        }catch (PDOException $e){
            echo 'Error no se pudieron cargar los datos '. $e->getMessage();
        }
   }    
   
   //CONSULTA PARA LISTADO DE ARTICULOS
    $consulta="SELECT 
                    idproducto,titulo,nombre,stock,tipo,anio,precio 
                FROM 
                    producto p
                JOIN 
                    artista a ON p.idartista=a.idartista    
                JOIN 
                    genero g ON p.idgenero=g.idgenero
                ORDER BY 
                    idproducto 
                DESC 
                    limit 10";
    $listado= consultar($consulta,$conectar);
   
?>
<!--DIV DE LISTADO DE ARTICULOS-->
<div class="cuerpo">
    <fieldset>
        <legend>Control de Stock</legend>
        <form class="left" action="stock.php" method="GET">
            <!-- ESTE INPUT OCULTO INDICA A QUE CONTENIDO DEBE MANDARLE LOS VALORES DEL FORMULARIO -->
            <input type="hidden" name="op" value="3">
            <input  class="busqueda" type="text" name="busqueda" value="Ingrese Busqueda..." size="50" />
            <input type="image" name="buscar" src="img/lupa.png"/>
        </form>
        <form class="right">
            <input type="button" id="addProdu" name="nuevodisco" value="Agregar Producto"/>
        </form>
        <?php require_once('stock/addProdu.php');?>
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
            <!--LISTADO DE ULTIMOS 10 PRODUCTOS-->
            <?php
                foreach($listado as $id => $produ):
            ?>
                        <tr id="disco1" class="listado">
                            <td><?php echo$produ['idproducto']?></td>
                            <td><?php echo$produ['titulo']?></td>
                            <td><?php echo$produ['nombre']?></td>
                            <td><?php echo$produ['stock']?></td>
                            <td><?php echo$produ['tipo']?></td>
                            <td>
                                <img src="img/add.png" width="15px" title="Agregar" alt="Agregar Stock" class="mas"/>
                                <?php require_once 'stock/modStock.php';?>|
                                <img src="img/edit.gif" width="18px" title="Editar" alt="Editar Carga" class="editProdu"/>
                                <?php require_once 'stock/modProdu.php';?>
                            </td>
                        </tr>
                        <?php
                    echo '<option value='.$art['idartista'].'>'.$art['nombre'].'</option>';
                endforeach;
            ?>
            
        </table>
    </fieldset>	
</div>	
<!--DIV DE MODIFICACION-->
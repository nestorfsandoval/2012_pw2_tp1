<?php
    //SI ESTA SETEADO nArt ,PREGUNTO SI YA EXISTE, DE ACUERDO A ESTO ,AGREGO NUEVO ARTISTA O NO
    if (isset($_GET['nArt']) && ($_GET['nArt']!='')){
        $nombre=$_GET['nArt'];
        $qry="SELECT * FROM artista WHERE nombre='$nombre'";     
        
        if(!$valida=existenDato($qry, $conectar))
        {
            $sqlArt="INSERT INTO artista (nombre) values(?)";
            $stmt = $conectar->prepare($sqlArt);
            $stmt->bindParam(1, $nombre,PDO::PARAM_STR);
            
            try{
            $stmt->execute();
            }catch (PDOException $e){
                echo 'Error, no se pudo cargar el artista.';
            }
        }
        
    }
    
    //SI ESTA SETEADO nGen ,PREGUNTO SI YA EXISTE, DE ACUERDO A ESTO ,AGREGO NUEVO GENERO O NO
    if (isset($_GET['nGen']) && ($_GET['nGen']!='')){
        $nombre=$_GET['nGen'];
        $qry="SELECT * FROM genero WHERE tipo='$nombre'";     
        
        if(!$valida=existenDato($qry, $conectar))
        {
            $sqlArt="INSERT INTO genero (tipo,descripcion) values(?,?)";
            $stmt = $conectar->prepare($sqlArt);
            $stmt->bindParam(1, $nombre,PDO::PARAM_STR);
            $stmt->bindParam(2, $_GET['desc'],PDO::PARAM_STR);
            
            try{
            $stmt->execute();
            }catch (PDOException $e){
                echo 'Error, no se pudo cargar el G?nero.';
            }
        }
        
    }
    
    //SI LA ACCION ESTA SETEADA Y ES IGUAL A NUEVO ,CARGO EL PRODUCTO NUEVO
    if(isset($_GET['acc'])){        
        //si si esta seteado acc y es igual a 'nuevo', sql=insert
        if(($_GET['acc']=='nuevo')){
            $sql = 'INSERT INTO producto (titulo,idartista,idgenero,anio,stock,precio) values(?,?,?,?,?,?)';
        }
        //si si esta seteado acc y es igual a 'editar', sql=update
        if($_GET['acc']=='editar'){
            $sql = 'UPDATE producto SET titulo=?, idartista=?, idgenero=?, anio=?, stock=?, precio=? WHERE idproducto=?';$stmt = $conectar->prepare($sql);
        }
        
        $stmt = $conectar->prepare($sql);
        $stmt->bindParam(1, $_GET['titulo'],PDO::PARAM_STR);
        $stmt->bindParam(2, $_GET['interprete'],PDO::PARAM_INT);
        $stmt->bindParam(3, $_GET['genero'],PDO::PARAM_INT);
        $stmt->bindParam(4, $_GET['anio'],PDO::PARAM_INT);
        $stmt->bindParam(5, $_GET['cant'], PDO::PARAM_INT);
        $stmt->bindParam(6, $_GET['valor'], PDO::PARAM_STR);
        
        if($_GET['acc']=='editar'){
        $stmt->bindParam(7, $_GET['cod'], PDO::PARAM_INT);
        }
        
       try{
            $stmt->execute();
        }catch (PDOException $e){
            echo 'Error no se pudieron cargar los datos '. $e->getMessage();
        }
   }    
   
    //CONSULTA DE LISTA DE GENEROS DISPONIBLES
    $consulta="SELECT * FROM genero";
    $genero= consultar($consulta,$conectar);
    
    //CONSULTA DE LISTA DE ARTISTAS DISPONIBLES
    $consulta="SELECT * FROM artista";
    $artista= consultar($consulta,$conectar);
   
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
                        <tr id="<?php echo $produ['idproducto'].'-'.$produ['titulo']?>" class="listado">
                            <td><?php echo$produ['idproducto']?></td>
                            <td><?php echo$produ['titulo']?></td>
                            <td><?php echo$produ['nombre']?></td>
                            <td><?php echo$produ['stock']?></td>
                            <td><?php echo$produ['tipo']?></td>
                            <td>
                                <img src="img/add.png" width="15px" title="Agregar" alt="Agregar Stock" class="mas"/>
                                <?php require 'stock/modStock.php';?>|
                                <img data-form="form-editar-disco-<?php echo $produ['idproducto']?>" src="img/edit.gif" width="18px" title="Editar" alt="Editar Carga" class="editProdu"/>
                                <?php require 'stock/modProdu.php';?>
                            </td>
                        </tr>
                        <?php
                    //echo '<option value='.$art['idartista'].'>'.$art['nombre'].'</option>';
                endforeach;
            ?>
            
        </table>
    </fieldset>	
</div>	
<?php
require 'stock/funcionesExtras.php';
?>
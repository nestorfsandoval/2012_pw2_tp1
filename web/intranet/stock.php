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
            $titulo=$_GET['titulo'];
            $artista=$_GET['interprete'];
            $sql="SELECT idproducto,titulo,idartista FROM producto WHERE idartista=$artista AND titulo LIKE '%$titulo%'";
            if(!existenDato($sql, $conectar)){
                $sql = 'INSERT INTO producto (titulo,idartista,idgenero,anio,stock,precio) values(?,?,?,?,?,?)';
            }else{
                $mensajeAlerta="Este Producto ya fue cargado.";
            }
        }
        //si si esta seteado acc y es igual a 'editar', sql=update
        if($_GET['acc']=='editar'){
            $sql = 'UPDATE producto SET titulo=?, idartista=?, idgenero=?, anio=?, stock=?, precio=? WHERE idproducto=?';$stmt = $conectar->prepare($sql);
        }
        
        if(!$mensajeAlerta){
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
                $mensajeAlerta='Error no se pudo cargar e Producto.Intentelo mas Tarde';
            }
        }
   }
   
   //ACTUALIZA STOCK
   if(isset($_POST['addCant'])){
            $addStock=$_POST['cant']+$_POST['addCant'];
            $sql = "UPDATE producto SET stock=? WHERE idproducto=?" ;
            
            $stmt = $conectar->prepare($sql);
            $stmt->bindParam(1, $addStock,PDO::PARAM_INT);
            $stmt->bindParam(2, $_POST['idProdu'],PDO::PARAM_INT);
            
            try{
                $stmt->execute();
            }catch (PDOException $e){
                $mensajeAlerta='Error no se pudo agregar al Stock.Intentelo mas Tarde';
            }
        }
   
    //CONSULTA DE LISTA DE GENEROS DISPONIBLES
    $consulta="SELECT * FROM genero";
    $genero= consultar($consulta,$conectar);
    
    //CONSULTA DE LISTA DE ARTISTAS DISPONIBLES
    $consulta="SELECT * FROM artista";
    $artista= consultar($consulta,$conectar);
   
   //CONSULTA PARA LISTADO DE ARTICULOS
    if(isset($_GET['buscaProdu'])){
        $buscado=$_GET['buscaProdu'];
        $complemento="WHERE titulo LIKE '%$buscado%' OR nombre LIKE '%$buscado%' ORDER BY idproducto DESC LIMIT 10";
    }else{
        $complemento='ORDER BY idproducto DESC LIMIT 10';
    }
    $consulta="SELECT 
                    idproducto,titulo,nombre,stock,tipo,anio,precio 
                FROM 
                    producto p
                JOIN 
                    artista a ON p.idartista=a.idartista    
                JOIN 
                    genero g ON p.idgenero=g.idgenero $complemento";
    $listado= consultar($consulta,$conectar);
   
?>
<div id="Alerta"><?php echo $mensajeAlerta?></div>
<!--DIV DE LISTADO DE ARTICULOS-->
<div class="cuerpo">
    <fieldset>
        <legend>Control de Stock</legend>
        <form class="left" action="index.php" method="GET">
            <!-- ESTE INPUT OCULTO INDICA A QUE CONTENIDO DEBE MANDARLE LOS VALORES DEL FORMULARIO -->
            <input type="hidden" name="op" value="3">
            <input  class="busqueda" type="text" name="buscaProdu" placeholder="Ingrese Busqueda..." size="50" />
            <input type="image" name="buscar" src="img/lupa.png"/>
        </form>
        <?php
            if($_SESSION['nivel']<=1){
        ?>
        <form class="right">
            <input type="button" id="addProdu" name="nuevodisco" value="Agregar Producto"/>
        </form>
        <?php 
            }
        require_once('stock/addProdu.php');
        ?>
        <hr />

        <table id="tablaStock">
            <tr class="titulos">		
                <td>CODIGO</td>
                <td>TITULO</td>
                <td>INTERPRETE</td>
                <td>CANTIDAD</td>
                <td>GENERO</td>
                <?php
                   if($_SESSION['nivel']<=1){
                ?>
                <td>ACCION</td>
                <?php
                   }
                ?>
            </tr>		
            <!--LISTADO DE ULTIMOS 10 PRODUCTOS-->
            <?php
                foreach($listado as $id => $produ):
                    if($produ['stock']<15){
                         $claseListado="listado-deshabilitado";
                    }else{
                         $claseListado="listado";
                    }
            ?>
                        <tr id="<?php echo $produ['idproducto'].'-'.$produ['titulo']?>" class="<?php echo $claseListado?>">
                            <td><?php echo$produ['idproducto']?></td>
                            <td><?php echo$produ['titulo']?></td>
                            <td><?php echo$produ['nombre']?></td>
                            <td><?php echo$produ['stock']?></td>
                            <td><?php echo$produ['tipo']?></td>
                            <?php
                                if($_SESSION['nivel']<=1){
                            ?>
                            <td>
                                <img src="img/add.png" width="15px" title="Agregar" alt="Agregar Stock" class="mas"/>
                                <?php require 'stock/modStock.php';?>|
                                <img data-form="form-editar-disco-<?php echo $produ['idproducto']?>" src="img/edit.gif" width="18px" title="Editar" alt="Editar Carga" class="editProdu"/>
                                <?php require 'stock/modProdu.php';?>
                            </td>
                            <?php
                                }
                            ?>
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
<?php
$host="localhost";
$db="pocholas-db";
$user="root";
$pass="sa";
try{
    $conectar=new PDO("mysql:host=$host;dbname=$db",$user,$pass);
    $conectar->setAttribute(PDO::ATTR_EMULATE_PREPARES,true);
    $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conectar->exec("SET NAMES UTF8");
}  catch (PDOException $e){
   echo 'Error al Conectar a la Base de Datos: '.$e->getMessage();
}

//esta funcion toma cualquier consulta y devolvera un array con los datos
function consultar($query,$conectar){
    try{
    $statement= $conectar->query($query);
    
    }  catch (PDOException $e){
        echo 'Error en la consulta:'.$e->getMessage();
    }
      
    $row=$statement->fetchall(PDO::FETCH_ASSOC);
    return $row;
}
?>

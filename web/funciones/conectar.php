<?php

function consultar($query){
try{
$statement= $pdo->query($query);
}  catch (PDOException $e){
    echo 'Error en la consulta:'.$e->getMessage();
}
//volcamos el objeto de tipo mysqli_result a un array asociativo
$row=$statement->fetch(PDO::FETCH_ASSOC);

return $row;
}
?>

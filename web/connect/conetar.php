<?php

$host="localhost";
$db="pocholas-db";
$user="root";
$pass="Genius";
try{
    $conectar=new PDO("mysql:host=$host;dbname=$db",$user,$pass);
    $conectar->setAttribute(PDO::ATTR_EMULATE_PREPARES,true);
    $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conectar->exec("SET NAMES UTF8");
}  catch (PDOException $e){
   echo 'Error al Conectar a la Base de Datos: '.$e->getMessage();
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

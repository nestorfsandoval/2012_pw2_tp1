<?php
if (isset($_SESSION['user_interno'])){
    header("location:intranet/index.php");
}else{
    if(isset($_POST['user']) && isset($_POST['pass'])){
        
        $pass=md5($_POST['pass']);
        $qry="SELECT count(*)AS log,nombre,idprivilegio AS nivel  FROM empleado WHERE user=? AND pass=?";
        
        $stmt=$conectar->prepare($qry);
        $stmt->bindParam(1,$_POST['user'],PDO::PARAM_STR);
        $stmt->bindParam(2,$pass,PDO::PARAM_STR);
        $stmt->execute();
        $login=$stmt->fetchAll();

        
        foreach ($login as $log):
            if($log['log']){
                $_SESSION['user_interno']=$log['nombre'];
                $_SESSION['nivel']=$log['nivel'];
                header("location:intranet/index.php");
            }else{
                echo 'Error de Usuario o Contrase&ntilde;a';
            }
        endforeach;
            
        
    }
}

if((isset($_GET['logout']))&&($_GET['logout']=='on')){
        session_destroy();
        header('location: index.php');
}

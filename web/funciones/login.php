<?php
if (isset($_SESSION['user_interno'])){
    header("location:intranet/index.php");
}else{
    if(isset($_POST['user']) && isset($_POST['pass'])){
        
        $pass=md5($_POST['pass']);
        $qry="SELECT count(*)AS log,nombre,idprivilegio AS nivel, id_emp,habilitado  FROM empleado WHERE user=? AND pass=?";
        
        $stmt=$conectar->prepare($qry);
        $stmt->bindParam(1,$_POST['user'],PDO::PARAM_STR);
        $stmt->bindParam(2,$pass,PDO::PARAM_STR);
        $stmt->execute();
        $login=$stmt->fetchAll();

        
        foreach ($login as $log):
            
                if($log['log']){
                    if($log['habilitado']==0){       
                        $mensajeLogin="Usted no esta Habilitado para Iniciar Sesi&oacute;n";
                    }else{
                        $_SESSION['user_interno']=$log['nombre'];
                        $_SESSION['nivel']=$log['nivel'];
                        $_SESSION['iduser']=$log['id_emp'];
                        header("location:intranet/index.php");
                    }
                }else{
                    $mensajeLogin="Error de Usuario o Contrase&ntilde;a";
                }
        endforeach;
            
        
    }
}

if((isset($_GET['logout']))&&($_GET['logout']=='on')){
        session_destroy();
        header('location: index.php');
}

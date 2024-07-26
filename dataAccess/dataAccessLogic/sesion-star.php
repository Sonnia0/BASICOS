<?php 

session_start();

    $inactividad=6;

    if(isset($_SESSION["timeout"])){
        $sessionTTL=time() - $_SESSION["timeout"];

        if($sessionTTL > $inactividad){
            session_destroy();

            echo("tiempo terminado");
        }

    }
    $_SESSION["timeout"]=time();

    session_start();
    if($_POST["usuario"]="admin" && $_POST["password"]==sha1($passwordUser)){
        $_SESSION["autorizado"]=true;
        session_regenerate_id();

    }











?>
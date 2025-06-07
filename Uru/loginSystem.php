<?php
    include "./includes/databaseConection.inc";

    session_start();

    $usernamel = $_POST['username'];
    $passwordl = $_POST['password'];
    $retorno; 
 
    $retorno = $mysqlc->query("select username, senha from usuario where username = \"".$usernamel."\";");
    if($retorno->num_rows > 0){
        $verify = $retorno->fetch_array();
        if($passwordl == $verify["senha"]){
            $_SESSION["log"] = "sucesso";
            $_SESSION["user"] = $verify["username"];
            header("location: homepage.php");
        }else{
            $_SESSION["log"] = "A senha digitada está incorreta";
            header("location: login.php");
        }
    }else{
        $_SESSION["log"] = "O nome de usuário está incorreto";
            header("location: login.php");
    }

    $mysqlc->close();

?>

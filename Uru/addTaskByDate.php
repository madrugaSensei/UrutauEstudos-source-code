<?php
    session_start();
    include "./includes/databaseConection.inc";

    $date = $_POST["dateTask"];
    $task = $_POST["task"];
    $user = $_SESSION["user"];

    $retorno = $mysqlc->query("select cod_estudante from usuario where username = \"".$user."\";");
    if($retorno->num_rows > 0){
        $r = $retorno->fetch_array();
        $userId = $r["cod_estudante"];
    }else{
        $_SESSION["log"] = "Você precisa fazer login para registrar atividades ".$user;
            header("location: homepage.php");
        
    }

    if(isset($userId)){
       $txt = "insert into datetask(dateTask, task, userId) values ";
       $txt.= "('".$date."', \"".$task."\", \"".$userId."\");";
       $operation = $mysqlc->query($txt);
       header("location: calendario.php");
    }

?>
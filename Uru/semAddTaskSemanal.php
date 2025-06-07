<?php
    session_start();
    include "./includes/databaseConection.inc";

    $date = $_POST["dateSemTask"];
    $task = $_POST["semTask"];
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
       $txt = "insert into semanal(dateSem, taskSem, cod_estudante, completed) values ";
       $txt.= "('".$date."', \"".$task."\", \"".$userId."\", 0);";
       $operation = $mysqlc->query($txt);
      header("location: semanal.php");
    }
?>
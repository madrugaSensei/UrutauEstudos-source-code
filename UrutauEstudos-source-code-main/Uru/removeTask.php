<?php

include "./includes/databaseConection.inc";

$idTask = $_POST["id"];

$mysqlc->query("DELETE FROM datetask WHERE idTask = ".$idTask.";");

echo $idTask;

header("location: calendario.php");

?>
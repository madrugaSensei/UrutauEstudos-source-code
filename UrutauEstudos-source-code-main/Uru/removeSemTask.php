<?php

include "./includes/databaseConection.inc";

$idTask = $_POST["id"];

$mysqlc->query("DELETE FROM semanal WHERE idSem = ".$idTask.";");

echo $idTask;

header("location: semanal.php");

?>
<?php

include "./includes/databaseConection.inc";

$idTask = $_POST["id"];
$newText = $_POST["editTask"];
$newDate = $_POST["editDate"];

$mysqlc->query("update datetask
set dateTask = \"".$newDate."\", task = \"".$newText."\"
WHERE idTask = ".$idTask.";");

echo $idTask." - ".$newText." - ".$newDate;

header("location: calendario.php");

?>
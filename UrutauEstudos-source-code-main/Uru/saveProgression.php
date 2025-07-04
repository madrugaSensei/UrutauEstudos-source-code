<?php

include "./includes/databaseConection.inc";

$max = $_GET["max"];
$min = $_GET["min"];

for($i = $min; $i<=$max;$i++){
    if(isset($_GET[strval($i)])){
        $mysqlc->query("update semanal
        set completed = \"".$_GET[strval($i)]."\" WHERE idSem = ".$i.";");
        echo $_GET[strval($i)]." - ";
    }
}

header("location: semanal.php");

?>
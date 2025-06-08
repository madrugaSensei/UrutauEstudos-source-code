<!DOCTYPE html>

<html>

<head>
    <title>Calendario</title>
    <?php session_start(); ?>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/semanal.js"></script>
</head>

<body>
    <?php include "./includes/navbar.inc"; ?>

    <div id="tasks">

        <?php
        include "./includes/databaseConection.inc";

        $user = $_SESSION["user"];

        $retorno = $mysqlc->query("select cod_estudante from usuario where username = \"" . $user . "\";");
        if ($retorno->num_rows > 0) {
            $r = $retorno->fetch_array();
            $userId = $r["cod_estudante"];
        } else {
            echo "Você precisa fazer login para ver as tarefas";
        }

        function getUserId()
        {
            include "./includes/databaseConection.inc";

            $user = $_SESSION["user"];

            $retorno = $mysqlc->query("select cod_estudante from usuario where username = \"" . $user . "\";");
            if ($retorno->num_rows > 0) {
                $r = $retorno->fetch_array();
                $userId = $r["cod_estudante"];
                return $userId;
            } else {
                echo "Você precisa fazer login para ver as tarefas";
                return null;
            }
        }

        function valorEscrito($data, $userId, &$taskList)
        {
            include "./includes/databaseConection.inc";
            //echo $data." - ";
            if (isset($userId)) {
                $result = $mysqlc->query("select dateTask, task from semanal where cod_estudante = " . $userId . ";");
                if ($result->num_rows > 0) {
                    //$taskList = $result->fetch_row();
                    $taskList = $result->fetch_all();
                    foreach ($taskList as $i => $dado) {
                        foreach ($dado as $j => $d) {
                            //echo $d;
                            if ($data == $d) {
                                $taskList[] = $dado;
                            }
                        }
                    }

                }
            }
        }

        ?>

        <br><br>

        <?php

        $hoje = date('l - d/m/Y');
        $dataMostrar = new DateTime((date('d')) . "-" . date('m-Y'));
        $acumulo = 0;
        $userId = getUserId();
        $mesAtual = $dataMostrar->format('m');
        echo "<h1 style=\"text-align:center;\">" . toTextual($dataMostrar->format('m')) . "</h1>";
        for ($i = 0; $i < 1; $i++) {
            echo "<div style=\"display: flex; justify-content: space-around; align-items: space-around;\">";
            for ($j = 0; $j < 7; $j++) {
                $dataMostrar->setDate(date('Y'), date('m'), date('d') + $acumulo);
                $dados = getDados($dataMostrar->format("Y-m-d"), getUserId());
                if ($i == 0) {
                    if ($j == 0 && $dataMostrar->format('l') != "Sunday") {
                        $acumulo--;
                        $j--;
                    } else {
                        echo $dataMostrar->format("Y-m-d");
                        $acumulo++;
                       print_r($dados);
                      
                        if (isset($dados["TaskSem"])) {
                            if (date("l") == $dataMostrar->format("l")) { ?>
                                <div style="background-color: blue; width: 15rem; height: 35rem; margin: 5px;">
                                    <p><?php echo toPortuguese($dataMostrar->format('l')) ?></p>
                                    <div id="tasks">
                                        <?php
                                        foreach ($dados as $d) {
                                            if ($d["completed"] == 0) {
                                                ?>

                                                <input type="checkbox" value=<?php echo $d["taskSem"] ?>>

                                                <?php
                                            } else { ?>
                                                <input checked type="checkbox" value=<?php echo $d["taskSem"] ?>>

                                            <?php }
                                        }
                                        ?>
                                    </div>
                                    <input value="+" class="addSemTask" type="button" name=<?php echo $dataMostrar->format("Y-m-d") . "\" id-\"" . $dataMostrar->format("Y-m-d") ?>>
                                </div>
                                <?php
                            } else { ?>
                                <div style="background-color: bisque; width: 15rem; height: 35rem; margin: 5px;">
                                    <p><?php echo toPortuguese($dataMostrar->format('l')) ?></p>
                                    <div id="tasks">
                                        <?php
                                        foreach ($dados as $d) {
                                            if ($d["completed"] == 0) {
                                                ?>

                                                <input type="checkbox" value=<?php echo $d["taskSem"] ?>>

                                                <?php
                                            } else { ?>
                                                <input checked type="checkbox" value=<?php echo $d["taskSem"] ?>>

                                            <?php }
                                        }
                                        ?>
                                    </div>
                                    <input value="+" class="addSemTask" type="button" name=<?php echo $dataMostrar->format("Y-m-d") . "\" id-\"" . $dataMostrar->format("Y-m-d") ?>>
                                </div>
                                <?php
                            }

                        }else{
                            if(date("l") == $dataMostrar->format("l")){
                                ?>
                                <div style="background-color: blue; width: 15rem; height: 35rem; margin: 5px;">
                                    <?php
                            }else{
?>
                                <div style="background-color: bisque; width: 15rem; height: 35rem; margin: 5px;"><?php
                            }?>

                                    <p><?php echo toPortuguese($dataMostrar->format('l')) ?></p>
                                    <br>
                                    <p>vazio</p>
                                    <input value="+" class="addSemTask" type="button" name=<?php echo $dataMostrar->format("Y-m-d") . "\" id-\"" . $dataMostrar->format("Y-m-d") ?>>
                            </div>
                       <?php }
                    }
                }
            }
            echo "</div>";
            echo "<br>";
        }

        function toPortuguese($l)
        {
            switch ($l) {

                case "Monday":
                    return "Segunda-feira";
                //break;
                case "Tuesday":
                    return "Terça-feira";
                case "Wednesday":
                    return "Quarta-feira";
                case "Thursday":
                    return "Quinta-feira";
                case "Friday":
                    return "Sexta-feira";
                case "Saturday":
                    return "Sabádo";
                case "Sunday":
                    return "Domingo";
            }
        }

        function toTextual($m)
        {
            switch ($m) {
                case "01":
                    return "Janeiro";
                case "02":
                    return "Fevereiro";
                case "03":
                    return "Março";
                case "04":
                    return "Abril";
                case "05":
                    return "Maio";
                case "06":
                    return "Junho";
                case "07":
                    return "Julho";
                case "08":
                    return "Agosto";
                case "09":
                    return "Setembro";
                case "10":
                    return "Outubro";
                case "11":
                    return "Novembro";
                case "12":
                    return "Dezembro";
            }
        }

        function getDados($data, $userId)
        {
            include "./includes/databaseConection.inc";

            //echo $data." - ";
            if (isset($userId)) {
                $result = $mysqlc->query("select dateSem, taskSem, completed from semanal where cod_estudante = $userId && dateSem = $data;");
                //print_r($result);
                if ($result->num_rows > 0) {
                    //$taskList = $result->fetch_row();
                    $taskList = $result->fetch_array();
                    //echo $taskList["taskSem"];
                    return $taskList;

                }
            }
            return "vazio";
        }

        ?>

    </div>

    <br><br>

    <div id="cadTask" hidden>
        <form method="post" action="semAddTaskSemanal.php">
            <input type="hidden" name="dateSemTask" id="dateSemTask">
            <input type="text" name="semTask" id="semTask">
            <input type="submit" value="Enviar">
        </form>
    </div>

    <div id="editTab" hidden>
        <form action="editTask.php" method="post">
            <input type="hidden" name="id" id="idToEdit">
            <input type="date" name="editDate" id="editDate">
            <input type="text" name="editTask" id="editTask">
            <input type="submit" value="Salvar Alterações">
        </form>
        <input type="button" id="cancel" name="cancel" value="cancel">
    </div>

</body>

</html>
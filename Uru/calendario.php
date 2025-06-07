<!DOCTYPE html>

<html>

    <head>
        <title>Calendario</title>
        <?php session_start(); ?>
        <script src="./js/jquery-3.5.1.js"></script>
        <script src="./js/jquery.min.js"></script>
        <script src="./js/calendario.js"></script>
    </head>

    <body>
        <?php include "./includes/navbar.inc"; ?>

        <div id="tasks" >
            <input type="hidden" name="curTask" id="curTask">

            <?php
                include "./includes/databaseConection.inc";

                $user = $_SESSION["user"];

                $retorno = $mysqlc->query("select cod_estudante from usuario where username = \"".$user."\";");
                if($retorno->num_rows > 0){
                    $r = $retorno->fetch_array();
                    $userId = $r["cod_estudante"];
                }else{
                    echo "Você precisa fazer login para ver as tarefas";
                }
                /*
                if(isset($userId)){
                    $result = $mysqlc->query("select dateTask, task from datetask where userId = ".$userId.";");
                    if($result->num_rows > 0){
                        //$taskList = $result->fetch_row();
                        $taskList = $result->fetch_all();

                        foreach($taskList as $i => $dado){
                            foreach($dado as $j => $d){
                                echo $i." - ".$d."[".$j."]";
                            echo "<br>";
                            }
                        }

                    }    
                }
                */
                function getUserId(){
                    include "./includes/databaseConection.inc";

                    $user = $_SESSION["user"];
    
                    $retorno = $mysqlc->query("select cod_estudante from usuario where username = \"".$user."\";");
                    if($retorno->num_rows > 0){
                        $r = $retorno->fetch_array();
                        $userId = $r["cod_estudante"];
                        return $userId;
                    }else{
                        echo "Você precisa fazer login para ver as tarefas";
                        return null;
                    }
                }

                function valorEscrito($data, $userId){
                    include "./includes/databaseConection.inc";
                    //echo $data." - ";
                    if(isset($userId)){
                        $result = $mysqlc->query("select dateTask, task from datetask where userId = ".$userId.";");
                        if($result->num_rows > 0){
                            //$taskList = $result->fetch_row();
                            $taskList = $result->fetch_all();
                            foreach($taskList as $i => $dado){
                                foreach($dado as $j => $d){
                                    //echo $d;
                                    if($data == $d){
                                        return $dado[1];
                                    }
                                }
                            }
    
                        }    
                    }
                    return "vazio";
                }
                
            ?>

            <br><br>

            <?php
            
                $hoje = date('l - d/m/Y');
                $dataMostrar = new DateTime((date('d'))."-".date('m-Y'));
                $acumulo = 0;
                $userId = getUserId();
                $mesAtual = $dataMostrar->format('m');
                echo "<h1 style=\"text-align:center;\">".toTextual($dataMostrar->format('m'))."</h1>";
                for($i = 0; $i<6; $i++){
                    echo "<div style=\"display: flex; justify-content: space-around; align-items: space-around;\">";
                    for($j = 0; $j<7; $j++){
                            $dataMostrar->setDate(date('Y'), date('m'), date('d')+$acumulo);
                        if($i == 0){
                            if($j == 0 && $dataMostrar->format('l') != "Sunday"){
                                $acumulo--;
                                $j--;
                            }else {
                                $acumulo++;
                                echo "<div style=\"background-color: bisque; width: 15rem; height: 5rem; margin: 5px;\">"
                                ."<p>".toPortuguese($dataMostrar->format('l'))."</p>".
                                
                                "</div>";
                            }
                        }else{
                            $acumulo++;
                            if($mesAtual != $dataMostrar->format('m')){
                                echo DrawDay("gray", $dataMostrar, $userId);
                            }else if($dataMostrar->format('d') == date('d')){
                                echo DrawDay("blue", $dataMostrar, $userId);
                            }else{
                            echo DrawDay("bisque", $dataMostrar, $userId);
                            }
                        }
                    }
                    if($i == 0){
                        $acumulo -= 7;
                    }
                    echo "</div>";
                    echo "<br>";
                }

                function toPortuguese($l){
                    switch($l){

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

                function toTextual($m){
                    switch($m){
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

                function DrawDay($color, $dataMostrar, $userId){
                    include "./includes/databaseConection.inc";

                    $id = 0;

                    if(isset($userId)){
                        $result = $mysqlc->query("select dateTask, idTask from datetask where userId = ".$userId.";");
                        if($result->num_rows > 0){
                            //$taskList = $result->fetch_row();
                            $taskList = $result->fetch_all();
                            foreach($taskList as $i => $dado){
                                foreach($dado as $j => $d){
                                   // echo $dado[0]. " (".$j.") ";
                                    if($dataMostrar->format('Y-m-d') == $dado[0]){
                                        $id = $dado[1];
                                        
                                    }
                                }
                            }
    
                        }    
                    }
                   // echo $id;
                    if(valorEscrito($dataMostrar->format('Y-m-d'), $userId) == "vazio"){
                        return "<div style=\"background-color: ".$color."; width: 15rem; height: 5rem; margin: 5px;\">"
                        ."<p>".$dataMostrar->format("d")."</p>".
                        valorEscrito($dataMostrar->format('Y-m-d'), $userId).
                        "</div>"; 
                    }

                    return "<div style=\"background-color: ".$color."; width: 15rem; height: 5rem; margin: 5px;\">"
                                ."<p>".$dataMostrar->format("d")."</p>".
                                valorEscrito($dataMostrar->format('Y-m-d'), $userId).
                                "<input type=\"button\" class=\"editTask\" value=\"Editar\" id=\"".$id."\" name=\"".$dataMostrar->format("Y-m-d")."\">".
                                "<form method=\"POST\" action=\"removeTask.php\">".
                                "<input type=\"hidden\" name=\"id\" value=\"".$id."\">".
                                "<input type=\"submit\" class=\"removeTask\" value=\"Deletar\" id=\"remove\" name=\"remove\"></form>".
                                "</div>";
                }
                
            ?>

        </div>
        
        <br><br>
        
        <input type="button" name="addTask" id="addTask" value="Adicionar Tarefa">
    
        <div id="cadTask">

        </div>

        <div id="editTab" hidden>
            <form action="editTask.php" method="post">
                <input type="hidden" name="id" id="idToEdit">
                <input type="date" name="editDate" id="editDate" >
                <input type="text" name="editTask" id="editTask">
                <input type="submit" value="Salvar Alterações">
            </form>
            <input type="button" id="cancel" name="cancel" value="cancel">
        </div>
        
    </body>

</html>
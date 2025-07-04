<?php
        include "includes/databaseConection.inc";
        session_start();
        $estouCansadoChefe = new DOMDocument();

        $canRegist = true;
        $cname = htmlspecialchars($_POST['nome']);
        $email = htmlspecialchars($_POST['email']);
        $datanasc = htmlspecialchars($_POST['datenasc']);
        $formation = htmlspecialchars($_POST['formation']);
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $cpassword = htmlspecialchars($_POST['cpassword']);
        $log = '';

        if($password != $cpassword){
            //echo '<br><br>As senhas não coincidem';
            $log = "As senhas não coincidem";
            $canRegist = false;
            $_SESSION["log"] = $log;
            header("location: index.php");
        }
        
        $usernames = $mysqlc->query("select username from usuario;");
        if(isset($username)){
            $listUsername = $usernames->fetch_array();
            if(!empty($listUsername)){
                foreach($listUsername as $i){
                    if($i == $username){
                        //echo '<br><br>esse nome de usuário já existe';
                        $log = "esse nome de usuário já existe";
                        $canRegist = false;
                        $_SESSION["log"] = $log;
                        header("location: index.php");
                }
            }
           
        }
        }

        if($canRegist){
            $txt = "insert into usuario(data_nasc, email, formacao, nome, senha, username) values ";
            $txt.="('".$datanasc."', \"".$email."\", \"".$formation."\", \"".$cname."\", \"".$password."\", \"".$username."\");";
            $result = $mysqlc->query($txt);
            //echo $txt;
            $canRegist = false;
            $_SESSION["user"] = $username;
            header("location: homepage.php");
        }

        $mysqlc->close();
    ?>
    
    
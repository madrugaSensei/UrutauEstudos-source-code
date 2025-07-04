<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <link rel="icon" href="./imagens/uruSemFundo.png" />
    <!-- CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./bootstrap/css/bootstrap-icons.css" />
    <link rel="stylesheet" href="./css/login.css" />
    <!-- JAVASCRIPT -->
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/psV.js"></script>
    <?php session_start(); ?>
</head>

<body>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="quadro"><h1 class="title mt-4">LOGIN</h1>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">

                        <form name="login" id="login" method="post" action="loginSystem.php">
                            <div class="form">
                                <br>
                                <div class="form-group mt-3">
                                    <input type="text" name="username" id="username" class="form-control" maxlength="100" placeholder="Nome de Usuário" required autofocus />
                                </div>
                                <br>
                                <div class="form-group mt-2">
                                    <input type="password" name="password" id="password" class="form-control" minlength="8" maxlength="100" placeholder="Senha" required autofocus />
                                    <input type="button" id="changePassword" class="btn btn-outline-warning mt-3" value="Mostra Senha">
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-4">
                            <div class="form-group mt-4">
                                <input type="submit" class="btn1 btn btn-danger" value="Entrar"/>
                            </div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"> 
                                <div class="form-group mt-4">
                                    <a href="./index.php" class="btn2 btn btn-outline-primary">Novo Cadastro</a>
                                </div>
                            </div>
                            </div>
                        </form>
                        
                    </div>
                    <div class="col-md-1"></div>  
                </div>
                 
            </div>
                  
            <div class="row">
          <div id="info" class="text-center">
        
        <?php
         if(isset($_SESSION["log"])){
            echo $_SESSION["log"];
         }
        ?>
        
        </div>

            </div>

          <div class="col-md-2"></div>
          </div>
        </div>

</body>

</html>
<!DOCTYPE html>

<html>

<head>
<title>Cadastro</title>
    <meta charset="utf-8" />
    <link rel="icon" href="./imagens/uruSemFundo.png" />
    <!-- CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/bootstrap-icons.css" />

    <link rel="stylesheet" href="./css/style.css" />
    <!-- JAVASCRIPT -->
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/psV.js"></script>
    <?php session_start(); ?>
</head>

<body>

    <div class="row" style="margin-top: 3rem;">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="quadro"><h1 class="title">Cadastro</h1>
                <div class="row">

                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <a class="cadastrarprof mb-1" href="#" >Cadastro do Professor</a>
                        <form name="cadastro" id="cadastro" method="post" action="cadastro.php">
                            <div class="form-control">
                                <input type="name" class="form-control" id="nome" name="nome" placeholder="Nome" maxlength="100" required/>
                            </div>
                            <div class="form-control">
                                <input type="date" class="form-control" id="datenasc" name="datenasc"/>
                            </div>
                            <div class="form-label" style="margin-bottom: 1rem;">
                                <select class="form" id="formation" name="formation">
                                    <option>Formação</option>
                                    <option value="EFAI">Ensino Fundametal: Anos Iniciais</option>
                                    <option value="EFAF">Ensino Fundametal: Anos Finais</option>
                                    <option value="CEM">Ensino Médio incompleto</option>
                                    <option value="EMC">Ensino Médio Completo</option>
                                </select>
                            </div>
                            <div class="form-control">
                                <input type="text" maxlength="50" class="form-control" name="username" id="username" required placeholder="Nome de Usuário"/>
                            </div>
                            <div class="form-control">
                                <input type="email" name="email" id="email" maxlength="100" required placeholder="Email" class="form-control"/>
                            </div>
                            <div class="form-control">
                                <input type="password" minlength="8" maxlength="20" name="password" id="password" required class="form-control" placeholder="Senha"/>
                            </div>
                            <div class="form-control">
                                <input type="password" minlength="8" maxlength="20" name="cpassword" id="cpassword" placeholder="Confirme sua senha" required class="form-control"/>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-label" >
                                        <input type="button" id="changePassword" class="btn btn-warning" value="Mostrar Senha"/>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="form-label" >
                                        <input type="submit" id="enviar" class="btnfinalizar" value="Finalizar Cadastro"/>
                                    </div>
                                </div>
                            

                            <div class="col-md-1"></div>
                        </div>
                          </form>
                    </div>
                    </div>
                    <div class="col-md-2"></div>
                
                
            </div>
    
            <div id="info">
        
                <?php
                    if(isset($_SESSION["log"])){
                        echo "<h1>".$_SESSION["log"]."</h1>";
                    }
                ?>
        
            </div>

    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="pt-Br">

<head>
    
</head>

<body>
    
    
</body>

</html>
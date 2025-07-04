<!DOCTYPE html>

<html>

    <head>
        <title>Tela inicial</title>
        <?php session_start(); ?>
    </head>

    <body>
        <?php include "./includes/navbar.inc"; ?>
        <h1>obrigado por logar <?php if(isset($_SESSION["user"])) {echo $_SESSION["user"];}else{echo "visitante";} ?></h1>
        <h1><?php if(isset($_SESSION['log'])){echo $_SESSION['log'];} ?></h1>
        <h3><?php if(!isset($_SESSION["user"])){$_SESSION["user"] = "visitante";} ?></h3>

        <div id="top_resumos"></div>
        <div id="tarefas_dia"></div>
        <div id="tarefas_semana"></div>
        <?php
            if(isset($_SESSION["premium"])){
        ?>                
                <div id="top-resumos-corrigidos"></div>
        <?php
            }else{
                echo "Gostaria de comprar o nosso plano premium?";
                ?>
                <a href="robandoSeuDinheiro.php" class="btn btn-outline-primary">Clique aqui e saiba mais!</a>
                <?php
            }
        ?>

            <footer>
                <p>@urutauestudos.com.br   Todos os direitos reservados</p>
                <p>Desenvolvido por Urutau Estudios</p>
            </footer>

    </body>

</html>
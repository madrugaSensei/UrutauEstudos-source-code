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
    </body>

</html>
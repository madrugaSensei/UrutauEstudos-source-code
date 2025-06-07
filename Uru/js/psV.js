$(document).ready(function(){
    let v = 0;
    $("#changePassword").click(function(){
        if(v == 0){
            v = 1;
            $("#password").attr("type", "text");
            $("#cpassword").attr("type", "text");
            $(this).attr("value", "Esconder Senha");
        }else{
            v = 0;
            $("#password").attr("type", "password");
            $("#cpassword").attr("type", "password");
            $(this).attr("value","Mostrar Senha");
        }
    });
});
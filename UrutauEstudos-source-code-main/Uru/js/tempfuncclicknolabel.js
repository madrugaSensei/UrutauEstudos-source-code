$(document).ready(function(){

    let click = 0; 

    $(".coisas").click(function(){

        if(click == 0){
            click = 1;
            $("#"+$(this).attr("name")).attr("checked", true);
        }else{
            click = 0;
            $("#"+$(this).attr("name")).attr("checked", false);
        }

    });

});
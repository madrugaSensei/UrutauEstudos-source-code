$(document).ready(function(){

let isActive = 0;

$(".addSemTask").click(function(){

if(isActive == 0){
    isActive = 1;
    $("#cadTask").show();
}else{
    isActive = 0;
    $("#cadTask").hide();
}

$("#dateSemTask").attr("value", $(this).attr("name"));

});

});
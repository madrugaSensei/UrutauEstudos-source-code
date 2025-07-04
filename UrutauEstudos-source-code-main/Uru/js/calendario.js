$(document).ready(function(){
    $("#addTask").click(function(){
        $("#cadTask").html("<form method=\"post\" action=\"addTaskByDate.php\" id=\"fTask\" name=\"fTask\"> <label for=\"dateTask\">Data: </label><input type=\"date\" name=\"dateTask\" id=\"dateTask\"><label for=\"Task\">Tarefa: </label><input type=\"text\" id=\"task\" name=\"task\" maxlength=\"100\"><input type=\"submit\" value=\"Registrar\"></form>");
    });
    $(".editTask").click(function(){
        $("#editTab").show();
        $("#idToEdit").val($(this).attr("id"));
        $("#editDate").attr("value", $(this).attr("name"));
    }
    );
    $("#cancel").click(function(){

        $("#editTab").hide();

    });
});

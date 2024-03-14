$(document).ready(function(){
   $("#saveUser").click(function(){
        
        $.post(
            "../php/addUser.php",
            {
                uName: $("#nameUser").val(),
                uPass: $("#passUser").val(),
                uCategory: $("#categoryUser").find("option:selected").val()
            },
            function(data,status){
                //alert("Data: " + data + "\nStatus: " + status);
            }
        );

        $("#userHolder").load("../php/getUser.php");
        $("#nameUser").val("");
        $("#passUser").val("");
    });
    
//***************Functions for Transportadoras-------------------------------------------------------------------------------------------------------//
    $("#buttonTransTNuevo").click(
        function(){
            var myw = window.open("../Plantillas/addTransPop.php", "addTransport","width=400,height=450,left=200,top=30");
        }
    );
    
    $("#buttonTransONuevo").click(
        function(){
            var myw = window.open("../Plantillas/addOperatorPop.php", "addOperator","width=400,height=450,left=200,top=30");
        }
    );
    $("#buttonTransUNuevo").click(
        function(){
            var myw = window.open("../Plantillas/addUnitPop.php", "addUnit","width=400,height=450,left=200,top=30");
        }
    );

    

    


});
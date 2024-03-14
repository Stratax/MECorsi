function editUser(user){
	window.open("./Plantillas/editUser.php?id="+user,"editUser","width=400,height=300,left=200,top=30")
}
function show(n){
	switch(n){
		case 1:
			$("#title").text("Inicio")
			$(".panel").hide();
			$("#menu1").show();
			$("li").css("background-color","transparent");
			$("#m_Home").css("background-color","#3080C0");
		break;
		case 2:
			$("#title").text("Usuarios")
			$(".panel").hide();
			$("#menu2").show();
			$("li").css("background-color","transparent");
			$("#m_User").css("background-color","#3080C0");
			$("#userHolder").load("../Admin/php/getUser.php");
		break;
		case 3:
			$("#title").text("Módulos")
			$(".panel").hide();
			$("#menu3").show();
			$("li").css("background-color","transparent");
			$("#m_Modulos").css("background-color","#3080C0");
		break;
	}
}

$(document).ready(function(){
	show(1);
	$("#userIcon").click(function(){$("#userDiv").slideToggle(200);});

	$("#m_Home").click(function(){show(1);});
	$("#m_User").click(function(){show(2);});
	$("#m_Modulos").click(function(){show(3);});
	$("#m_Select").click(function(){show(4);});

	
	$("#saveUser").click(function(){
        $.post(
            "../Admin/php/addUser.php",
            {
                uName: $("#nameUser").val(),
                uPass: $("#passUser").val(),
                uCategory: $("#categoryUser").find("option:selected").val()
            },
            function(data,status){
                //alert("Data: " + data + "\nStatus: " + status);
				console.log("New User added -> Data: " + data + "\nStatus: " + status);        
			}
        );

        $("#userHolder").load("../Admin/php/getUser.php");
        $("#nameUser").val("");
        $("#passUser").val("");
    });	
});


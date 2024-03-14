function editUser(user){

	$("#idUserLbl").html(user);
	$.post(
		"./php/getUser.php",
		{
			idUser : user
		},
		function(data,status){
			console.log("status -> " + status);
			$("#UName").val(data.UName);
			$("#UPass").val(data.UPass);
			$("#UCategory option[value =" +data.UCategory+"]").prop("selected",true);
		},
		"json"
	);

	$("#editUser").css("display","flex");
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
			$("#userHolder").load("../Admin/php/getUser.php",{idUser : -1});
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
              console.log("New User added -> Data: " + data + "\nStatus: " + status);        
			}
        );

        $("#userHolder").load("../Admin/php/getUser.php",{idUser: -1});
        $("#nameUser").val("");
        $("#passUser").val("");
    });	

	//Modal window Functions
	$("#btnCloseEditUser").click(function(){$("#editUser").css("display","none");});

	$("#btnSaveEditUser").click(
		function(){
			$.post(
				"./php/editUser.php",
				{
					idUser: $("#idUserLbl").html(),
					uName: $("#UName").val(),
					uPass: $("#UPass").val(),
					uCategory: $("#UCategory").find("option:selected").val()
				},
				function(data, status){
					alert("User edited: " + status);
					console.log("Status -> " + status + "\nData ->" + data);
					$("#userHolder").load("../Admin/php/getUser.php",{idUser: -1});
					$("#editUser").css("display","none");
				}
			)
		}
	);

});



function showEmpresa(x){
	$("#showListaEmpresaDetalle").load("../SSA/php/getEmpresa.php",{Empresa: x});
}
function showOpUnit(x){
    $('.transRow').css("background-color","white");
	$('#tra'+x).css("background-color","#aaccFF");
    $("#showListaUn").load("../SSA/php/getUnit.php",{Transportadora: x});
    $("#showListaOp").load("../SSA/php/getOperator.php",{Transportadora: x});
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
			$("#title").text("Transportadora")
			$(".panel").hide(); 
			$("#menu2").show();
			$("li").css("background-color","transparent");
			$("#m_Trans").css("background-color","#3080C0");
            $("#showLista").load("../SSA/php/getTransportadora.php");
			$("#showListaOp").load("../SSA/php/getOperator.php",{Transportadora: 0});
		break;
		case 3:
			$("#title").text("Empresa")
			$(".panel").hide(); 
			$("#menu3").show();
			$("li").css("background-color","transparent");
			$("#m_Empresa").css("background-color","#3080C0");
			$("#showListaEmpresa").load("../SSA/php/getEmpresa.php",{Empresa: 0});
		break;
		
	}
}

$(document).ready(function(){
	show(2);

	$("#userIcon").click(function(){$("#userDiv").slideToggle(200);});
    $("#m_Home").click(function(){show(1);});
	$("#m_Trans").click(function(){show(2);});
	$("#m_Empresa").click(function(){show(3);});

    $("#buttonTransTNuevo").click(
        function(){
            var myw = window.open("../SSA/Plantillas/addTransPop.php", "addTransport","width=400,height=450,left=200,top=30");
        }
    );
    
    $("#buttonTransONuevo").click(
        function(){
            var myw = window.open("../SSA/Plantillas/addOperatorPop.php", "addOperator","width=400,height=450,left=200,top=30");
        }
    );
	$("#buttonTransUNuevo").click(
        function(){
            var myw = window.open("../SSA/Plantillas/addUnitPop.php", "addUnit","width=400,height=450,left=200,top=30");
        }
    );
	$("#buttonEmpresaNueva").click(
        function(){
            var myw = window.open("../SSA/Plantillas/addEmpresaPop.php", "addEmpresa","width=400,height=450,left=200,top=30");
        }
    );
	
	
});
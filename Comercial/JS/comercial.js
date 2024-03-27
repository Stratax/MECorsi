function detalle(idCliente){
	$("#showListaDetalle").load("../Comercial/php/getClient.php",{Cliente: idCliente});
}
function detalleManifiesto(idManifiesto){
	$("#showManifiestoDetalle").load("../Comercial/php/getManifiestoEntrada.php",{Manifiesto: idManifiesto});
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
			$("#title").text("Clientes")
			$(".panel").hide(); 
			$("#menu2").show();
			$("li").css("background-color","transparent");
			$("#m_Cliente").css("background-color","#3080C0");
			$("#showLista").load("../Comercial/php/getClient.php",{Cliente: 0});
        break;
		case 3:
			$("#title").text("Manifiesto de Entrada")
			$(".panel").hide(); 
			$("#menu3").show();
			$("li").css("background-color","transparent");
			$("#m_ManEnt").css("background-color","#3080C0");
			$("#showManifiesto").load("../Comercial/php/getManifiestoEntrada.php",{Manifiesto: 'x'});

        break;
		
	}
}

$(document).ready(function(){
	show(1);
	$("#userIcon").click(function(){$("#userDiv").slideToggle(200);});
    
	$("#m_Home").click(function(){show(1);});
	$("#m_Cliente").click(function(){show(2);});
	$("#m_ManEnt").click(function(){show(3);});

	$("#btnAddClient").click(
		function(){
			$("#addClient").css("display","flex");
		}
	);

	$("#btnSaveAddClient").click(
		function(){
			$.post(
				"./php/addClient.php",
				{
					razonSocial: $("#razonSocial").val(),
					rfc: $("#rfc").val(),
					nra: $("#nra").val(),
					calle: $("#calle").val(),
					nExt: $("#nExt").val(),
					colonia: $("#colonia").val(),
					delMun: $("#delMun").val(),
					cp: $("#cp").val(),
					estado: $("#estado").val(),
					calleF: $("#calleF").val(),
					nExtF: $("#nExtF").val(),
					coloniaF: $("#coloniaF").val(),
					delMunF: $("#delMunF").val(),
					cpF: $("#cpF").val(),
					estadoF: $("#estadoF").val(),
					contacto: $("#contacto").val(),
					tel1: $("#tel1").val(),
					tel2: $("#tel2").val(),	
					email: $("#email").val()
				},
				function(data,status){
					console.log(data+status);
					alert("Cliente guardada con exito");
					$(".formAddClient").val("");
					$("#showLista").load("../Comercial/php/getClient.php",{idTrans: -1});
						
				}
			);
		}
	);

	$("#btnCloseAddClient").click(function(){$("#addClient").css("display","none");});
    	
});
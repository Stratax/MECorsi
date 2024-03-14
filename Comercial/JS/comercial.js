function detalle(idCliente){
	$("#showListaDetalle").load("../Comercial/php/getClienteComer.php",{Cliente: idCliente});
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
			$("#showLista").load("../Comercial/php/getClienteComer.php",{Cliente: 0});
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

	$("#buttonClienteNuevo").click(
		function(){
			window.open("../Comercial/Plantillas/addClientPop.php", "addClient","width=800,height=450,left=200,top=30")
		}
	);

	$("#buttonManifiestoNuevo").click(
		function(){
			window.open("../Comercial/Plantillas/addManifiestoPop.php", "addClient","width=600,height=800,left=200,top=30")
		}
	);



    	
});
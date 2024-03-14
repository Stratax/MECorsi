
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
			$("#title").text("Manifiesto de Entrada")
			$(".panel").hide(); 
			$("#menu2").show();
			$("li").css("background-color","transparent");
			$("#m_ManEn").css("background-color","#3080C0");
		break;
		case 3:
			$("#title").text("Manifiesto de Salida")
			$(".panel").hide(); 
			$("#menu3").show();
			$("li").css("background-color","transparent");
			$("#m_ManSa").css("background-color","#3080C0");
		break;
		case 4:
			$("#title").text("Trazabilidad")
			$(".panel").hide(); 
			$("#menu4").show();
			$("li").css("background-color","transparent");
			$("#m_Traza").css("background-color","#3080C0");
		break;		
	}
}

$(document).ready(function(){
	show(1);

	$("#userIcon").click(function(){$("#userDiv").slideToggle(200);});
    $("#m_Home").click(function(){show(1);});
	$("#m_ManEn").click(function(){show(2);});
	$("#m_ManSa").click(function(){show(3);});
	$("#m_Traza").click(function(){show(4);});
});
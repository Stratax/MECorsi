

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
			$("#showLista").load("../Comercial/php/getClient.php",{Cliente: -1});
        break;
		case 3:
			$("#title").text("Orden de servicio")
			$(".panel").hide(); 
			$("#menu3").show();
			$("li").css("background-color","transparent");
			$("#m_OrdServ").css("background-color","#3080C0");
			$("#showManifiesto").load("../Comercial/php/getManifiestoEntrada.php",{Manifiesto: 'x'});

        break;
		
	}
}

function editClient(idClient1){
	$("#idClientLbl").html(idClient1);
	$("#editClient").css("display","flex");
	console.log(idClient1);

	$.post("./php/getClient.php",
		{
			Cliente: idClient1,	
		},
		function(data,status){
			console.log(status+data.Email);

			$("#razonSocialE").val(data.RazonSocial);
			$("#rfcE").val(data.RFC);
			$("#nraE").val(data.NRA);
			$("#calleE").val(data.Calle);
			$("#nExtE").val(data.Numero);
			$("#coloniaE").val(data.Colonia);
			$("#delMunE").val(data.DelMun);
			$("#cpE").val(data.CP);
			$("#estadoE").val(data.Estado);
			$("#calleFE").val(data.CalleFiscal);
			$("#nExtFE").val(data.NumeroFiscal);
			$("#coloniaFE").val(data.ColoniaFiscal);
			$("#delMunFE").val(data.DelMunFiscal);
			$("#cpFE").val(data.CPFiscal);
			$("#estadoFE").val(data.EstadoFiscal);
			$("#contactoE").val(data.Contacto);
			$("#tel1E").val(data.Tel1);
			$("#tel2E").val(data.Tel2);
			$("#emailE").val(data.Email);
		},"json"

	);
}

$(document).ready(function(){
	$("#clienteMan").on('change',function(){
		$("#datosCliente").load("php/datosCliente.php",{cliente: this.value})
	});
	$("#transportadoraMan").on('change', function(){
		$("#unidadMan1").load("php/selectUnidad.php",{transportadora: this.value,nUnidad: ' 1'});
		$("#operadorMan").load("php/selectOperador.php",{transportadora: this.value});
		$("#unidadMan2").load("php/selectUnidad.php",{transportadora: this.value,nUnidad: ' 2'});
		$("#datosTransportadora").load("php/datosTransportadora.php",{transportadora: this.value});					
	});
	$("#destinoMan").on('change',function(){
		$("#datosDestino").load("php/datosDestino.php",{destino: this.value})	
	});
	
	show(3);
	$("#userIcon").click(function(){$("#userDiv").slideToggle(200);});
    
	$("#m_Home").click(function(){show(1);});
	$("#m_Cliente").click(function(){show(2);});
	$("#m_OrdServ").click(function(){show(3);});

	$("#btnAddClient").click(
		function(){
			$("#addClient").css("display","flex");
		}
	);
	$("#btnAddService").click(
		function(){
			$("#idService").load("php/blockOrderServiceId.php");
			$("#addService").css("display","flex");
			
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
					$("#showLista").load("../Comercial/php/getClient.php",{Cliente: -1});
						
				}
			);
		}
	);

	$("#btnSaveEditClient").click(
		function(){
			$.post(
				"./php/editClient.php",
				{
					Cliente: $("#idClientLbl").html(),
					razonSocial: $("#razonSocialE").val(),
					rfc: $("#rfcE").val(),
					nra: $("#nraE").val(),
					calle: $("#calleE").val(),
					nExt: $("#nExtE").val(),
					colonia: $("#coloniaE").val(),
					delMun: $("#delMunE").val(),
					cp: $("#cpE").val(),
					estado: $("#estadoE").val(),
					calleF: $("#calleFE").val(),
					nExtF: $("#nExtFE").val(),
					coloniaF: $("#coloniaFE").val(),
					delMunF: $("#delMunFE").val(),
					cpF: $("#cpFE").val(),
					estadoF: $("#estadoFE").val(),
					contacto: $("#contactoE").val(),
					tel1: $("#tel1E").val(),
					tel2: $("#tel2E").val(),	
					email: $("#emailE").val()
				},
				function(data,status){
					console.log(data+status);
					alert("Cliente guardada con exito");
					$("#showLista").load("../Comercial/php/getClient.php",{Cliente: -1});
				}
			);
		}
	);

	$("#btnDeleteEditClient").click(
		function(){
			var opt = confirm("Eliminará de forma permanente este Cliente al igual\n que toda lainformación relacionada a este Cliente\n¿Desea continuar?");
			if(opt){
				$.post( "./php/deleteClient.php",
					{
						Cliente : $("#idClientLbl").html(),
					},
					function(data,status){
						alert("Cliente Eliminado");
						console.log(data+status);
						$("#showLista").load("../Comercial/php/getClient.php",{Cliente: -1});
						$("#editClient").css("display","none");
					}	
				);

			}
		
		}
	);

	$("#btnCloseAddClient").click(function(){$("#addClient").css("display","none");});
	$("#btnCloseEditClient").click(function(){$("#editClient").css("display","none");});
	$("#btnCloseAddService").click(function(){$("#addService").css("display","none");});
    	
});
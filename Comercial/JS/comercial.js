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
			$("#title").text("Manifiesto de Entrada")
			$(".panel").hide(); 
			$("#menu3").show();
			$("li").css("background-color","transparent");
			$("#m_InMan").css("background-color","#3080C0");
			$("#showService").load("./php/getIncomeManifest.php",{idIncomeManifest: -1});
        break;	
	}
}

function pdfManifest(idMan){
	$.post(
		"./php/manifiestoPDF.php",{IdManifiesto : idMan},
		function(data, status){
			console.log("Done PDF: " + data +  status);
		}
	);
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

function editIncomeManifest(idManifest){
		
	
	$("#idManifest").html(idManifest);
	
	$.post("./php/getIncomeManifest.php",
		{idIncomeManifest : idManifest},
		function(data,status){
			console.log(status);
			$("#dateInMan").val(data.FechaSolicitud);
			$("#dateInManGather").val(data.FechaRecoleccion);
			$("#dateInManDestiny").val(data.FechaRecepcion);
			
			if(data.IdCliente != null){
				$("#clientInMan option[value ="+data.IdCliente+"]").prop("selected",true);
				$("#datosCliente").load("./php/datosCliente.php",{cliente: data.IdCliente});
			}else{
				$("#clientInMan option[value =-1]").prop("selected",true);
				$("#datosCliente").html("_<br>_");
			}

			if(data.IdTransportadora == null){
				$("#transportInMan option[value =-1]").prop("selected",true);
				$("#operatorMan option[value = -1]").prop("selected",true);
				$("#unitMan1 option[value =-1]").prop("selected",true);
				$("#unitMan2 option[value =-1]").prop("selected",true);
				
				$("#datosTransportadora").html("_<br>_");				
			}else{
				$("#datosTransportadora").load("php/datosTransportadora.php",{transportadora: data.IdTransportadora});			
				$("#operatorMan").load("./php/selectOperador.php",{transportadora: data.IdTransportadora});
				$("#unitMan1").load("./php/selectUnidad.php",{transportadora: data.IdTransportadora,nUnidad: '1'});
				$("#unitMan2").load("./php/selectUnidad.php",{transportadora: data.IdTransportadora,nUnidad: '2'});
				setTimeout(function(){ //witouth the timeOut JS first change the prop and then load the concepts
					$("#transportInMan option[value ="+data.IdTransportadora+"]").prop("selected",true);
					$("#operatorMan option[value ="+data.IdOperador+"]").prop("selected",true);
					$("#unitMan1 option[value ="+data.IdUnidad+"]").prop("selected",true);
					$("#unitMan2 option[value ="+data.IdUnidad2+"]").prop("selected",true);			
				}	
					,500
				);
				console.log("Worked");
			}				
			
			if(data.IdEmpresa != null){
				$("#destinyMan option[value ="+data.IdEmpresa+"]").prop("selected",true);
				$("#datosDestino").load("php/datosDestino.php",{destino: data.IdEmpresa});	
			}else{
				$("#destinyMan option[value =-1]").prop("selected",true);
				$("#datosDestino").html("_<br>_");
			}
		},"json"
	);
	$("#addIncomeManifest").css("display","flex");			
}


$(document).ready(function(){
	
	$("#clientInMan").on('change',function(){
		$("#datosCliente").load("./php/datosCliente.php",{cliente: this.value})
	});

	$("#transportInMan").on('change', function(){
		$("#unitMan1").load("./php/selectUnidad.php",{transportadora: this.value,nUnidad: ' 1'});
		$("#operatorMan").load("./php/selectOperador.php",{transportadora: this.value});
		$("#unitMan2").load("./php/selectUnidad.php",{transportadora: this.value,nUnidad: ' 2'});
		$("#datosTransportadora").load("./php/datosTransportadora.php",{transportadora: this.value});					
	});
	$("#destinyMan").on('change',function(){
		$("#datosDestino").load("./php/datosDestino.php",{destino: this.value})	
	});
	
	show(3);
	$("#userIcon").click(function(){$("#userDiv").slideToggle(200);});
    
	$("#m_Home").click(function(){show(1);});
	$("#m_Cliente").click(function(){show(2);});
	$("#m_InMan").click(function(){show(3);});

	$("#btnAddClient").click(
		function(){
			$("#addClient").css("display","flex");
		}
	);
	$("#btnAddIncomeManifest").click(
		function(){
			$.post("./php/addIncomeManifest.php",
				{},
				function(data,status){
					console.log(data + status);
					$("#showService").load("./php/getIncomeManifest.php",{idIncomeManifest: -1});
				}
			);
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

	$("#btnSaveAddMan").click(
		function(){
			$.post(
				"./php/editIncomeManifest.php",
				{
					IdManifiesto: $("#idManifest").html(),
					IdCliente: $("#clientInMan").find("option:selected").val(),
					IdTransportadora: $("#transportInMan").find("option:selected").val(),
					IdOperador: $("#operatorMan").find("option:selected").val(),
					IdUnidad: $("#unitMan1").find("option:selected").val(),
					IdUnidad2: $("#unitMan2").find("option:selected").val(),
					IdEmpresa: $("#destinyMan").find("option:selected").val(),
					FechaSolicitud: $("#dateInMan").val(),
					FechaRecoleccion: $("#dateInManGather").val(),
					FechaRecepcion: $("#dateInManDestiny").val(),
					Estatus: "SOLICITUD"
				},
				function(data,status){
					console.log(data+status);
					alert("Se guardo la solicitud de servicio con éxito");
					$("#showService").load("./php/getIncomeManifest.php",{idIncomeManifest: -1});
					$("#addIncomeManifest").css("display","none");
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
	$("#btnCloseAddMan").click(function(){$("#addIncomeManifest").css("display","none");});
    	
});
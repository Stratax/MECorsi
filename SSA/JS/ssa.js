
function showOpUnit(x){
    $('.transRow').css("background-color","whitesmoke");
	$('#tra'+x).css("background-color","#aaccFF");
    $("#showListaUn").load("../SSA/php/getUnit.php",{Transportadora: x, Unit : -1});
    $("#showListaOp").load("../SSA/php/getOperator.php",{Transportadora: x, Operator : -1});
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
            $("#showLista").load("../SSA/php/getTransportadora.php",{idTrans: -1});
		break;
		case 3:
			$("#title").text("Empresa")
			$(".panel").hide(); 
			$("#menu3").show();
			$("li").css("background-color","transparent");
			$("#m_Empresa").css("background-color","#3080C0");
			$("#showListaEmpresa").load("../SSA/php/getEmpresa.php",{Empresa: -1});
		break;
		
	}
}
function editTrans(idTrans1){
	$("#idTransLbl").html(idTrans1);
	$("#editTransport").css("display","flex");
	$.post(
		"./php/getTransportadora.php",
		{idTrans: idTrans1,},
		function(data,status){
			console.log(status);
			$("#razonSocialE").val(data.RazonSocial);
			$("#calleE").val(data.Calle);
			$("#nExtE").val(data.NumExt);
			$("#nIntE").val(data.NumInt);
			$("#coloniaE").val(data.Colonia);
			$("#delMunE").val(data.DelMun);
			$("#cpE").val(data.Estado);
			$("#estadoE").val(data.CP);
			$("#emailE").val(data.Email);
			$("#telE").val(data.Telefono);
			$("#sctE").val(data.RegSCT);
			$("#semarnatE").val(data.AutorizacionSemarnat);
		},"json"
	);
}
function editUnit(idUnit1, transportadora){
	
	$("#idUnitLbl").html(idUnit1);
	$("#editUnit").css("display","flex");
	
	$.post(
		"./php/getUnit.php",
		{
			Transportadora: transportadora, 
			Unit: idUnit1,
		},
		function(data,status){
			
			$("#marcaE").val(data.Marca);
			$("#placasE").val(data.Placas);
			$("#tipoE option[value ='"+data.Tipo+"']").prop("selected",true);
			$("#sctUnitE").val(data.RegSCT);
			$("#semarnatUnitE").val(data.AutorizacionSemarnat);
			$("#vigSemarnatE").val(data.VigenciaSemarnat);
			$("#noPolizaE").val(data.NoPoliza);
			$("#vigPolizaE").val(data.VigenciaPoliza);
			$("#manejoEspecialE").val(data.ManejoEspecial);
			$("#transSelE option[value ="+data.IdTransportadora+"]").prop("selected",true);
			

		},"json"
	);
	
}
function editOperator(idOperator1, transportadora){
	
	$("#editOperator").css("display","flex");
	$("#idOperatorLbl").html(idOperator1);
	
	$.post(
		"./php/getOperator.php",
		{
			Transportadora: transportadora, 
			Operator: idOperator1,
		},
		function(data,status){
			console.log(status);
			$("#nombreE").val(data.Nombre);
			$("#apellidoPE").val(data.ApellidoP);
			$("#apellidoME").val(data.ApellidoM);
			$("#transSelOperatorE option[value ='"+data.IdTransportadora+"']").prop("selected",true);
			$("#tel1E").val(data.Telefono1);
			$("#tel2E").val(data.Telefono2);
			$("#noLicenciaE").val(data.NoLicencia);
			$("#vigenciaLicenciaE").val(data.VigenciaLicencia);
		},"json"
	);
	
}

function editEmpresa(idEmpresa1){
	$("#idCorpLbl").html(idEmpresa1);
	$("#editCorp").css("display","flex");
	
	$.post("./php/getEmpresa.php",
		{Empresa : idEmpresa1,},
		function(data,status){

			$("#razonSocialCorpE").val(data.RazonSocial),
			$("#semarnatCorpE").val(data.Semarnat),
			$("#capacidadCorpE").val(data.CapacidadAlmacen),
			$("#calleCorpE").val(data.Calle),
			$("#nExtCorpE").val(data.NumeroExt),
			$("#nIntCorpE").val(data.NumeroInt),
			$("#coloniaCorpE").val(data.Colonia),
			$("#delMunCorpE").val(data.DelMun),
			$("#cpCorpE").val(data.CP),
			$("#estadoCorpE").val(data.Estado),
			$("#responsableCorpE").val(data.Responsable),
			$("#tel1CorpE").val(data.Telefono),
			$("#emailCorpE").val(data.Email),

			console.log(status);
		},"json"

	);
}


$(document).ready(function(){
	show(1);

	$("#userIcon").click(function(){$("#userDiv").slideToggle(200);});
    $("#m_Home").click(function(){show(1);});
	$("#m_Trans").click(function(){show(2);});
	$("#m_Empresa").click(function(){show(3);});

    
    $("#btnShowAddTrans").click(function(){$("#addTransport").css("display","flex");});
	$("#btnShowAddUnit").click(function(){$("#addUnit").css("display","flex");});
	$("#btnShowAddOperator").click(function(){$("#addOperator").css("display","flex");});
	$("#btnShowAddCorp").click(function(){$("#addCorp").css("display","flex")});
	
	// Modal window Functions

	$("#btnSaveAddTrans").click(
		function(){
			$.post(
				"./php/addTransportadora.php",
				{
					razonSocial: $("#razonSocial").val(),
					calle: $("#calle").val(),
					nExt: $("#nExt").val(),
					nInt: $("#nInt").val(),
					colonia: $("#colonia").val(),
					delMun: $("#delMun").val(),
					cp: $("#cp").val(),
					estado: $("#estado").val(),
					email: $("#email").val(),
					tel: $("#tel").val(),
					sct: $("#sct").val(),
					semarnat: $("#semarnat").val()
				},
				function(data,status){
					console.log(data+status);
					alert("Transportadora guardada con exito");
					$(".formAddTrans").val("");
					$("#showLista").load("../SSA/php/getTransportadora.php",{idTrans: -1});
						
				}
			);
		});

	$("#btnSaveAddUnit").click(
		function(){
			$.post(
				"./php/addUnit.php",
				{
					marca: $("#marca").val(),
					placas: $("#placas").val(),
					tipo: $("#tipo").find("option:selected").val(),
					sct: $("#sctUnit").val(),
					semarnat: $("#semarnatUnit").val(),
					vigSemarnat: $("#vigSemarnat").val(),
					noPoliza: $("#noPoliza").val(),
					vigPoliza: $("#vigPoliza").val(),
					manejoEspecial: $("#manejoEspecial").val(),
					transSel: $("#transSel").find("option:selected").val(),
				},
				function(data,status){
					
					console.log(data + status);
					$(".formAddUnit").val("");
					alert("Unidad agregada Correctamente");
				}
			);
		}
	);

	$("#btnSaveAddOperator").click(
		function(){
			$.post(
				"./php/addOperator.php",
				{
					nombre: $("#nombre").val(),
					apellidoP: $("#apellidoP").val(),
					apellidoM: $("#apellidoM").val(),
					tel1: $("#tel1").val(),
					tel2: $("#tel2").val(),
					noLicencia: $("#noLicencia").val(),
					vigenciaLicencia: $("#vigenciaLicencia").val(),
					estatus: $("#estatus").val(),
					alta: $("#alta").val(),
					transSel: $("#transSelOperator").find("option:selected").val(),
				},
				function(data,status){
					
					console.log(data + status);
					$(".formAddOperator").val("");
					alert("Operador agregada Correctamente");
				}
			);
		}
	);

	$("#btnSaveCorp").click(
		function(){
			$.post(
				"./php/addCorp.php",
				{
					razonSocial: $("#razonSocialCorp").val(),
					semarnat: $("#semarnatCorp").val(),
					capacidad: $("#capacidadCorp").val(),
					calle: $("#calleCorp").val(),
					nExt: $("#nExtCorp").val(),
					nInt: $("#nIntCorp").val(),
					colonia: $("#coloniaCorp").val(),
					delMun: $("#delMunCorp").val(),
					cp: $("#cpCorp").val(),
					estado: $("#estadoCorp").val(),
					responsable: $("#responsableCorp").val(),
					tel1: $("#tel1Corp").val(),
					email: $("#emailCorp").val()
				},
				function(data,status){
					
					console.log(data + status);
					$(".formAddCorp").val("");
					alert("Empresa agregada Correctamente");
					$("#showListaEmpresa").load("../SSA/php/getEmpresa.php",{Empresa: -1});
				}
			);
		}
	);

	$("#btnDeleteEditTrans").click(
		function(){
			var opt = confirm("Eliminará de forma permanente esta Transportadora al igual\n que toda la"+ 
								"información relacionada\n a esta Transportadora: Unidades y operadores\n ¿Desea continuar?");
			if(opt == true){
				$.post(
					"./php/deleteTrans.php",
					{
						idTrans: $("#idTransLbl").html(),
					},
					function(data, status){
						alert("Transport Eliminated");
						console.log("Status -> " + status + "\nData ->" + data);
						$("#showLista").load("../SSA/php/getTransportadora.php",{idTrans: -1});
						$("#editTransport").css("display","none");
						
					}
				)
			}	
		}
	);
	$("#btnDeleteEditUnit").click(
		function(){
			var opt = confirm("Eliminará de forma permanente esta Unidad y la información relacionada a ella.\n ¿Desea continuar?");
			if(opt == true){
				$.post(
					"./php/deleteUnit.php",
					{
						Unidad: $("#idUnitLbl").html(),
					},
					function(data, status){
						alert("Unidad Eliminada");
						console.log("Status -> " + status + "\nData ->" + data);
						$("#editUnit").css("display","none");
					}
				)
			}	
		}
	);

	$("#btnDeleteEditOperator").click(
		function(){
			var opt = confirm("Eliminará de forma permanente este Operador y la información relacionada a el.\n ¿Desea continuar?");
			if(opt == true){
				$.post(
					"./php/deleteOperator.php",
					{
						idOperator: $("#idOperatorLbl").html(),
					},
					function(data, status){
						alert("Operador Eliminado");
						console.log("Status -> " + status + "\nData ->" + data);
						$("#editOperator").css("display","none");
					}
				);
			}	
		}
	);

	$("#btnDeleteEditCorp").click(
		function(){
			var opt = confirm("Eliminará de forma permanente esta Empresa y la información relacionada a ella.\n ¿Desea Continuar?");
			if(opt){
				$.post("./php/deleteCorp.php",
					{Empresa : $("#idCorpLbl").html(),},
					function(data, status){
						$("#showListaEmpresa").load("../SSA/php/getEmpresa.php",{Empresa: -1});
						alert("Empresa eliminada");
						console.log(status + data);
						$("#editCorp").css("display","none");
					}
				);
			}
		}
	);


	$("#btnEditTrans").click(
		function(){
			$.post(
				"./php/editTransport.php",
				{
					idTrans: $("#idTransLbl").html(),
					razonSocial: $("#razonSocialE").val(),
					calle: $("#calleE").val(),
					nExt: $("#nExtE").val(),
					nInt: $("#nIntE").val(),
					colonia: $("#coloniaE").val(),
					delMun: $("#delMunE").val(),
					cp: $("#cpE").val(),
					estado: $("#estadoE").val(),
					email: $("#emailE").val(),
					tel: $("#telE").val(),
					sct: $("#sctE").val(),
					semarnat: $("#semarnatE").val()
				},
				function(data,status){
					console.log("Transport Edited ->"+status+data);
					alert("Transporrte editado");
					$("#showLista").load("../SSA/php/getTransportadora.php",{idTrans: -1});
					//$("#editTransport").css("display","none");
				}
			);
		}
	);

	$("#btnEditUnit").click(
		function(){
			$.post(
				"./php/editUnit.php",
				{
					idUnit: $("#idUnitLbl").html(),
					marca: $("#marcaE").val(),
					placas: $("#placasE").val(),
					tipo: $("#tipoE").find("option:selected").val(),
					sct: $("#sctUnitE").val(),
					semarnat: $("#semarnatUnitE").val(),
					vigSemarnat: $("#vigSemarnatE").val(),
					noPoliza: $("#noPolizaE").val(),
					vigPoliza: $("#vigPolizaE").val(),
					manejoEspecial: $("#manejoEspecialE").val(),
					transSel: $("#transSelE").find("option:selected").val(),
				},
				function(data,status){
					
					console.log(data + status);
					alert("Unidad:"+$("#idUnitLbl").html()+" Editada Correctamente");
				}
			);
		}
	);

	$("#btnEditOperator").click(
		function(){
			$.post(
				"./php/editOperator.php",
				{
					idOperator: $("#idOperatorLbl").html(),
					nombre: $("#nombreE").val(),
					apellidoP: $("#apellidoPE").val(),
					apellidoM: $("#apellidoME").val(),
					transSel: $("#transSelOperatorE").find("option:selected").val(),
					tel1: $("#tel1E").val(),
					tel2: $("#tel2E").val(),
					noLicencia: $("#noLicenciaE").val(),
					vigenciaLicencia: $("#vigenciaLicenciaE").val(),
				},
				function(data,status){
					
					console.log(data + status);
					alert("Unidad:"+$("#idUnitLbl").html()+" Editada Correctamente");
				}
			);
		}
	);

	$("#btnSaveEditCorp").click(
		function(){
			$.post("./php/editCorp.php",
				{
					idEmpresa : $("#idCorpLbl").html(),
					razonSocial: $("#razonSocialCorpE").val(),
					semarnat: $("#semarnatCorpE").val(),
					capacidad: $("#capacidadCorpE").val(),
					calle: $("#calleCorpE").val(),
					nExt: $("#nExtCorpE").val(),
					nInt: $("#nIntCorpE").val(),
					colonia: $("#coloniaCorpE").val(),
					delMun: $("#delMunCorpE").val(),
					cp: $("#cpCorpE").val(),
					estado: $("#estadoCorpE").val(),
					responsable: $("#responsableCorpE").val(),
					tel1: $("#tel1CorpE").val(),
					email: $("#emailCorpE").val()
				},
				function(data,status){
					console.log(data + status);
					alert("Editado con exito");
					$("#showListaEmpresa").load("../SSA/php/getEmpresa.php",{Empresa: -1});
				}
			);
		}
	);
	
		
	$("#btnCloseAddTrans").click(function(){$("#addTransport").css("display","none");});
	$("#btnCloseEditTrans").click(function(){$("#editTransport").css("display","none");});
	$("#btnCloseAddUnit").click(function(){$("#addUnit").css("display","none");});
	$("#btnCloseEditUnit").click(function(){$("#editUnit").css("display","none");});
	$("#btnCloseAddOperator").click(function(){$("#addOperator").css("display","none");});
	$("#btnCloseEditOperator").click(function(){$("#editOperator").css("display","none");});
	$("#btnCloseAddCorp").click(function(){$("#addCorp").css("display","none");});
	$("#btnCloseEditCorp").click(function(){$("#editCorp").css("display","none");});
});
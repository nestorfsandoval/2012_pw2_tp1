$(function() {
		
		//obtengo fecha y a?oo actual
		var fecha=new Date();
		var year=fecha.getYear()+1900;
		var	name = $( "#name" ),
			user = $( "#user" ),
			password = $( "#password" ),
			allFields = $( [] ).add( name ).add( user ).add( password ),
		
			etiqueta= $(".validateTips").html(),//obtiene contenido entre etiquetas
			tips = $( ".validateTips" );
			//alert(etiqueta +"-" +tips);
			
		//FUNCIONES---------------------------------------------------
		function updateTips( t ) {//actualiza clases
			tips
				.text( t ).addClass( "ui-state-highlight" );
			setTimeout(function() {
				tips.removeClass( "ui-state-highlight", 1500 );
			}, 500 );
		}

		function checkLength( o, n, min, max ) {//verifica largo de palabra
			if ( o.val().length > max || o.val().length < min ) {
				o.addClass( "ui-state-error" );
					updateTips( "El Largo de " + n + " debe ser entre " + min + " y " + max + " caracteres." );
				return false;
			} else {
				return true;
			}
		}

		function checkRegexp( o, regexp, n ) {
			if ( !( regexp.test( o.val() ) ) ) {
				o.addClass( "ui-state-error" );
				updateTips( n );
				return false;
			} else {
				return true;
			}
		}
		
		function validaAnio(y){
			if (y.val() > year){
				y.addClass( "ui-state-error" );
				updateTips( "El A&ntilde;o no puede Ser Mayor al Actual." );
				return false;
			}else{
				return true;
			}
		}
		
		//-----------------------------------USUARIOS-----------------------------------------
		
		//NUEVO USUARIO-----------------------------------------------------------------------
		$( "#newUser" )
			.button()
			.click(function() {
				$( "#newUsuario" ).dialog( "open" );
			});
		
		$( "#newUsuario" ).dialog({//NEW USER
			autoOpen: false,
			height: 400,
			width: 350,
			modal: true,
			buttons: {
				/*Boton 1*/"Crear Cuenta": function() {
									var bValid = true;
									allFields.removeClass( "ui-state-error" );
				
									bValid = bValid && checkLength( name, "Nombre", 3, 40 );
									bValid = bValid && checkLength( user, "Usuario", 6, 16 );
									bValid = bValid && checkLength( password, "Contrase&ntilde;a", 5, 16 );
                                                                        console.log("largo:"+$("#ciudad").val().length)
                                                                        
									bValid = bValid && checkRegexp( name, /^[\w\-\s\dÀÈÌÒÙàèìòùÁÉÍÓÚÝáéíóúýÂÊÎÔÛâêîôûÃÑÕãñõÄËÏÖÜäëïöüçÇßØøÅåÆæÞþÐð]+$/i, "Nombre puede contener valores de a-z, 0-9, guiones bajos, y debe comenzar con una letra." );
									bValid = bValid && checkRegexp( user, /^[\w\-\s\dÀÈÌÒÙàèìòùÁÉÍÓÚÝáéíóúýÂÊÎÔÛâêîôûÃÑÕãñõÄËÏÖÜäëïöüçÇßØøÅåÆæÞþÐð]+$/i, "Usuario puede contener valores de a-z, 0-9, guiones bajos, y debe comenzar con una letra." );
									bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Contraseña solo permite caracateres desde a-z y desde 0-9" );

									if ( bValid ) {
                                                                                        $("#addUser").submit();
											$( this ).dialog( "close" );
										}
									},
				/*Boton 2*/Cancelar: function() {
											$( this ).dialog( "close" );
											}
								},
			close: function() {
								$("#titAlert").html("Rellene todos los campos"),
								allFields.val( "" ).removeClass( "ui-state-error" );
								}
				});//fin NEW USER

		
		
		//BORRAR & MODIFICAR--------------------------------------------------------
		
                $( ".editarUsuario , .borrarUsuario" )
			.button()
			.click(function() {
                            var form_id = $(this).data('form');
                                $("#"+form_id).dialog("open");
			});
                
		$( ".borrarUser" ).dialog({
			autoOpen: false,
			height: 170,
			width: 350,
			modal: true,
			buttons:{
				Deshabilitar: function(){
                                        $( this ).submit(),
					$( this ).dialog("close");
				},
				Cancelar: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function(){
				$("#titAlert").html("Rellene todos los campos"),
				allFields.val("").removeClass("ui-state-error");
			}
		});
		
		$(".editarUser").dialog({
			autoOpen:false,
			height: 415,
			width: 250,
			modal: true,
			buttons:{
				Actualiza: function(){
					$(this).dialog("close");//cierra Actualizar
				},
				Cancelar: function(){
					$(this).dialog("close");//cierra actualizar
				}
			},
			close: function(){
				$("#titAlert").html("Rellene todos los campos"),
				allFields.val("").removeClass("ui-state-error");
			}
		});
                
                //NUEVO ARTISTA
                $(".ciudad").bind('change',function(){
		if($(".ciudad").val()=='nueva'){
			console.log('quiere agregar registro');
			$( "#nuevaCiudad" ).dialog( "open" );
                    }
                });
                
                var ciudad=$("#nCiud");
                $( "#nuevaCiudad").dialog({
			autoOpen: false,
			height: 261,
			width: 218,
			modal: true,
			buttons: {
				"Agregar Artista": function() {
                                    $( "#nuevaCiudad").submit();
                                    ciudad.val("");
                                    $( this ).dialog( "close" );
				},
				Cancel: function() {
                                    artista.val("");
                                    $( this ).dialog( "close" );
				}
			},
			close: function() {
                            ciudad.val( "" ).removeClass( "ui-state-error" );
			}
		});
                
		
		//---------------------------------STOCK-----------------------------------------
		//AGREGAR PRODUCTO---------------------------------------------------------------
		$( "#addProdu" )
			.button()
			.click(function() {
				$( "#newProdu" ).dialog( "open" );
			});
			
		$("#newProdu").dialog({
			autoOpen:false,
			height: 400,
			width: 350,
			modal: true,
			buttons:{
				Agregar: function(){
								var bValid = true;
									titulo = $( "#titulo" ),
									interprete = $( "#interprete" ),
									anio = $( "#anio" ),
									cant = $( "#cant" ),
									genero = $("#genero"),
									valor = $( "#valor" ),
									allFields = $( [] ).add( titulo ).add( interprete ).add( anio ).add(cant).add(genero).add(valor),
									
									allFields.removeClass( "ui-state-error" );
				
									bValid = bValid && checkLength( titulo, "Titulo", 1, 40 );
									//bValid = bValid && checkLength( interprete, "Interprete", 2, 20 );
									bValid = bValid && checkLength( anio, "A&ntilde;o", 1, 4 );
									bValid = bValid && checkLength( cant, "Cantidad", 1, 9 );
									//bValid = bValid && checkLength( genero, "Genero", 2, 30 );
									bValid = bValid && checkLength( valor, "Precio", 1, 20 );
									
									bValid = bValid && checkRegexp( titulo, /^[\w\-\s\dÀÈÌÒÙàèìòùÁÉÍÓÚÝáéíóúýÂÊÎÔÛâêîôûÃÑÕãñõÄËÏÖÜäëïöüçÇßØøÅåÆæÞþÐð]+$/i, "Título puede contener valores de a-z, 0-9, guiones bajos, y debe comenzar con una letra." );
									bValid = bValid && checkRegexp( interprete, /^[\w\-\s\dÀÈÌÒÙàèìòùÁÉÍÓÚÝáéíóúýÂÊÎÔÛâêîôûÃÑÕãñõÄËÏÖÜäëïöüçÇßØøÅåÆæÞþÐð]+$/i, "Interprete puede contener valores de a-z, 0-9, guiones bajos, y debe comenzar con una letra." );
									bValid = bValid && checkRegexp( anio, /^[0-9]+$/i, "Año permite solo valores numericos" );
									bValid = bValid && validaAnio(anio);
									bValid = bValid && checkRegexp( cant, /^[0-9]+$/i, "Cantidad permite solo valores numericos" );
									bValid = bValid && checkRegexp( genero, /^[\w\-\s\dÀÈÌÒÙàèìòùÁÉÍÓÚÝáéíóúýÂÊÎÔÛâêîôûÃÑÕãñõÄËÏÖÜäëïöüçÇßØøÅåÆæÞþÐð]+$/i, "Género puede contener valores de a-z, 0-9, guiones bajos, y debe comenzar con una letra." );
									
									if ( bValid ) {
                                                                                $("#newProdu").submit(),
										alert("El Disco se agrego Correctamente."),
											$( this ).dialog( "close" );
										}
				},
				Cancelar: function(){
					$(this).dialog("close");//cierra actualizar
				}
			},
			close: function(){
				$("#titAlert").html("Rellene todos los campos"),
				$("#editAlert").html(""),
				allFields.val("").removeClass("ui-state-error");
			}
		});
		//NUEVO ARTISTA
                $(".artista").bind('change',function(){
		if($(".artista").val()=='nuevo'){
			console.log('quiere agregar registro');
			$( "#nuevoArtista" ).dialog( "open" );
		}
                });
                
                $(".nartista").bind('change',function(){
		if($(".nartista").val()=='nuevo'){
			console.log('quiere agregar registro');
			$( "#nuevoArtista" ).dialog( "open" );
		}
                });
                
                var artista=$("#nArtista");
                $( "#nuevoArtista").dialog({
			autoOpen: false,
			height: 150,
			width: 250,
			modal: true,
			buttons: {
				"Agregar Artista": function() {
                                    $( "#nuevoArtista").submit();
                                    artista.val("");
                                    $( this ).dialog( "close" );
				},
				Cancel: function() {
                                    artista.val("");
                                    $( this ).dialog( "close" );
				}
			},
			close: function() {
                            artista.val( "" ).removeClass( "ui-state-error" );
			}
		});
		//NUEVO GENERO
                $(".genero").bind('change',function(){
		if($(".genero").val()=='nuevo'){
			console.log('quiere agregar registro');
			$( "#nuevoGenero" ).dialog( "open" );
		}
                });
                
                $(".ngenero").bind('change',function(){
		if($(".ngenero").val()=='nuevo'){
			console.log('quiere agregar registro');
			$( "#nuevoGenero" ).dialog( "open" );
		}
                });
                
                var genero=$("#nGenero");
                $( "#nuevoGenero").dialog({
			autoOpen: false,
			height: 200,
			width: 250,
			modal: true,
			buttons: {
				"Agregar Artista": function() {
                                    $( "#nuevoGenero").submit();
                                    genero.val("");
                                    $( this ).dialog( "close" );
				},
				Cancel: function() {
                                    genero.val("");
                                    $( this ).dialog( "close" );
				}
			},
			close: function() {
                            genero.val( "" ).removeClass( "ui-state-error" );
			}
		});
		
		//SUMAR A DISCO----------------------------------------------------------------
		$(".addStock").css("display","none");	
		
		//FORMULARIO DE SUMAR----------------------------------------------------------
		$("#tablaStock img.mas").each(function(){
					$(this).click(function(){
						$(this).hide("slow");
						$(this).parent().find("form.addStock").fadein;
						$(this).parent().find("form.addStock").css("display", "block");
					})
		});
		//EDITAR DISCO-----------------------------------------------------------------
		$( ".editProdu" )
			.button()
			.click(function() {
                            var form_id = $(this).data('form');
                                $("#"+form_id).dialog("open");
			});
		
		$(".editarDisco").dialog({
			autoOpen:false,
			height: 400,
			width: 350,
			modal: true,
			buttons:{
				Agregar: function(){
								var bValid = true;
									/*titulo = $( "#tit" ),
									interprete = $( "#inter" ),
									anio = $( "#anual" ),
									cant = $( "#cantidad" ),
									genero = $("#gen"),
									valor = $( "#precio" ),
									allFields = $( [] ).add( titulo ).add( interprete ).add( anio ).add(cant).add(genero).add(valor),
									
									allFields.removeClass( "ui-state-error" );
				
									bValid = bValid && checkLength( titulo, "Titulo", 1, 40 );
									bValid = bValid && checkLength( interprete, "Interprete", 2, 20 );
									bValid = bValid && checkLength( anio, "A&ntilde;o", 1, 4 );
									bValid = bValid && checkLength( cant, "Cantidad", 1, 9 );
									bValid = bValid && checkLength( genero, "Genero", 2, 30 );
									bValid = bValid && checkLength( valor, "Precio", 1, 20 );
									
									bValid = bValid && checkRegexp( titulo, /^[\w\-\s\d?????????????????????????????????????????????????????????????]+$/i, "T?tulo puede contener valores de a-z, 0-9, guiones bajos, y debe comenzar con una letra." );
									bValid = bValid && checkRegexp( interprete, /^[\w\-\s\d?????????????????????????????????????????????????????????????]+$/i, "Interprete puede contener valores de a-z, 0-9, guiones bajos, y debe comenzar con una letra." );
									bValid = bValid && checkRegexp( anio, /^[0-9]+$/i, "A?o permite solo valores numericos" );
									bValid = bValid && validaAnio(anio);
									bValid = bValid && checkRegexp( cant, /^[0-9]+$/i, "Cantidad permite solo valores numericos" );
									bValid = bValid && checkRegexp( genero, /^[\w\-\s\d?????????????????????????????????????????????????????????????]+$/i, "G?nero puede contener valores de a-z, 0-9, guiones bajos, y debe comenzar con una letra." );*/
									
									if ( bValid ) {
                                                                                $(this).submit(),
										alert("El Disco se actualizo Correctamente."),
											$( this ).dialog( "close" );
										}
				},
				Cancelar: function(){
					$(this).dialog("close");//cierra actualizar
				}
			},
			close: function(){
				$("#titAlert").html("Rellene todos los campos"),
				$("#editAlert").html("");				
			}
		});
		//----------------------------COMPRAS Y VENTAS-----------------------------------------	
		

   //FECHAS
//   $("#fechad").datepicker({changeMonth : true, changeYear : true, showButtonPanel : true} );
//   $("#fechah").datepicker({changeMonth : true, changeYear : true, showButtonPanel : true} );
   $("#fechah, #fechad, #fechaCompra, #modfechaCompra").datepicker({changeMonth : true, changeYear : true, showButtonPanel : true} );
   $("#fechad, #fechah").bind({
				change: function(event)
						{						
							if (!posibleFecha(this.value))
								{
									alert("ATENTTI, NO ES UNA FECHA VALIDA");	
									event.preventDefault;
								}
						}
		});
					
 	$("#frm_btn_list").bind({
            submit: function (event){
                if ((!posibleFecha($("#fechad").val())) || (!posibleFecha($("#fechah").val()))){ 
                    alert("CUIDADO, INGRESO FECHA/S NO VALIDA/S");
                    return false;
                }else{
									return true;
								} 
						}
		});

		/**
		 * -------------------------------------------AGREGAR COMPRA-------------------------------------------
		 */
		$( "#nuevaCompra" )
			.button()
			.click(function() {
				$( "#agregaCompra" ).dialog( "open" );
			});
		
		$("#agregaCompra").dialog({
			autoOpen:false,
			height: 400,
			width: 350,
			modal: true,
			buttons:{
				Agregar: function(){
								var bValid = true;
									fechC = $( "#fechaCompra" ),
									provee = $( "#proveedor" ),
									fact = $( "#factura" ),
									monto = $( "#montoCompra" ),
									remito = $("#remito"),
									allFields = $( [] ).add( fechC ).add( provee ).add( fact ).add(monto).add(remito),
												
									allFields.removeClass( "ui-state-error" );
									console.log("Agregar Compra");
									console.log(fechC.val());
									console.log(bValid = bValid && posibleFecha(fechC.val()));
									console.log(bValid = bValid && checkLength( provee, "Proveedor", 2, 30 ));
									console.log(bValid = bValid && checkRegexp( provee, /^[\w\-\s\dÀÈÌÒÙàèìòùÁÉÍÓÚÝáéíóúýÂÊÎÔÛâêîôûÃÑÕãñõÄËÏÖÜäëïöüçÇßØøÅåÆæÞþÐð]+$/i, "Proveedor puede contener valores de a-z, 0-9, guiones bajos, y debe comenzar con una letra." ));
									console.log(bValid = bValid && checkLength( fact, "N° Factura", 1, 30 ));
									console.log(bValid = bValid && checkRegexp( fact, /^[0-9]+$/i, "N° Factura permite solo valores numericos" ));
									console.log(bValid = bValid && checkLength( monto, "Monto de Factura", 1, 9 ));
									console.log(bValid = bValid && checkRegexp( monto, /^[0-9,.]+$/i, "Monto permite solo valores numericos" ));
									console.log(bValid = bValid && checkLength( remito, "N° Remito", 1, 30 ));
									console.log(bValid = bValid && checkRegexp( remito, /^[0-9]+$/i, "N° de Remito permite solo valores numericos" ));
																											
									if ( bValid ) {
										alert("Compra ha sido Cargada.")
											$( this ).dialog( "close" );
										}
				},
				Cancelar: function(){
					$("#titAlert").html("Rellene todos los campos"),
					$(this).dialog("close");//cierra actualizar
				
				}
			},
			close: function(){
				$("#titAlert").html("Rellene todos los campos"),
				$("#editAlert").html("");		
				allFields.val("").removeClass("ui-state-error");		
			}
		});
		
		/**
		 * -------------------------------------------EDITAR COMPRA-------------------------------------------
		 */		
		$( "#editCompra" )
			.button()
			.click(function() {
				$( "#editarCompra" ).dialog( "open" );
			});
		
		$("#editarCompra").dialog({
			autoOpen:false,
			height: 400,
			width: 350,
			modal: true,
			buttons:{
				Agregar: function(){
								var bValid = true;
									fechCompra = $( "#modfechaCompra" ),
									provee = $( "#modproveedor" ),
									fact = $( "#modfactura" ),
									monto = $( "#modmontoCompra" ),
									remito = $("#modremito"),
									allFields = $( [] ).add( fechCompra ).add( provee ).add( fact ).add(monto).add(remito),
									
									
									allFields.removeClass( "ui-state-error" );
				
									console.log("Editar Compra");
									console.log(bValid = bValid && checkLength( provee, "Proveedor", 2, 30 ));
									console.log(bValid = bValid && checkRegexp( provee, /^[\w\-\s\dÀÈÌÒÙàèìòùÁÉÍÓÚÝáéíóúýÂÊÎÔÛâêîôûÃÑÕãñõÄËÏÖÜäëïöüçÇßØøÅåÆæÞþÐð]+$/i, "Proveedor puede contener valores de a-z, 0-9, guiones bajos, y debe comenzar con una letra." ));
									//console.log(bValid = bValid && posibleFecha(fechC.val()));
									console.log("aaaa/mm/dd");
									console.log(posibleFecha("2011/09/30"));
									console.log("dd/mm/aaaa");
									console.log(fechCompra.val());
									console.log(posibleFecha(fechCompra.val()));
									console.log(bValid = bValid && checkLength( fact, "N° Factura", 1, 30 ));
									console.log(bValid = bValid && checkRegexp( fact, /^[0-9-]+$/i, "N° Factura permite solo valores numericos" ));
									console.log(bValid = bValid && checkLength( monto, "Monto de Factura", 1, 9 ));
									console.log(bValid = bValid && checkRegexp( monto, /^[0-9,.]+$/i, "Monto permite solo valores numericos" ));
									console.log(bValid = bValid && checkLength( remito, "N° Remito", 1, 30 ));
									console.log(bValid = bValid && checkRegexp( remito, /^[0-9]+$/i, "N° de Remito permite solo valores numericos" ));
																											
									if ( bValid ) {
										console.log("es valido");
										alert("Registro Actualizado.")
											$( this ).dialog( "close" );
										}else{
											console.log("no es valido");
										}
										
				},
				Cancelar: function(){
					$(this).dialog("close"),//cierra actualizar
					$("#titAlert").html("Rellene todos los campos");
				}
			},
			close: function(){
				$("#titAlert").html("Rellene todos los campos"),
				$("#editAlert").html("");				
			}
		});				
});

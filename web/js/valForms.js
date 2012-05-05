//esta funcion valida usuario y contrase�a
            $(function(){
                $('#boton').click(function(){
                var pp = true;
                var user = $('#user');
                var pass = $('#pass');
               
                    function validacion(campo){
                        if ((campo.val().length == 0)){
                            return false; 
                        }else{
                            return true;
                        }
                    }
                 
                if ((validacion(user)== false) || ((validacion(pass)== false))){
                    alert('AMBOS CAMPOS DEBEN ESTAR COMPLETOS');
                }else{
                    if (pass.val() =='intranet'){
                         open('intranet/index.jsp?usr=' + user.val() + '&');
                                               
                    }else if (pass.val() =='extranet'){
                        open('extranet/inicio.jsp?usr=' + user.val() + '&');
                        
                    }else{
                        alert('ACCESO NO AUTORIZADO');
                    }
                 }
                })
            })



//esta funcion valida el formulario de contacto

 $(function(){
         $ ("#enviarMensaje").click(function(){
                var nomApe = $( "#nomApe" ),
                    email = $( "#email" ),
                    asunto = $( "#asunto" ),
                    mensContact = $("#mensContact"),
                    allFields = $( [] ).add( nomApe ).add( email ).add( asunto );
                                      
		

		function checkLength( o, n, min, max ) {
			if ( o.val().length > max || o.val().length < min ) {
				o.addClass( "error" );
				alert("El largo de " + n + " debe estar entre " + min + " y " + max + "." );
				return false;
			} else {
				return true;
			}
		}

		function checkRegexp( o, regexp, n ) {
			if ( !( regexp.test( o.val() ) ) ) {
				o.addClass( "error" );
				alert(n);
                                return false;
			} else {
				return true;
			}
		}
		
                var bValid = true;
                    allFields.removeClass("error");
                    bValid = bValid && checkLength( nomApe, "Nombre y Apellido", 2, 30 );
                    bValid = bValid && checkLength( email, "email", 6, 80 );
                    bValid = bValid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "E-Mail solo acepta este formato sarasa@pocholamusic.com" );
                    bValid = bValid && checkLength( asunto, "Asunto", 2, 50 );
                    bValid = bValid && checkLength( mensContact, "mensaje", 1, 144 );
                    
		    bValid = bValid && checkRegexp( nomApe, /^[\w\-\s\d�������������������������������������������������������������.,]+$/i, "Nombre y Apellido solo acepta caracteres de A a la Z" );
                                       
        	    bValid = bValid && checkRegexp( asunto, /^[\w\-\s\d�������������������������������������������������������������.,]+$/i, "Asunto solo acepta caracteres alfa-num�ricos" );
                    if (bValid ){
                        alert( "El mensaje ha sido enviado. Un asesor se contactar� con Ud. a la brevedad" );
                    }
        });
    })
    
    //funcion que despliega el menu acordeon


	$(function() {
		$( "#accordion" ).accordion();
	});

       //funcion del menu animado
   $(function() {
		$( "#tabs" ).tabs();
	});
        
        
      //funcion mensaje de alerta
        
    $(function() {
		$( "#dialog" ).dialog();
	});
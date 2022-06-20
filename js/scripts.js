window.onload = function() {

      $('#FotoU').click( function(){
      	if($('#imagen_input').attr('hidden')) {
	        $('#imagen_input').attr('hidden',false);
	    } else {
	        $('#imagen_input').attr('hidden',true);
	    }
        
      });

      $('#txtemail').click( function(){
            	Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'No tienes permisos para cambiar tu correo',
                          footer: 'Si deseas hacerlo, envia un ticket de soporte'
                        })
      	});

      $('#btnGuardar').click( function(e){
              e.preventDefault();
              Swal.fire({
                title: '¿CONFIRMAR CAMBIO?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'SI',
                denyButtonText: `Cancelar`,
              }).then((result) => {
                if (result.isConfirmed) {
                  $('#formUsuario').submit();
                } else if (result.isDenied) {
                  Swal.fire('Cambio cancelada', '', 'info')
                }
              })
        });
      

      $('#txttel').click( function(){
      	$('#telefono_hidden').attr('hidden',false);
      	$('#telefono').attr('hidden',true);
      	});
      $('#txttel2').click( function(){
      	$('#telefono_hidden').attr('hidden',true);
      	$('#telefono').attr('hidden',false);
      	$('#telefono_final').text($('#telefono_input').val());
      	});

      $('#txtapellidos').click( function(){
      	$('#apellidos_hidden').attr('hidden',false);
      	$('#apellidos').attr('hidden',true);
      	});
      $('#txtapellidos2').click( function(){
      	$('#apellidos_hidden').attr('hidden',true);
      	$('#apellidos').attr('hidden',false);
      	$('#apellidos_final').text($('#apellidos_input').val());
      	});

      $('#txtnombre').click( function(){
      	$('#nombres_hidden').attr('hidden',false);
      	$('#nombres').attr('hidden',true);
      	});
      $('#txtnombre2').click( function(){
      	$('#nombres_hidden').attr('hidden',true);
      	$('#nombres').attr('hidden',false);
      	$('#nombres_final').text($('#nombres_input').val());
      	});


        $('#btnEnviarTicket').click( function(e){
          e.preventDefault();
          if ($('#cliente').val() === '' || $('#correo').val() === '') {
                  Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Debe iniciar sesion para enviar un ticket de soporte',
                      showConfirmButton: false,
                      timer: 2000
                  })
              }else{
              Swal.fire({
                title: '¿ENVIAR TICKET?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'SI',
                denyButtonText: `Cancelar`,
              }).then((result) => {
                if (result.isConfirmed) {

                  $('#FormTSoporte').submit();
                  
                } else if (result.isDenied) {
                  Swal.fire('Envio Cancelado', '', 'info')
                }
              })
            }
        });

    };

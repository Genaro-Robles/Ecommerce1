window.onload = function() {
      $('#cbocategoria option:not(:selected)').attr('disabled',true);
      $('#BotonRecuadro').click( function(){
        $('#FotoRecuadro').attr('hidden',false);
        $('#Recuadro').attr('hidden',true);
      });


      //GUARDAR ABOUT

        //TITULO 1
        $('#GuardarT1').click( function(e){
          var contenido = $('#T1').val();
          var campo = "titulo1";
              e.preventDefault();
              Swal.fire({
                title: '¿CONFIRMAR CAMBIO?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'SI',
                denyButtonText: `Cancelar`,
              }).then((result) => {
                if (result.isConfirmed) {
                  
                var datos = {"Campo":campo,"Contenido":contenido};
                $.ajax({
                    url: 'CambiarAbout.php',
                    type: 'POST',
                    data: datos,
                    success:function(r){
                      if(r==1){
                          //alert("Cambiado con exito");
                      }
                  }
                });

                } else if (result.isDenied) {
                  Swal.fire('Cambio cancelado', '', 'info')
                }
              })
        });

        //TITULO 2
        $('#GuardarT2').click( function(e){
          var contenido = $('#T2').val();
          var campo = "titulo2";
              e.preventDefault();
              Swal.fire({
                title: '¿CONFIRMAR CAMBIO?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'SI',
                denyButtonText: `Cancelar`,
              }).then((result) => {
                if (result.isConfirmed) {
                  
                var datos = {"Campo":campo,"Contenido":contenido};
                $.ajax({
                    url: 'CambiarAbout.php',
                    type: 'POST',
                    data: datos,
                    success:function(r){
                      if(r==1){
                          //alert("Cambiado con exito");
                      }
                  }
                });

                } else if (result.isDenied) {
                  Swal.fire('Cambio cancelado', '', 'info')
                }
              })
        });

        //TITULO 3
        $('#GuardarT3').click( function(e){
          var contenido = $('#T3').val();
          var campo = "titulo3";
              e.preventDefault();
              Swal.fire({
                title: '¿CONFIRMAR CAMBIO?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'SI',
                denyButtonText: `Cancelar`,
              }).then((result) => {
                if (result.isConfirmed) {
                  
                var datos = {"Campo":campo,"Contenido":contenido};
                $.ajax({
                    url: 'CambiarAbout.php',
                    type: 'POST',
                    data: datos,
                    success:function(r){
                      if(r==1){
                          //alert("Cambiado con exito");
                      }
                  }
                });

                } else if (result.isDenied) {
                  Swal.fire('Cambio cancelado', '', 'info')
                }
              })
        });


        //Texto 1
        $('#GuardarTt1').click( function(e){
          var contenido = $('#Tt1').val();
          var campo = "texto1";
              e.preventDefault();
              Swal.fire({
                title: '¿CONFIRMAR CAMBIO?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'SI',
                denyButtonText: `Cancelar`,
              }).then((result) => {
                if (result.isConfirmed) {
                  
                var datos = {"Campo":campo,"Contenido":contenido};
                $.ajax({
                    url: 'CambiarAbout.php',
                    type: 'POST',
                    data: datos,
                    success:function(r){
                      if(r==1){
                          //alert("Cambiado con exito");
                      }
                  }
                });

                } else if (result.isDenied) {
                  Swal.fire('Cambio cancelado', '', 'info')
                }
              })
        });


        //Texto 2
        $('#GuardarTt2').click( function(e){
          var contenido = $('#Tt2').val();
          var campo = "texto2";
              e.preventDefault();
              Swal.fire({
                title: '¿CONFIRMAR CAMBIO?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'SI',
                denyButtonText: `Cancelar`,
              }).then((result) => {
                if (result.isConfirmed) {
                  
                var datos = {"Campo":campo,"Contenido":contenido};
                $.ajax({
                    url: 'CambiarAbout.php',
                    type: 'POST',
                    data: datos,
                    success:function(r){
                      if(r==1){
                          //alert("Cambiado con exito");
                      }
                  }
                });

                } else if (result.isDenied) {
                  Swal.fire('Cambio cancelado', '', 'info')
                }
              })
        });


        //Texto 3
        $('#GuardarTt3').click( function(e){
          var contenido = $('#Tt3').val();
          var campo = "texto3";
              e.preventDefault();
              Swal.fire({
                title: '¿CONFIRMAR CAMBIO?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'SI',
                denyButtonText: `Cancelar`,
              }).then((result) => {
                if (result.isConfirmed) {
                  
                var datos = {"Campo":campo,"Contenido":contenido};
                $.ajax({
                    url: 'CambiarAbout.php',
                    type: 'POST',
                    data: datos,
                    success:function(r){
                      if(r==1){
                          //alert("Cambiado con exito");
                      }
                  }
                });

                } else if (result.isDenied) {
                  Swal.fire('Cambio cancelado', '', 'info')
                }
              })
        });

        //Imagen 2
        $('#GuardarI2').click( function(e){        
              e.preventDefault();
              if ($('#I2').val() === '') {
                  Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Debe seleccionar un archivo',
                      showConfirmButton: false,
                      timer: 2000
                  })
              }else{
              Swal.fire({
                title: '¿CONFIRMAR CAMBIO?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'SI',
                denyButtonText: `Cancelar`,
              }).then((result) => {
                if (result.isConfirmed) {

                  $('#GuardarIi2').click();
                  
                } else if (result.isDenied) {
                  Swal.fire('Envio Cancelado', '', 'info')
                }
              })
            }
        });

        //Imagen 3
        $('#GuardarI3').click( function(e){        
              e.preventDefault();
              if ($('#I3').val() === '') {
                  Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Debe seleccionar un archivo',
                      showConfirmButton: false,
                      timer: 2000
                  })
              }else{
              Swal.fire({
                title: '¿CONFIRMAR CAMBIO?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'SI',
                denyButtonText: `Cancelar`,
              }).then((result) => {
                if (result.isConfirmed) {

                  $('#GuardarIi3').click();

                } else if (result.isDenied) {
                  Swal.fire('Envio Cancelado', '', 'info')
                }
              })
            }
        });



    };



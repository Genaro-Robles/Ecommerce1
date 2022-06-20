window.onload = function() {

  // PRIMER BANNER
      $('#btnCambiar1').click( function(){
        $('#Banner1').attr('hidden',false);
        $('#btnGuardar1').attr('hidden',false);
        $('#btnCambiar1').attr('hidden',true);
      });

      $('#btnGuardar1').click( function(){

        var dato = $('#Banner1').val().replace(/C:\\fakepath\\/i, '');
        var datos = {"dato":dato,"id":1};

        $.ajax({
              url: 'CambiarBanner.php',
              type: 'POST',
              data: datos,
              success:function(r){
                
              }
          });

        $('#Banner1').attr('hidden',true);
        $('#btnGuardar1').attr('hidden',true);
        $('#btnCambiar1').attr('hidden',false);
      });
// SEGUNDO BANNER

      $('#btnCambiar2').click( function(){
        $('#Banner2').attr('hidden',false);
        $('#btnGuardar2').attr('hidden',false);
        $('#btnCambiar2').attr('hidden',true);
      });

      $('#btnGuardar2').click( function(){

        var dato = $('#Banner2').val().replace(/C:\\fakepath\\/i, '');
        var datos = {"dato":dato,"id":2};

        $.ajax({
              url: 'CambiarBanner.php',
              type: 'POST',
              data: datos,
              success:function(r){
                
              }
          });

        $('#Banner2').attr('hidden',true);
        $('#btnGuardar2').attr('hidden',true);
        $('#btnCambiar2').attr('hidden',false);
      });

      // TERCER BANNER
      $('#btnCambiar3').click( function(){
        $('#Banner3').attr('hidden',false);
        $('#btnGuardar3').attr('hidden',false);
        $('#btnCambiar3').attr('hidden',true);
      });

      $('#btnGuardar3').click( function(){

        var dato = $('#Banner3').val().replace(/C:\\fakepath\\/i, '');
        var datos = {"dato":dato,"id":3};

        $.ajax({
              url: 'CambiarBanner.php',
              type: 'POST',
              data: datos,
              success:function(r){
                
              }
          });

        $('#Banner3').attr('hidden',true);
        $('#btnGuardar3').attr('hidden',true);
        $('#btnCambiar3').attr('hidden',false);
      });

      // CUARTO BANNER
      $('#btnCambiar4').click( function(){
        $('#Banner4').attr('hidden',false);
        $('#btnGuardar4').attr('hidden',false);
        $('#btnCambiar4').attr('hidden',true);
      });

      $('#btnGuardar4').click( function(){

        var dato = $('#Banner4').val().replace(/C:\\fakepath\\/i, '');
        var datos = {"dato":dato,"id":4};

        $.ajax({
              url: 'CambiarBanner.php',
              type: 'POST',
              data: datos,
              success:function(r){
                
              }
          });

        $('#Banner4').attr('hidden',true);
        $('#btnGuardar4').attr('hidden',true);
        $('#btnCambiar4').attr('hidden',false);
      });

      // QUINTO BANNER
      $('#btnCambiar5').click( function(){
        $('#Banner5').attr('hidden',false);
        $('#btnGuardar5').attr('hidden',false);
        $('#btnCambiar5').attr('hidden',true);
      });

      $('#btnGuardar5').click( function(){

        var dato = $('#Banner5').val().replace(/C:\\fakepath\\/i, '');
        var datos = {"dato":dato,"id":5};

        $.ajax({
              url: 'CambiarBanner.php',
              type: 'POST',
              data: datos,
              success:function(r){
                
              }
          });

        $('#Banner5').attr('hidden',true);
        $('#btnGuardar5').attr('hidden',true);
        $('#btnCambiar5').attr('hidden',false);
      });

      // SEXTO BANNER
      $('#btnCambiar6').click( function(){
        $('#Banner6').attr('hidden',false);
        $('#btnGuardar6').attr('hidden',false);
        $('#btnCambiar6').attr('hidden',true);
      });

      $('#btnGuardar6').click( function(){

        var dato = $('#Banner6').val().replace(/C:\\fakepath\\/i, '');
        var datos = {"dato":dato,"id":6};

        $.ajax({
              url: 'CambiarBanner.php',
              type: 'POST',
              data: datos,
              success:function(r){
                
              }
          });

        $('#Banner6').attr('hidden',true);
        $('#btnGuardar6').attr('hidden',true);
        $('#btnCambiar6').attr('hidden',false);
      });


    };

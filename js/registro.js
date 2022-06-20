window.onload = function() {
	$('#btnCrearCuenta').click( function(){
		$('#cliente').val() === ''
      	if () {
        e.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No hay productos, selecciona alguno',
            showConfirmButton: false,
            timer: 2000
        }).then(function () {
            window.location = "index";
        })
    }
    else if ($('#cliente').val() === '' || $('#correo').val() === '') {
        e.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Debe iniciar sesion para proseguir con la compra',
            showConfirmButton: false,
            timer: 2000
        })
    }
    else if ($('#FechaE').val() === '') {
        e.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Debe Ingresar la Fecha de entrega',
            showConfirmButton: false,
            timer: 2000
        })
    }
    else {
      	});
}
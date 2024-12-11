$(function () {

$('#error-nombre').hide();
$('#error-apellido').hide();
$('#error-cedula').hide();
$('#error-correo').hide();
$('#error-direccion').hide();
$('#error-celular').hide();
$('#error-fecha-nacimiento').hide();



$('#UsuariosForm').on('submit', function (e) {
    e.preventDefault();

    let isValid = true;

    // Validar Nombre
    if ($('#nombre').val().trim() === '') {
        $('#nombre').addClass('error');
        $('#error-nombre').show();
        isValid = false;
    } else {
        $('#nombre').removeClass('error');
        $('#error-nombre').hide();
    }

    // Validar Apellidos
    if ($('#apellido').val().trim() === '') {
        $('#apellido').addClass('error');
        $('#error-apellido').show();
        isValid = false;
    } else {
        $('#apellido').removeClass('error');
        $('#error-apellido').hide();
    }

    // Validar Cédula
    if ($('#cedula').val().trim() === '') {
        $('#cedula').addClass('error');
        $('#error-cedula').show();
        isValid = false;
    } else {
        $('#cedula').removeClass('error');
        $('#error-cedula').hide();
    }

    // Validar Correo
    const correo = $('#correo').val().trim();
    if (correo === '' || !correo.includes('@')) {
        $('#correo').addClass('error');
        $('#error-correo').show();
        isValid = false;
    } else {
        $('#correo').removeClass('error');
        $('#error-correo').hide();
    }

    // Validar Dirección
    if ($('#direccion').val().trim() === '') {
        $('#direccion').addClass('error');
        $('#error-direccion').show();
        isValid = false;
    } else {
        $('#direccion').removeClass('error');
        $('#error-direccion').hide();
    }

    // Validar Celular
    if ($('#celular').val().trim() === '') {
        $('#celular').addClass('error');
        $('#error-celular').show();
        isValid = false;
    } else {
        $('#celular').removeClass('error');
        $('#error-celular').hide();
    }

    // Validar Fecha de Nacimiento
    if ($('#fecha-nacimiento').val().trim() === '') {
        $('#fecha-nacimiento').addClass('error');
        $('#error-fecha-nacimiento').show();
        isValid = false;
    } else {
        $('#fecha-nacimiento').removeClass('error');
        $('#error-fecha-nacimiento').hide();
    }

    if (isValid) {
        // Enviar datos al servidor
        fetch('procesarUsuarios.php', {
            method: 'post',
            headers: {
                "Content-Type": 'application/json'
            },
            body: JSON.stringify({
                action: 'add',
                nombre: $('#nombre').val(),
                apellido: $('#apellido').val(),
                cedula: $('#cedula').val(),
                correo: $('#correo').val(),
                direccion: $('#direccion').val(),
                celular: $('#celular').val(),
                fechaNacimiento: $('#fecha-nacimiento').val()
            })
        }).then(response => response.json())
          .then(data => {
              console.log(data);
              alert(data.message);
              if (data.status === "00") {
                  $('#UsuariosForm')[0].reset();
              }
          })
          .catch(error => console.error('Error:', error));
    }
});

});
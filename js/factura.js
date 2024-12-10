$(function () {



    $('#error-lecturaAnterior').hide();
    $('#error-lecturaActual').hide();
    $('#error-fechaFactura').hide();
    $('#error-idMedidor').hide();
    $('#correcto-idMedidor').hide();
    
    $('#facturasSeccion').hide();

    /*$(document).ready(function(){
        let isValid = true;

        if ($('#idMedidor').val().trim() === '') {
            $('#idMedidor').addClass('error');
            $('#error-idMedidor').show();
            isValid = false;
        } else {
            $('#idMedidor').removeClass('error');
            $('#error-idMedidor').hide();
        }

        function buscarMedidor(){
            $.post('procesarFacturas', {action:'buscar'}, function(data){
                var medidores = JSON.parse(data);
                var html = '';
                if(medidores.medidores.length > 0) {
                    medidores.medidores.forEach(function(medidor){
                        
                    })

                }
            }


    })*/

/*Script de envio de dato del medidor al cual se le quiere generar una factura */
    $('#buscadorMedidor').on('submit', function (e) {
        e.preventDefault();

        let isValid = true;

        if ($('#idMedidor').val().trim() === '') {
            $('#idMedidor').addClass('error');
            $('#error-idMedidor').show();
            isValid = false;
        } else {
            $('#idMedidor').removeClass('error');
            $('#error-idMedidor').hide();
        }


        if (isValid) {
            // alert('Formulario enviado correctamente.');
            //$(this).unbind('submit').submit();
            // $(this).unbind('submit').submit();
            fetch('procesarFacturas.php', {
                method: 'post',
                headers: {
                    "Content-Type": 'application/json'
                },
                body: JSON.stringify({
                    action: 'buscar',
                    idMedidor: $('#idMedidor').val(),
                    
                })
            }).then(response => response.json())
            .then(data => {
                console.log(data);
                var html = '';
                if (data.status === true && data.showSection === true && data.medidores.length >0) {
                    $('#facturasSeccion').show();  // Muestra la sección
                    $('#correcto-idMedidor').show();  // Muestra el mensaje de éxito
                    $('#error-idMedidor').hide(); // Oculta el mensaje de error

                    data.medidores.forEach(function(medidor){
                        html += `<div >
                                <p>IdMedidor: ${medidor.idMedidor}</p>
                                <p>Lectura Actual: ${medidor.lecturaActual}</p>
                             </div>`;
                    });
                } else {
                     $('#facturasSeccion').hide(); // Oculta la sección de facturas
                    $('#error-idMedidor').show();  // Muestra el mensaje de error
                    $('#correcto-idMedidor').hide();
                }
                $('#buscadorMedidor').append(html);

            })
            .catch(error => console.log(error));
        }
    });
    
/* Script de envio de datos de la factura */
    $('#facturasForm').on('submit', function (e) {
        e.preventDefault();

        let isValid = true;

        if ($('#lecturaAnterior').val().trim() === '') {
            $('#lecturaAnterior').addClass('error');
            $('#error-lecturaAnterior').show();
            isValid = false;
        } else {
            $('#lecturaAnterior').removeClass('error');
            $('#error-lecturaAnterior').hide();
        }

        if ($('#lecturaActual').val().trim() === '') {
            $('#lecturaActual').addClass('error');
            $('#error-lecturaActual').show();
            isValid = false;
        } else {
            $('#lecturaActual').removeClass('error');
            $('#error-lecturaActual').hide();
        }

        if ($('#fechaFactura').val().trim() === '') {
            $('#fechaFactura').addClass('error');
            $('#error-fechaFactura').show();
            isValid = false;
        } else {
            $('#fechaFactura').removeClass('error');
            $('#error-fechaFactura').hide();
        }


        if (isValid) {
            // alert('Formulario enviado correctamente.');
            //$(this).unbind('submit').submit();
            // $(this).unbind('submit').submit();
            fetch('procesarFacturas.php', {
                method: 'post',
                headers: {
                    "Content-Type": 'application/json'
                },
                body: JSON.stringify({
                    action: 'add',
                    idMedidor: $('#idMedidor').val(),
                    lecturaAnterior: $('#lecturaAnterior').val(),
                    lecturaActual: $('#lecturaActual').val(),
                    fechaFactura: $('#fechaFactura').val()
                })
            }).then(response => response.json())
                .then(data => {
                    console.log(data);
                    alert(data.message)
                    if (data.status == "00") {
                        $('#facturasForm')[0].reset();
                    }
                })
                .catch(error => console.log(error));
        }
    });


    /*getTeachers();

    function getTeachers(){
        fetch('teachers.php', {
            method: 'post',
            headers: {
                "Content-Type": 'application/json'
            },
            body: JSON.stringify({
                action: 'get',
            })
        }).then(response => response.json())
            .then(data => {
                if(data.status == '00'){
                    data.teachers.forEach((element) => {
                        $('#listTeachers').append("<tr><td>"+element.name+"</td></tr>");
                    });
                }
            })
            .catch(error => console.log(error));
    }*/



});
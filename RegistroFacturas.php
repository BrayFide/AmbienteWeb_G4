<!DOCTYPE html>
<html>

<head>
    <!--Metadatos-->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Matricula en linea</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery-3.7.1.js"></script>
    <script src="./js/factura.js"></script>
</head>

<body>

    <main>

    <section>
             <form id="buscadorMedidor">  
    
                <div class="form-group">
                    <label for="idMedidor">Busque con numero de medidor</label>
                    <input type="number" id="idMedidor" name="idMedidor">
                    <span id="error-idMedidor">No es correcto el numero o no esta registrado en sistema</span>
                    <span id="correcto-idMedidor">Medidor encontrado, a continuacion ingrese la lectura</span>
                </div>

                <button type="submit" class="boton">Enviar</button>

            </form>
    </section>

    <section id="facturasSeccion">
            <form id="facturasForm">
                <h2>Registro de consumo</h2>


                <div class="form-group">
                    <label for="name">lectura Anterior: </label>
                    <input type="number" id="lecturaAnterior" name="lecturaAnterior">
                    <span id="error-lecturaAnterior">Lectura Anterior es obligatorio.</span>
                </div>

                <div class="form-group">
                    <label for="name">Lectura Actual: </label>
                    <input type="number" id="lecturaActual" name="lecturaActual">
                    <span id="error-lecturaActual
                    ">Lectura Actual es obligatorio.</span>
                </div>

                <div class="form-group">
                    <label for="name">Fecha: </label>
                    <input type="date" id="fechaFactura" name="fechaFactura">
                    <span id="error-fechaFactura">Fecha es obligatorio.</span>
                </div>
                <button type="submit" class="boton">Enviar</button>
            </form>
        </section>

        <section>
            <table id="listaLecturas">
                <tr>
                    <th>Nombre</th>
                </tr>

            </table>
        </section>
    </main>

</body>
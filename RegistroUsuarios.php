<!DOCTYPE html>
<html>

<head>
    <!--Metadatos-->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Matricula en linea</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery-3.7.1.js"></script>
    <script src="./js/registroUsuario.js"></script>
    
</head>
L

<body>

    <main>
<div class="contenedor">
        <section id="UsuariosSeccion">
            <form id="UsuariosForm">
                <h2>Si desea registrar un usuario favor complete el siguiente formulario</h2>


                <div class="form-floating mb-3">
                    <label for="name">Nombre:</label>
                    <input type="text" id="nombre" name="nombre">
                    <span id="error-nombre">Nombre es obligatorio.</span>
                </div>

                <div class="form-group">
                    <label for="apellido">Apellidos:</label>
                    <input type="text" id="apellido" name="apellido">
                    <span id="error-apellido">Apellidos son obligatorios.</span>
                </div>

                <div class="form-group">
                    <label for="cedula">Cédula:</label>
                    <input type="text" id="cedula" name="cedula">
                    <span id="error-cedula">Cédula es obligatoria.</span>
                </div>

                <div class="form-group">
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo">
                    <span id="error-correo">Correo es obligatorio y debe ser válido.</span>
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion">
                    <span id="error-direccion">Dirección es obligatoria.</span>
                </div>

                <div class="form-group">
                    <label for="celular">Celular:</label>
                    <input type="tel" id="celular" name="celular">
                    <span id="error-celular">Celular es obligatorio y debe ser válido.</span>
                </div>

                <div class="form-group">
                    <label for="fecha-nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" id="fecha-nacimiento" name="fecha-nacimiento">
                    <span id="error-fecha-nacimiento">Fecha de nacimiento es obligatoria.</span>
                </div>
                <button type="submit" class="boton">Enviar</button>
            </form>
        </section>
        </div>
        <section>
            <table id="listaLecturas">
                <tr>
                    <th>Nombre</th>
                </tr>

            </table>
        </section>
    </main>

</body>
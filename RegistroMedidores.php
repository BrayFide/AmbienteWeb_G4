<!DOCTYPE html>
<html>

<head>
    <title>Ingrese nuevo medidor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/Pago.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery-3.7.1.js"></script>
    <script src="./js/script.js"></script>

 
</head>

<body>
    <div class="contenedor">
        <h1>Ingrese nuevo medidor</h1>

        <form  method="post"  action="procesar_formulario.php" id= "medidorForm" >
            <div class="form-floating mb-3">
                <input type="text" class="form-control" placeholder="id Medidor" name="idMedidor"
                    id="idMedidor">
                <label for="floatingInput">ID de Medidor:</label>
                
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control"  placeholder="Ubicacion" name="ubicacion"
                    id="ubicacion">
                <label for="floatingInput">Ubicacion</label>
                
            </div>


            <div class="form-floating mb-3">
                <input type="text" class="form-control"  placeholder="serie" name="serie" id="serie">
                <label for="floatingInput">No serie:</label>
                
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control"  placeholder="Numero de cedula"
                    name="cedUsuario" id="cedUsuario">
                <label for="floatingInput">Numero de cedula de Usuario Asignado:</label>
                
                
            </div>

            <div class="form-floating mb-3">
                <input type="date" class="form-control"  placeholder="Numero de cedula"
                    name="fechaIngreso" id="fechaIngreso">
                <label>Fecha de ingreso:</label>
                
            </div>

            <button type="submit">Enviar</button>
        </form>
    </div>
    <?php
    // Verificar si existe el parámetro 'mensaje' en la URL
    if (isset($_GET['mensaje'])) {
        $mensaje = $_GET['mensaje'];

        // Mostrar mensajes personalizados
        if ($mensaje == 'correcto') {
            echo "<p style='color: green;'>Datos insertados correctamente.</p>";
        } elseif ($mensaje == 'error') {
            echo "<p style='color: red;'>Error al insertar los datos.</p>";
        } elseif ($mensaje == 'error_preparar') {
            echo "<p style='color: red;'>Error al preparar la consulta.</p>";
        } elseif ($mensaje == 'incompleto') {
            echo "<p style='color: orange;'>Por favor, completa todos los campos.</p>";
        }
    }
    ?>
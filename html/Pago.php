<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consulta de Número de Medidor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/Pago.css">
</head>

<body>



  <div class="contenedor">
    <h1>Pago</h1>

    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Numero de la Tarjeta">
      <label for="floatingInput">Numero de la Tarjeta</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Fecha de Vencimiento (MM / AA)">
      <label for="floatingPassword">Fecha de Vencimiento (MM / AA)</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Codigo de Seguridad">
      <label for="floatingPassword">Codigo de Seguridad</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Nombre del Titular">
      <label for="floatingPassword">Nombre del titular</label>
    </div>
    <div class="form-floating mb-3">
      <button id="botonPagar" type="button" class="btn btn-primary">Pagar</button>
      <div class="text-bg-success p-3" id="confirmation-message">Pago realizado con éxito</div>
    </div>



  </div>

  <div class="contenedor">
    <div id="infoPago">
      <p>Consumo del mes :</p>
      <p>IVA: </p>
      <P>Ley de Hidrantes: </P>
      <p>Subtotal</p>
      <p class="fw-bolder">Total: </p>
    </div>
  </div>

  <div id="loaderPagina" class="section_loader">
    <div class="loader">
      <div class="loader_1"></div>
      <div class="loader_2"></div>
    </div>
  </div>



  <script>
    const payButton = document.getElementById("botonPagar");
    const loader = document.getElementById("loaderPagina");
    const confirmationMessage = document.getElementById("confirmation-message");

    // Función para mostrar el loader
    const showLoader = () => {
      loader.classList.add("show_loader");
    };

    // Función para ocultar el loader
    const hideLoader = () => {
      loader.classList.remove("show_loader");
    };

    // Función para mostrar el mensaje de confirmación
    const showConfirmation = () => {
      confirmationMessage.style.display = "block";
    };

    // Evento al hacer clic en el botón de pagar
    botonPagar.addEventListener("click", () => {
      // Mostrar el loader y ocultar el botón
      showLoader();
      botonPagar.style.display = "none";

      // Simular el tiempo de procesamiento (3 segundos)
      setTimeout(() => {
        hideLoader();              // Ocultar el loader
        showConfirmation();        // Mostrar mensaje de confirmación
      }, 3000); // Cambia el tiempo según tus necesidades
    });

  </script>
</body>

</html>
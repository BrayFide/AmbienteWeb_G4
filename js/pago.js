
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
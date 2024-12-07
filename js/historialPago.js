document.getElementById('formulario-pagos').addEventListener('submit', function(event) {
    const numeroMedidor = document.getElementById('numero-medidor').value;
    if (!numeroMedidor.trim()) {
        alert('Por favor, ingresa un número de medidor válido');
        event.preventDefault(); 
    }
});

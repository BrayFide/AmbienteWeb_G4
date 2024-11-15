// Simulación de datos en "base de datos" para cada medidor
const facturasDB = {
    "100": [
        { comprobante: "001", tipoDocumento: "Factura", numeroDocumento: "123456", fechaPago: "2024-11-01", monto: "₡10,000" },
        { comprobante: "002", tipoDocumento: "Recibo", numeroDocumento: "123457", fechaPago: "2024-11-02", monto: "₡15,000" }
    ],
    "110": [
        { comprobante: "003", tipoDocumento: "Factura", numeroDocumento: "123458", fechaPago: "2024-11-03", monto: "₡8,000" },
        { comprobante: "004", tipoDocumento: "Recibo", numeroDocumento: "123459", fechaPago: "2024-11-04", monto: "₡5,000" }
    ],
    "120": [
        { comprobante: "005", tipoDocumento: "Factura", numeroDocumento: "123460", fechaPago: "2024-11-05", monto: "₡12,000" }
    ]
};

// Función para consultar las facturas según el número de medidor
function consultarFacturas() {
    const numeroMedidor = document.getElementById("medidor").value;
    const facturas = facturasDB[numeroMedidor]; 
    const cuerpoTabla = document.getElementById("cuerpoTabla");
    cuerpoTabla.innerHTML = ""; 

    if (facturas) {
        facturas.forEach(factura => {
            const fila = document.createElement("tr");

            fila.innerHTML = `
                <td>${factura.comprobante}</td>
                <td>${factura.tipoDocumento}</td>
                <td>${factura.numeroDocumento}</td>
                <td>${factura.fechaPago}</td>
                <td>${factura.monto}</td>
            `;

            cuerpoTabla.appendChild(fila);
        });
    } else {
        const fila = document.createElement("tr");
        fila.innerHTML = `<td colspan="5" style="text-align:center;">No se encontraron facturas para el número de medidor ingresado</td>`;
        cuerpoTabla.appendChild(fila);
    }
}

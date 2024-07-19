console.log("Hola");

const proveedorForm = document.getElementById('proveedorForm');
proveedorForm.addEventListener('submit', (event) => {
    event.preventDefault();
    addProveedor(event);
});

async function addProveedor(event) {
    const cedula = document.getElementById('cedula').value;
    const nombres = document.getElementById('nombres').value;
    const apellidos = document.getElementById('apellidos').value;
    const telefono = document.getElementById('telefono').value;
    const email = document.getElementById('email').value;
    const empresa = document.getElementById('empresa').value;

    const formData = new FormData();
    formData.append('cedula', cedula);
    formData.append('nombres', nombres);
    formData.append('apellidos', apellidos);
    formData.append('telefono', telefono);
    formData.append('email', email);
    formData.append('empresa', empresa);


    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swproveedor.php', {
            method: 'POST',
            body: formData
        });

        const text = await response.text();
        console.log('Respuesta del servidor:', text);

        let data;
        try {
            data = JSON.parse(text);
            console.log('Proveedor agregado correctamente:', data);
        } catch (jsonError) {
            console.error('La respuesta no es un JSON válido:', text);
        }
    } catch (error) {
        console.error('Error al agregar proveedor:', error);
    }
}

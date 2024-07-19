window.addEventListener('message', (event) => {
    const proveedor = event.data;
    document.getElementById('idProveedor').value = proveedor.idProveedor;
    document.getElementById('cedulaProveedor').value = proveedor.cedulaProveedor;
    document.getElementById('nombreProveedor').value = proveedor.nombreProveedor;
    document.getElementById('apellidoProveedor').value = proveedor.apellidoProveedor;
    document.getElementById('telefonoProveedor').value = proveedor.telefonoProveedor;
    document.getElementById('emailProveedor').value = proveedor.emailProveedor;
    document.getElementById('empresaProveedor').value = proveedor.empresaProveedor;
});

async function updateProveedor(event) {
    event.preventDefault();

    const id = document.getElementById('idProveedor').value;
    const cedula = document.getElementById('cedulaProveedor').value;
    const nombre = document.getElementById('nombreProveedor').value;
    const apellido = document.getElementById('apellidoProveedor').value;
    const telefono = document.getElementById('telefonoProveedor').value;
    const email = document.getElementById('emailProveedor').value;
    const empresa = document.getElementById('empresaProveedor').value;

    const proveedor = {
        idProveedor: id,
        cedulaProveedor: cedula,
        nombreProveedor: nombre,
        apellidoProveedor: apellido,
        telefonoProveedor: telefono,
        emailProveedor: email,
        empresaProveedor: empresa
    };

    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/update-proveedor.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(proveedor)
        });
        if (response.ok) {
            alert('Proveedor actualizado correctamente');
            window.close(); // Cerrar la ventana después de actualizar
        } else {
            alert('Error al actualizar proveedor');
        }
    } catch (error) {
        console.error('Error al actualizar proveedor:', error);
    }
}

document.getElementById('updateProveedorForm').addEventListener('submit', updateProveedor);

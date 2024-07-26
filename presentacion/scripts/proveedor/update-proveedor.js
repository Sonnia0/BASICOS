document.getElementById('updateProveedorForm').addEventListener('submit', async (event) => {
    event.preventDefault();

    const formData = new FormData(event.target);
    const id = document.getElementById('idProveedor').value;

    const data = {
        id: id,
        nombre: formData.get('nombre'),
        apellido: formData.get('apellido'),
        correo: formData.get('correo'),
        telefono: formData.get('telefono')
    };

    try {
        const response = await fetch('path/to/your/services/updateProveedor.php', {
            method: 'PUT',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        });

        const result = await response.json();
        if (result.success) {
            alert(result.message);
        } else {
            alert(result.message);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error al actualizar el proveedor');
    }
});

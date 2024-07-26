document.addEventListener('DOMContentLoaded', async () => {
    try {
        const response = await fetch('path/to/your/services/listProveedor.php');
        const proveedores = await response.json();

        const proveedorTable = document.getElementById('proveedorTable');
        proveedores.forEach(proveedor => {
            const row = proveedorTable.insertRow();
            row.insertCell(0).textContent = proveedor.idProveedor;
            row.insertCell(1).textContent = proveedor.nombre;
            row.insertCell(2).textContent = proveedor.apellido;
            row.insertCell(3).textContent = proveedor.correo;
            row.insertCell(4).textContent = proveedor.telefono;

            const actionsCell = row.insertCell(5);
            const updateButton = document.createElement('button');
            updateButton.textContent = 'Update';
            updateButton.onclick = () => loadUpdateForm(proveedor);
            actionsCell.appendChild(updateButton);

            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete';
            deleteButton.onclick = () => deleteProveedor(proveedor.idProveedor);
            actionsCell.appendChild(deleteButton);
        });
    } catch (error) {
        console.error('Error:', error);
        alert('Error al cargar los proveedores');
    }
});

async function deleteProveedor(id) {
    if (confirm('Are you sure you want to delete this provider?')) {
        try {
            const response = await fetch(`path/to/your/services/deleteProveedor.php?id=${id}`, {
                method: 'DELETE'
            });

            const result = await response.json();
            if (result.success) {
                alert(result.message);
                location.reload();
            } else {
                alert(result.message);
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Error al eliminar el proveedor');
        }
    }
}

function loadUpdateForm(proveedor) {
    document.getElementById('idProveedor').value = proveedor.idProveedor;
    document.getElementById('nombre').value = proveedor.nombre;
    document.getElementById('apellido').value = proveedor.apellido;
    document.getElementById('correo').value = proveedor.correo;
    document.getElementById('telefono').value = proveedor.telefono;
}

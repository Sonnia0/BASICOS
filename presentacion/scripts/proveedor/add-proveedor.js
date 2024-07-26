// Función para cargar las categorías en el combo box (si aplica)
async function loadCategories() {
    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swCategoria.php', {
            method: 'GET'
        });
        if (response.ok) {
            const categories = await response.json();
            const categorySelect = document.getElementById('categoryProveedor');
            categorySelect.innerHTML = '<option value="">Seleccione una categoría</option>';
            categories.forEach(category => {
                const option = document.createElement('option');
                option.value = category.idCategoria;
                option.textContent = category.nombreCategoria;
                categorySelect.appendChild(option);
            });
        } else {
            throw new Error('Error al cargar las categorías');
        }
    } catch (error) {
        console.error('Error:', error);
    }
}

// Llamar a la función para cargar las categorías cuando se carga la página (si aplica)
document.addEventListener('DOMContentLoaded', loadCategories);

// Manejador de eventos para el formulario de proveedores
document.getElementById('proveedorForm').addEventListener('submit', async function (event) {
    event.preventDefault();

    const formData = new FormData();
    formData.append('nombre', document.getElementById('nombre').value);
    formData.append('apellido', document.getElementById('apellido').value);
    formData.append('correo', document.getElementById('correo').value);
    formData.append('telefono', document.getElementById('telefono').value);

    try {
        const response = await fetch('../../services/addProveedor.php', {
            method: 'POST',
            body: formData
        });

        if (response.ok) {
            const result = await response.json();
            if (result.success) {
                alert(result.message);
                document.getElementById('proveedorForm').reset();
                // Recargar categorías después de agregar un proveedor si es necesario
                loadCategories();
            } else {
                throw new Error(result.message);
            }
        } else {
            throw new Error('Error al agregar el proveedor');
        }
    } catch (error) {
        console.error('Error:', error);
        alert(error.message);
    }
});

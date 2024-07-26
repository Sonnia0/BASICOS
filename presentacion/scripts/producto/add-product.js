// Función para cargar las categorías en el combo box
async function loadCategories() {
    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swCategoria.php', {
            method: 'GET'
        });
        if (response.ok) {
            const categories = await response.json();
            const categorySelect = document.getElementById('categoryProduct');
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

// Llamar a la función para cargar las categorías cuando se carga la página
document.addEventListener('DOMContentLoaded', loadCategories);

// Manejador de eventos para el formulario de productos
document.getElementById('productForm').addEventListener('submit', async function (event) {
    event.preventDefault();

    const formData = new FormData();
    formData.append('nameProduct', document.getElementById('nameProduct').value);
    formData.append('descriptionProduct', document.getElementById('descriptionProduct').value);
    formData.append('priceProduct', document.getElementById('priceProduct').value);
    formData.append('photoProduct', document.getElementById('photoProduct').files[0]); // Se asume que solo se sube un archivo
    formData.append('categoryProduct', document.getElementById('categoryProduct').value);

    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swProducto.php', {
            method: 'POST',
            body: formData
        });

        if (response.ok) {
            alert('Producto agregado exitosamente');
            document.getElementById('productForm').reset();
            loadCategories(); // Recargar las categorías después de agregar un producto
        } else {
            throw new Error('Error al agregar el producto');
        }
    } catch (error) {
        console.error('Error:', error);
    }
});
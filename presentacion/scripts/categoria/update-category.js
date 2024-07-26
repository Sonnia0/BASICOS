window.addEventListener('message', function (event) {
    const category = event.data;

    if (category) {
        document.getElementById('idCategoria').value = category.idCategoria;
        document.getElementById('nombreCategoria').value = category.nombreCategoria;
        document.getElementById('descripcion').value = category.descripcion;
    }
});

document.getElementById('updateCategoryForm').addEventListener('submit', async function (event) {
    event.preventDefault();

    const idCategoria = document.getElementById('idCategoria').value;
    const nombreCategoria = document.getElementById('nombreCategoria').value;
    const descripcion = document.getElementById('descripcion').value;

    const data = {
        idCategoria: idCategoria,
        nombreCategoria: nombreCategoria,
        descripcion: descripcion
    };

    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swCategoria.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        if (response.ok) {
            alert('Categoría actualizada exitosamente');
            window.close();
        } else {
            throw new Error('Error al actualizar la categoría');
        }
    } catch (error) {
        console.error('Error:', error);
    }
});

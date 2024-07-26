window.addEventListener('message', (event) => {
    const product = event.data;
    if (product) { 
    document.getElementById('idProduct').value = product.idProduct;
    document.getElementById('nombreProducto').value = product.nombreProducto;
    document.getElementById('descripcion').value = product.descripcion;
    document.getElementById('precio').value = product.precio;
    document.getElementById('foto').value = product.foto;
    // Aquí puedes mostrar la foto del producto si es necesario
    }
});
document.getElementById('updateProductForm').addEventListener('submit', async function (event) {
    event.preventDefault();
    const idProduct = document.getElementById('idProduct').value;
    const nombreProducto = document.getElementById('nombreProducto').value;
    const descripcion = document.getElementById('descripcion').value;
    const precio = document.getElementById('precio').value;
    const foto = document.getElementById('foto').files[0]; // Obtener el archivo de imagen seleccionado

    const data ={ 
    idProduct:idProduct,
    nombreProducto:nombreProducto,
    descripcion:descripcion,
    precio:precio,
    foto:foto,
    }; // Agregar la imagen al FormData

    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swProducto.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        if (response.ok) {
            alert('Producto actualizada exitosamente');
            window.close();
        } else {
            throw new Error('Error al actualizar el producto');
        }
    } catch (error) {
        console.error('Error:', error);
    }
});

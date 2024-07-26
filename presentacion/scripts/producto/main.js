async function getProducts(query = '') {
    try {
      const response = await fetch('http://localhost/BASICOS/businessLogic/swProducto.php');
      const data = await response.json();
  
      const products = data.filter(product => product.nombreProducto.toLowerCase().includes(query.toLowerCase()));
      const tableBody = document.querySelector('#table-product tbody');
      tableBody.innerHTML = '';
      let cont = 1;
  
      products.forEach(product => {
        const row = document.createElement('tr');
  
        const id = document.createElement('td');
        id.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
        id.textContent = cont++;
        
        const name = document.createElement('td');
        name.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
        name.textContent = product.nombreProducto;
  
        const description = document.createElement('td');
        description.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
        description.textContent = product.descripcion;
  
        const price = document.createElement('td');
        price.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
        price.textContent = product.precio;
  
        const photo = document.createElement('td');
        photo.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
  
        const img = document.createElement('img');
        img.src = '../../../businessLogic/' + product.foto;
        img.alt = 'Foto del Producto';
        img.classList.add('h-12', 'w-12', 'rounded');
        photo.appendChild(img);
  
        const actionsCell = document.createElement('td');
  
        const editIcon = document.createElement('i');
        editIcon.classList.add('fas', 'fa-edit', 'text-blue-500', 'cursor-pointer', 'mr-2');
        editIcon.setAttribute('title', 'Editar');
        editIcon.addEventListener('click', () => openEditForm(product));
  
        const deleteIcon = document.createElement('i');
        deleteIcon.classList.add('fas', 'fa-trash-alt', 'text-red-500', 'cursor-pointer', 'mr-2');
        deleteIcon.setAttribute('title', 'Eliminar');
        deleteIcon.addEventListener('click', () => deleteProduct(product.idProducto));
  
        const addToCartIcon = document.createElement('i');
        addToCartIcon.classList.add('fas', 'fa-cart-plus', 'text-green-500', 'cursor-pointer');
        addToCartIcon.setAttribute('title', 'Agregar al carrito');
        addToCartIcon.addEventListener('click', () => addToCart(product));
  
        actionsCell.appendChild(editIcon);
        actionsCell.appendChild(deleteIcon);
        actionsCell.appendChild(addToCartIcon);
  
        row.appendChild(id);
        row.appendChild(name);
        row.appendChild(description);
        row.appendChild(price);
        row.appendChild(photo);
        row.appendChild(actionsCell);
  
        tableBody.appendChild(row);
      });
  
    } catch (error) {
      console.error('Error al obtener productos:', error);
    }
  }
  
  function addToCart(product) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const productIndex = cart.findIndex(item => item.idProducto === product.idProducto);
  
    if (productIndex !== -1) {
      cart[productIndex].quantity += 1;
    } else {
      product.quantity = 1;
      cart.push(product);
    }
  
    localStorage.setItem('cart', JSON.stringify(cart));
    alert('Producto añadido al carrito!');
  }
  
  async function deleteProduct(productId) {
    const confirmDelete = confirm('¿Estás seguro de que deseas eliminar este producto?');
    if (confirmDelete) {
      try {
        await fetch(`http://localhost/BASICOS/businessLogic/swProducto.php?id=${productId}`, {
          method: 'DELETE'
        });
        getProducts();
      } catch (error) {
        console.error('Error al eliminar el producto:', error);
      }
    }
  }
  
  function openEditForm(product) {
    const newWindow = window.open('../producto/updateProduct.php', '_blank', 'width=600,height=600');
  
    newWindow.onload = function() {
      newWindow.postMessage(product, '*');
    };
  
    newWindow.onbeforeunload = function() {
      getProducts();
    };
  }
  
  async function showProductsPhotos(photoProduct) {
    const imageUrl = "../../../businessLogic/imagenes" + photoProduct;
  
    const newWindow = window.open('', '_blank', 'width=600,height=600');
    newWindow.document.write(`
      <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Foto de Perfil</title>
        <style>
          body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
          }
          img {
            max-width: 100%;
            max-height: 100%;
          }
        </style>
      </head>
      <body>
        <img src="${imageUrl}" alt="Foto de Usuario">
      </body>
      </html>
    `);
    newWindow.document.close();
  }
  
  document.getElementById('search-button').addEventListener('click', function() {
    const query = document.getElementById('search-bar').value.toLowerCase();
    getProducts(query);
  });
  
  document.addEventListener('DOMContentLoaded', function() {
    getProducts();
  });
  
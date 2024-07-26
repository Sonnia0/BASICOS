const addCategoryForm = document.getElementById('addCategoryForm');
addCategoryForm.addEventListener('submit', (event) => {
  event.preventDefault();
  addCategory(event);
});

async function addCategory(event) {
  const nombreCategoria = document.getElementById('nombreCategoria').value;
  const descripcion = document.getElementById('descripcion').value;
  
  const formData = new FormData();
  formData.append('nombreCategoria', nombreCategoria);
  formData.append('descripcion', descripcion);
  
  try {
    const response = await fetch('http://localhost/BASICOS/businessLogic/swCategoria.php', {
      method: 'POST',
      body: formData
    });

    if (!response.ok) {
      throw new Error('Error en la respuesta del servidor');
    }

    const result = await response.json();
    console.log('Categoría agregada:', result);
    alert('Categoría agregada exitosamente');
    addCategoryForm.reset();
  } catch (error) {
    console.error('Error al agregar categoría:', error);
  }
}
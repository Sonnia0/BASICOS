async function getCategories() {
  try {
      const response = await fetch('http://localhost/BASICOS/businessLogic/swCategoria.php');
      const data = await response.json();

      const categories = data;

      const tableBody = document.querySelector('#table-category tbody');
      tableBody.innerHTML = '';
      let cont = 1;

      categories.forEach(category => {
          // Create table row
          const row = document.createElement('tr');

          // Create cells for each category property
          const id = document.createElement('td');
          id.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
          id.textContent = cont;
          cont++;

          const name = document.createElement('td');
          name.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
          name.textContent = category.nombreCategoria; // Ensure this matches the field name in your API response

          const description = document.createElement('td');
          description.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
          description.textContent = category.descripcion;

          // Create action cell with icons
          const actionsCell = document.createElement('td');

          // edit icon
          const editIcon = document.createElement('i');
          editIcon.classList.add('fas', 'fa-edit', 'text-blue-500', 'cursor-pointer', 'mr-2');
          editIcon.setAttribute('title', 'Editar');
          editIcon.addEventListener('click', () => openEditForm(category));

          // delete icon
          const deleteIcon = document.createElement('i');
          deleteIcon.classList.add('fas', 'fa-trash-alt', 'text-red-500', 'cursor-pointer', 'mr-2');
          deleteIcon.setAttribute('title', 'Eliminar');
          deleteIcon.addEventListener('click', () => deleteCategory(category.idCategoria));

          // Add icons to the action cell
          actionsCell.appendChild(editIcon);
          actionsCell.appendChild(deleteIcon);

          // Add cells to row
          row.appendChild(id);
          row.appendChild(name);
          row.appendChild(description);
          row.appendChild(actionsCell);

          // Add row to table
          tableBody.appendChild(row);
      });

  } catch (error) {
      console.error('Error al obtener categorías:', error);
  }
}

// Function to delete a category
async function deleteCategory(categoryId) {
  const confirmDelete = confirm('¿Estás seguro de que deseas eliminar esta categoría?');
  if (confirmDelete) {
      try {
          const response = await fetch(`http://localhost/BASICOS/businessLogic/swCategoria.php?id=${categoryId}`, {
              method: 'DELETE'
          });
          getCategories();
      } catch (error) {
          console.error('Error al eliminar la categoría:', error);
      }
  }
}

// Function to open update form for category
function openEditForm(category) {
  const newWindow = window.open('../categoria/updateCategory.php', '_blank', 'width=600,height=600');

  newWindow.onload = function() {
      newWindow.postMessage(category, '*');
  };

  newWindow.onbeforeunload = function() {
      getCategories();
  };
}

document.addEventListener('DOMContentLoaded', getCategories);

